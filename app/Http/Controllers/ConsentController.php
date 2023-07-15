<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Models\Consent;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\TypeForm ;
use App\Models\StudentReferral;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


/**
 * Class ConsentController
 * @package App\Http\Controllers
 */
class ConsentController extends Controller
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
        $consents = StudentReferral::select('consents.*','patients.name','patients.last_name')
                                        ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                        ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                        ->join('consents', 'forms.id', '=', 'consents.form_id')
                                        ->where('referrals_id', $id_referral->id)->get();
        return view('consent.index', compact('consents','id_referral','i'));
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
        $consent = new Consent();
        $consent= Arr::add($consent, 'day', $day);
        $consent= Arr::add($consent, 'mont', $mont);
        $consent= Arr::add($consent, 'year', $year);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('consent.create', compact('consent','studentReferral','id_referral'));
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
        if($request->age >= 18){
            $consents = new Consent($request->all());
            if($request->has('patient_signature')){
                $file_signature =$request->file('patient_signature');
                if(!$this->uploadSignature( $file_signature,rand())){
                    $request->session()->flash('file_error', $this->error_message);
                    return redirect()->route('create.consent',$id_referral->id)->withInput();
                }
                $consents->patient_signature=$this->new_name_signature;
            }
            request()->validate(Consent::rulesConsent());
            $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
            $consents->form_id = $crateData->id;
            $consents->save();
        }   elseif ($request->age < 18){
            return redirect()->route('remision_estudiantes.index')
                ->with('success', 'El paciente es menor de edad, intente de nuevo con el formulario Asentimiento informado y Consentimiento informado representante legal.');
        }
        $id=$consents->form->studentReferral->id;
        $id_referral = StudentReferral::find($id);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 2]);

        return redirect()->route('index.consent',$id_referral->id)
            ->with('success', 'Consent created successfully.');

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
        $consent = Consent::find($id);

        return view('consent.show', compact('consent','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $consent = Consent::find($id);
        $psychological = User::find($consent->id_psychological);
        $psychopedagogical = User::find($consent->id_psychopedagogical);

        $pdf = PDF::loadView('consent.pdf', compact(
            'consent','studentReferral', 'psychopedagogical', 'psychological'
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
        $consent = Consent::find($id);
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('consent.edit', compact('consent','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consent $consent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consent $consent)
    {
        $consent = Consent::find($request->id);
        if($request->age >= 18) {
            if ($request->has('patient_signature')) {
                $file_signature = $request->file('patient_signature');
                $new_name_signature = uniqid(rand(), true) . '.' . strtolower($file_signature->getClientOriginalExtension());
                $result_signature = Storage::disk('public')->put('signatures/' . $new_name_signature, File::get($file_signature));//almacenar en el disco

                if (!$result_signature) {
                    $request->session()->flash('message', 'Ocurrio un error al cargar la imagen');
                    return redirect()->route('index.consent', [$consent]->with('consent', $consent));
                }

                if (Storage::disk('public')->exists('signatures/' . $consent->file_signature)) {
                    Storage::disk('public')->delete('signatures/' . $consent->file_signature);
                }

                $consent->patient_signature = $new_name_signature;
            }

            request()->validate(Consent::rulesConsentEdit());
            $data = $request->all();
            $consent->fill($data);
            $consent->save();
        }  else {
            return redirect()->route('remision_estudiantes.index')
                ->with('success', 'El paciente es menor de edad, intente de nuevo con el formulario Asentimiento informado y Consentimiento informado representante legal.');
        }
        $id_referral = StudentReferral::find($request->id_referral);
        return redirect()->route('index.consent', $id_referral->id)
            ->with('success', 'Consent updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $consent = Consent::find($id);
        $form_id = $consent->form_id;
        $consent = Consent::find($id)->delete();
        $form = Form::find($form_id)->delete();
        $id_referral = StudentReferral::find($id_referral);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 1]);
        return redirect()->route('index.consent',$id_referral)
            ->with('success', 'Consent deleted successfully');

    }
}
