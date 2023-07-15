<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use Illuminate\Support\Arr;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use App\Models\InformedDissent;
use App\Models\StudentReferral;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class InformedDissentController
 * @package App\Http\Controllers
 */
class InformedDissentController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $informedDissents = InformedDissent::paginate();
        $id_referral = StudentReferral::find($id);
        $i = 0;
        $informedDissents = StudentReferral::select('informed_dissents.*','patients.name','patients.last_name')
                                                    ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                                    ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')                                           ->join('informed_dissents', 'forms.id', '=', 'informed_dissents.form_id')                                            ->where('referrals_id', $id_referral->id)->get();
        return view('informed-dissent.index', compact('informedDissents','id_referral','i'));
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
        $informedDissent = new InformedDissent();
        $informedDissent= Arr::add($informedDissent, 'day', $day);
        $informedDissent= Arr::add($informedDissent, 'mont', $mont);
        $informedDissent= Arr::add($informedDissent, 'year', $year);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('informed-dissent.create', compact('informedDissent','studentReferral','id_referral'));
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
        $informedDissent = new InformedDissent($request->all());
        if($request->has('patient_signature')){
            $file_signature =$request->file('patient_signature');
            if(!$this->uploadSignature( $file_signature,rand())){
                $request->session()->flash('file_error', $this->error_message);
                return redirect()->route('create.informed-dissents',$id_referral->id)->withInput();
            }
            $informedDissent->patient_signature=$this->new_name_signature;
        }
        request()->validate(InformedDissent::rulesDissent());
        $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
        $informedDissent->form_id = $crateData->id;
        $informedDissent->save();
        $id=$informedDissent->form->studentReferral->id;
        $id_referral = StudentReferral::find($id);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 5]);

        return redirect()->route('index.informed-dissents',$id_referral->id)
            ->with('success', 'InformedDissent created successfully.');
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
        $informedDissent = InformedDissent::find($id);

        return view('informed-dissent.show', compact('informedDissent','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $informedDissent = InformedDissent::find($id);
        $psychological = User::find($informedDissent->id_psychological);
        $psychopedagogical = User::find($informedDissent->id_psychopedagogical);

        $pdf = PDF::loadView('informed-dissent.pdf', compact(
            'informedDissent','studentReferral', 'psychopedagogical', 'psychological'
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
        $informedDissent = InformedDissent::find($id);
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('informed-dissent.edit', compact('informedDissent','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InformedDissent $informedDissent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformedDissent $informedDissent)
    {
        $informedDissent = InformedDissent::find($request->id);
        if($request->has('patient_signature')){
            $file_signature =$request->file('patient_signature');
            $new_name_signature = uniqid(rand(), true).'.'.strtolower($file_signature->getClientOriginalExtension());
            $result_signature =Storage::disk('public')->put('signatures/'.$new_name_signature,File::get($file_signature));//almacenar en el disco
            if(!$result_signature){
                $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                return redirect()->route('usuarios.index',[$informedDissent]->with('informedDissent',$informedDissent));
            }
            if(Storage::disk('public')->exists('signatures/'.$informedDissent->file_signature)){
                Storage::disk('public')->delete('signatures/'.$informedDissent->file_signature);
            }
            $informedDissent->patient_signature=$new_name_signature;
        }

        request()->validate(InformedDissent::rulesDissentEdit());
        $data = $request->all();
        $informedDissent->fill($data);
        $informedDissent->save();
        $id_referral = StudentReferral::find($request->id_referral);
        return redirect()->route('index.informed-dissents',$id_referral->id)
            ->with('success', 'InformedDissent updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $informedDissent = InformedDissent::find($id);
        $form_id = $informedDissent->form_id;
        $informedDissent = InformedDissent::find($id)->delete();
        $form = Form::find($form_id)->delete();
        $id_referral = StudentReferral::find($id_referral);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 1]);
        return redirect()->route('index.informed-dissents',$id_referral)
            ->with('success', 'InformedDissent deleted successfully');
    }
}
