<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Traits\UploadImage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\StudentReferral;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\LegalRepresentative;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class LegalRepresentativeController
 * @package App\Http\Controllers
 */
class LegalRepresentativeController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_referral = StudentReferral::find($id);
        $i = 0;
        $legalRepresentatives = StudentReferral::select('legal_representatives.*','patients.name','patients.last_name')
                                                    ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                                    ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                                    ->join('legal_representatives', 'forms.id', '=', 'legal_representatives.form_id')
                                                    ->where('referrals_id', $id_referral->id)->get();

        return view('legal-representative.index', compact('legalRepresentatives','id_referral','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $date = Carbon::now();
        $day = $date->format('d');
        $mont = $date->isoFormat('MMMM');
        $year = $date->format('Y');
        $legalRepresentative = new LegalRepresentative();
        $legalRepresentative= Arr::add($legalRepresentative, 'day', $day);
        $legalRepresentative= Arr::add($legalRepresentative, 'mont', $mont);
        $legalRepresentative= Arr::add($legalRepresentative, 'year', $year);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('legal-representative.create', compact('legalRepresentative','studentReferral','id_referral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_referral = StudentReferral::find($request->id_referral);
        if($request->age < 18){
            $legalRepresentative = new LegalRepresentative($request->all());
            if($request->has('patient_signature')&& $request->has('representative_signature')){
                $file_signature =$request->file('patient_signature');
                $representative_signature =$request->file('representative_signature');
                if(!$this->uploadSignature( $file_signature,rand()) && !$this->uploadSignature( $representative_signature,rand())){
                    $request->session()->flash('file_error', $this->error_message);
                    return redirect()->route('index.legal-representatives')->withInput();
                }
                $legalRepresentative->patient_signature=$this->new_name_signature;
                $legalRepresentative->representative_signature=$this->new_name_signature;
            }
            request()->validate(LegalRepresentative::rulesRepresentative());
            $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
            $legalRepresentative->form_id = $crateData->id;
            $legalRepresentative->save();
        }  elseif ($request->age >= 18){
            return redirect()->route('remision_estudiantes.index')
            ->with('success', 'El paciente es menor de edad, intente de nuevo con el formulario Asentimiento informado y Consentimiento informado representante legal.');
        }
        $id=$legalRepresentative->form->studentReferral->id;
        $id_referral = StudentReferral::find($id);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 2]);

        return redirect()->route('index.legal-representatives',$id_referral->id)
            ->with('success', 'LegalRepresentative created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_referral)
    {

        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        $legalRepresentative = LegalRepresentative::find($id);

        return view('legal-representative.show', compact('legalRepresentative','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $legalRepresentative = LegalRepresentative::find($id);
        $psychological = User::find($legalRepresentative->id_psychological);
        $psychopedagogical = User::find($legalRepresentative->id_psychopedagogical);

        $pdf = PDF::loadView('legal-representative.pdf', compact(
            'legalRepresentative','studentReferral', 'psychopedagogical', 'psychological'
        ));

        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_referral)
    {
        $legalRepresentative = LegalRepresentative::find($id);
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('legal-representative.edit', compact('legalRepresentative','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LegalRepresentative $legalRepresentative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LegalRepresentative $legalRepresentative)
    {
        $legalRepresentative = LegalRepresentative::find($request->id);
        if($request->age < 18){
            if($request->has('patient_signature')){
                $file_signature =$request->file('patient_signature');
                $new_name_file_signature = uniqid(rand(), true).'.'.strtolower($file_signature->getClientOriginalExtension());
                $result_file_signature =Storage::disk('public')->put('signatures/'.$new_name_file_signature,File::get($file_signature));//almacenar en el disco
                if(!$result_file_signature){
                    $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                    return redirect()->route('usuarios.index',[$consent]->with('consent',$consent));
                }
                if(Storage::disk('public')->exists('signatures/'.$legalRepresentative->file_signature)){
                    Storage::disk('public')->delete('signatures/'.$legalRepresentative->file_signature);
                }
                $legalRepresentative->patient_signature=$new_name_file_signature;
            }
            if($request->has('representative_signature')){
                $representative_signature =$request->file('representative_signature');
                $new_name_representative_signature = uniqid(rand(), true).'.'.strtolower($representative_signature->getClientOriginalExtension());
                $result_representative_signature =Storage::disk('public')->put('signatures/'.$new_name_representative_signature,File::get($representative_signature));//almacenar en el disco
                if(!$result_representative_signature){
                    $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                    return redirect()->route('usuarios.index',[$consent]->with('consent',$consent));
                }
                if(Storage::disk('public')->exists('signatures/'.$legalRepresentative->representative_signature)){
                    Storage::disk('public')->delete('signatures/'.$legalRepresentative->representative_signature);
                }
                $legalRepresentative->representative_signature=$new_name_representative_signature;
            }
            request()->validate(LegalRepresentative::rulesRepresentativeEdit());
            $data = $request->all();
            $legalRepresentative->fill($data);
            $legalRepresentative->save();

        }  elseif ($request->age >= 18){
            $id_referral = StudentReferral::find($request->id_referral);
            return redirect()->route('remision_estudiantes.index')
            ->with('success', 'El paciente es menor de edad, intente de nuevo con el formulario Asentimiento informado y Consentimiento informado representante legal.');
        }
        $id_referral = StudentReferral::find($request->id_referral);
        return redirect()->route('index.legal-representatives',$id_referral->id)
            ->with('success', 'LegalRepresentative updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $legalRepresentative = LegalRepresentative::find($id);
        $form_id = $legalRepresentative->form_id;
        $consent = LegalRepresentative::find($id)->delete();
        $form = Form::find($form_id)->delete();
        $id_referral = StudentReferral::find($id_referral);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 1]);
        return redirect()->route('index.legal-representatives',$id_referral)
            ->with('success', 'LegalRepresentative deleted successfully');
    }
}
