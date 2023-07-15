<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Models\CaseClosure;
use App\Traits\UploadImage;
use Illuminate\Support\Arr;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\StudentReferral;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

/**
 * Class CaseClosureController
 * @package App\Http\Controllers
 */
class CaseClosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $caseClosures = CaseClosure::paginate();
        $id_referral = StudentReferral::find($id);
        $i = 0;
        $caseClosures = StudentReferral::select('case_closures.*','patients.name','patients.last_name','student_referrals.remission_date')
            ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
            ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
            ->join('case_closures', 'forms.id', '=', 'case_closures.form_id')
            ->where('referrals_id', $id_referral->id)->get();
        return view('case-closure.index', compact('caseClosures','id_referral','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $date = Carbon::now();
        $caseClosure = new CaseClosure();
        $caseClosure= Arr::add($caseClosure, 'end_session', $date);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('case-closure.create', compact('caseClosure','studentReferral','id_referral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caseClosure = new CaseClosure($request->all());
        request()->validate(CaseClosure::$rules);
        $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
        $caseClosure->form_id = $crateData->id;
        $caseClosure->save();
        $id=$caseClosure->form->studentReferral->id;
        $id_referral = StudentReferral::find($id);
        $status= StudentReferral::where('id',$id_referral->id)->update(['status_id' => 4]);

        return redirect()->route('index.case-closures',$id_referral->id)
            ->with('success', 'CaseClosure created successfully.');
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
        $caseClosure = CaseClosure::find($id);
        return view('case-closure.show', compact('caseClosure','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $caseClosure = CaseClosure::find($id);
        $professional = User::find($caseClosure->id_professional);


        $pdf = PDF::loadView('case-closure.pdf', compact(
            'caseClosure','studentReferral','professional'
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
        $caseClosure = CaseClosure::find($id);
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('case-closure.edit', compact('caseClosure','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CaseClosure $caseClosure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseClosure $caseClosure)
    {

        request()->validate(CaseClosure::$rulesEdit);

        $caseClosure->update($request->all());
        $id_referral = StudentReferral::find($request->id_referral);

        return redirect()->route('index.case-closures',$id_referral->id)
            ->with('success', 'CaseClosure updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $caseClosure = CaseClosure::find($id);
        $form_id = $caseClosure->form_id;
        $caseClosure = CaseClosure::find($id)->delete();
        $form = Form::find($form_id)->delete();
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return redirect()->route('index.case-closures',$id_referral)
            ->with('success', 'CaseClosure deleted successfully');
    }
}
