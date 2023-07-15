<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Models\Assent;
use App\Traits\UploadImage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\StudentReferral;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Assent\EditRequest;


/**
 * Class AssentController
 * @package App\Http\Controllers
 */
class AssentController extends Controller
{
    use UploadImage;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $assents = Assent::paginate();
        $id_referral = StudentReferral::find($id);
        $i = 0;
        $assents = StudentReferral::select('assents.*','patients.name','patients.last_name')
            ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
            ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
            ->join('assents', 'forms.id', '=', 'assents.form_id')
            ->where('referrals_id', $id_referral->id)->get();
        return view('assent.index', compact('assents','id_referral','i'));
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
        $assent = new Assent();
        $assent= Arr::add($assent, 'day', $day);
        $assent= Arr::add($assent, 'mont', $mont);
        $assent= Arr::add($assent, 'year', $year);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;

        return view('assent.create', compact('assent','studentReferral','id_referral'));
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
            $assent = new Assent($request->all());
            if($request->has('patient_signature')&& $request->has('representative_signature')){
                $file_signature =$request->file('patient_signature');
                $representative_signature =$request->file('representative_signature');
                if(!$this->uploadSignature( $file_signature,rand()) || !$this->uploadSignature( $representative_signature,rand())){
                    $request->session()->flash('file_error', $this->error_message);
                    return redirect()->route('create.assent',$id_referral->id)->withInput();
                }
                $assent->patient_signature=$this->new_name_signature;
                $assent->representative_signature=$this->new_name_signature;
            }
            request()->validate(Assent::rulesAssent());
            $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
            $assent->form_id = $crateData->id;
            $assent->save();
        }  elseif ($request->age >= 18){
            return redirect()->route('remision_estudiantes.index')
                ->with('success', 'El paciente es menor de edad, intente de nuevo con el formulario Asentimiento informado y Consentimiento informado representante legal.');
        }
        $id=$assent->form->studentReferral->id;
        $id_referral = StudentReferral::find($id);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 2]);
        return redirect()->route('index.assent',$id_referral->id)->with('id_referrals',$id_referral)
            ->with('success', 'Assent created successfully.');
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
        $assent = Assent::find($id);

        return view('assent.show', compact('assent','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $assent = Assent::find($id);
        $psychological = User::find($assent->id_psychological);
        $psychopedagogical = User::find($assent->id_psychopedagogical);

        $pdf = PDF::loadView('assent.pdf', compact(
            'assent','studentReferral', 'psychopedagogical', 'psychological'
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
        $assent = Assent::find($id);
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('assent.edit', compact('assent','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Assent $assent
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Assent $assent, Route $route)
    {
        $assent = Assent::find($request->id);


        if($request->age < 18){
            if($request->has('patient_signature')){
                $file_signature =$request->file('patient_signature');
                $new_name_file_signature = uniqid(rand(), true).'.'.strtolower($file_signature->getClientOriginalExtension());
                $result_file_signature =Storage::disk('public')->put('signatures/'.$new_name_file_signature,File::get($file_signature));//almacenar en el disco
                if(!$result_file_signature){
                    $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                    return redirect()->route('usuarios.index',[$consent]->with('consent',$consent));
                }
                if(Storage::disk('public')->exists('signatures/'.$assent->file_signature)){
                    Storage::disk('public')->delete('signatures/'.$assent->file_signature);
                }
                $request->patient_signature=$new_name_file_signature;
            }
            if($request->has('representative_signature')){
                $representative_signature =$request->file('representative_signature');
                $new_name_representative_signature = uniqid(rand(), true).'.'.strtolower($representative_signature->getClientOriginalExtension());
                $result_representative_signature =Storage::disk('public')->put('signatures/'.$new_name_representative_signature,File::get($representative_signature));//almacenar en el disco
                if(!$result_representative_signature){
                    $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                    return redirect()->route('usuarios.index',[$consent]->with('consent',$consent));
                }
                if(Storage::disk('public')->exists('signatures/'.$assent->representative_signature)){
                    Storage::disk('public')->delete('signatures/'.$assent->representative_signature);
                }
                $request->representative_signature=$new_name_representative_signature;
            }
            $data = $request->all();
            $assent->fill($data);
            $assent->save();




        }  elseif ($request->age >= 18){
            $id_referral = StudentReferral::find($request->id_referral);
            return redirect()->route('remision_estudiantes.index')
                ->with('success', 'El paciente es menor de edad, intente de nuevo con el formulario Asentimiento informado y Consentimiento informado representante legal.');
        }

        $id_referral = StudentReferral::find($request->id_referral);
        return redirect()->route('index.assent',$id_referral->id)->with('id_referrals',$id_referral)
            ->with('success', 'Assent created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $assent = Assent::find($id);
        $form_id = $assent->form_id;
        $consent = Assent::find($id)->delete();
        $form = Form::find($form_id)->delete();
        $id_referral = StudentReferral::find($id_referral);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 1]);
        return redirect()->route('index.assent',$id_referral)
            ->with('success', 'Assent deleted successfully');
    }
}
