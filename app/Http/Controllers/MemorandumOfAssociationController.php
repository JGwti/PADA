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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\MemorandumOfAssociation;


/**
 * Class MemorandumOfAssociationController
 * @package App\Http\Controllers
 */
class MemorandumOfAssociationController extends Controller
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
        $memorandumOfAssociations = StudentReferral::select('memorandum_of_associations.*','patients.name','patients.last_name')
                                                    ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                                    ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                                    ->join('memorandum_of_associations', 'forms.id', '=', 'memorandum_of_associations.form_id')
                                                    ->where('referrals_id', $id_referral->id)->get();


        return view('memorandum-of-association.index', compact('memorandumOfAssociations','id_referral','i'));

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
        $memorandumOfAssociation = new MemorandumOfAssociation();
        $memorandumOfAssociation= Arr::add($memorandumOfAssociation, 'day', $day);
        $memorandumOfAssociation= Arr::add($memorandumOfAssociation, 'mont', $mont);
        $memorandumOfAssociation= Arr::add($memorandumOfAssociation, 'year', $year);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('memorandum-of-association.create', compact('memorandumOfAssociation','studentReferral','id_referral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $memorandumOfAssociation = new MemorandumOfAssociation($request->all());
        if($request->has('patient_signature')){
            $file_signature =$request->file('patient_signature');
            if(!$this->uploadSignature( $file_signature,rand())){
                $request->session()->flash('file_error', $this->error_message);
                return redirect()->route('memorandumOfAssociationimientos.index')->withInput();
            }
            $request->patient_signature=$this->new_name_signature;
        }
        request()->validate(MemorandumOfAssociation::rulesAssociation());
        $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->form_id]);
        $memorandumOfAssociation->form_id = $crateData->id;
        $memorandumOfAssociation->patient_signature = $request->patient_signature;
        $memorandumOfAssociation->save();
        $id=$memorandumOfAssociation->form->studentReferral->id;
        $id_referral = StudentReferral::find($id);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 3]);
        return redirect()->route('index.memorandum-of-associations',$id_referral->id)
        ->with('success', 'MemorandumOfAssociation created successfully.');
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
        $memorandumOfAssociation = MemorandumOfAssociation::find($id);

        return view('memorandum-of-association.show', compact('memorandumOfAssociation','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $memorandumOfAssociation = MemorandumOfAssociation::find($id);
        $psychological = User::find($memorandumOfAssociation->id_psychological);
        $psychopedagogical = User::find($memorandumOfAssociation->id_psychopedagogical);

        $pdf = PDF::loadView('case-closure.pdf', compact(
            'memorandumOfAssociation','studentReferral', 'psychopedagogical', 'psychological'
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
        $memorandumOfAssociation = MemorandumOfAssociation::find($id);
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;


        return view('memorandum-of-association.edit', compact('memorandumOfAssociation','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MemorandumOfAssociation $memorandumOfAssociation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemorandumOfAssociation $memorandumOfAssociation)
    {
        $memorandumOfAssociation = MemorandumOfAssociation::find($request->id_referral);
        if($request->has('patient_signature')){
            $file_signature =$request->file('patient_signature');
            $new_name_signature = uniqid(rand(), true).'.'.strtolower($file_signature->getClientOriginalExtension());
            $result_signature =Storage::disk('public')->put('signatures/'.$new_name_signature,File::get($file_signature));//almacenar en el disco
            if(!$result_signature){
                $request->session()->flash('message','Ocurrio un error al cargar la imagen');
                return redirect()->route('usuarios.index',[$memorandumOfAssociation]->with('memorandumOfAssociation',$memorandumOfAssociation));
            }
            if(Storage::disk('public')->exists('signatures/'.$memorandumOfAssociation->file_signature)){
                Storage::disk('public')->delete('signatures/'.$memorandumOfAssociation->file_signature);
            }
            $request->patient_signature=$new_name_signature;
        }
        request()->validate(MemorandumOfAssociation::rulesAssociationEdit());
        $data = $request->all();
        $memorandumOfAssociation->fill($data);
        if($request->has('patient_signature')){
            $memorandumOfAssociation->patient_signature=$new_name_signature;
        }
        $memorandumOfAssociation->save();
        $id_referral = StudentReferral::find($request->id_referral);

        return redirect()->route('index.memorandum-of-associations',$id_referral->id)
            ->with('success', 'MemorandumOfAssociation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $memorandumOfAssociation = MemorandumOfAssociation::find($id)->delete();
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;

        return redirect()->route('index.memorandum-of-associations',$id_referral)
            ->with('success', 'MemorandumOfAssociation deleted successfully');
    }
}
