<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Form;
use App\Models\Consent;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\StudentReferral;
use App\Models\InformedDissent;

use Illuminate\Http\Request;

/**
 * Class StudentReferralController
 * @package App\Http\Controllers
 */
class StudentReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentReferrals = StudentReferral::paginate();

        return view('student-referral.index', compact('studentReferrals'))
            ->with('i', (request()->input('page', 1) - 1) * $studentReferrals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentReferral = new StudentReferral();
        return view('student-referral.create', compact('studentReferral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(StudentReferral::$rules);

        $studentReferral = new StudentReferral();

        $data = $request->all();
        $studentReferral->fill($data) ;
        $studentReferral->status_id = 1;
        $studentReferral->save();

        return redirect()->route('remision_estudiantes.index')
            ->with('success', 'StudentReferral created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentReferral = StudentReferral::find($id);

        return view('student-referral.show', compact('studentReferral'));
    }

    public function pdf($id)
    {
        $studentReferral = StudentReferral::find($id);
        $professional = User::find($studentReferral->user_id);

        $pdf = PDF::loadView('student-referral.pdf', compact(
            'studentReferral','professional'
        ));

        return $pdf->stream();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentReferral = StudentReferral::find($id);

        return view('student-referral.edit', compact('studentReferral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  StudentReferral $studentReferral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentReferral $studentReferral, $id)
    {

        request()->validate(StudentReferral::$rules);
        $studentReferral = StudentReferral::find($id);

        $data = $request->all();
        $studentReferral->fill($data) ;
        $studentReferral->save();

        return redirect()->route('remision_estudiantes.index')
            ->with('success', 'StudentReferral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $studentReferral = StudentReferral::find($id);


        $form_id = Form::select('forms.id')
                    ->where('referrals_id', $studentReferral->id)
                    ->first();
        $form = Form::find($form_id->id)->delete();
        $studentReferral = StudentReferral::find($id)->delete();

        return redirect()->route('remision_estudiantes.index')
            ->with('success', 'StudentReferral deleted successfully');
    }
    public function getReferralForms($id)
    {
        $id_referral = StudentReferral::find($id);
        $form = Form::get()->where('referrals_id', '=' , $id_referral->id)->first();
        if(!is_null($form)){

            $consent = StudentReferral::select('consents.*')
                       ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                       ->join('consents', 'forms.id','consents.form_id')
                       ->where('referrals_id', $id)
                       ->where('type_form_id', 2)->first();

            $assent = StudentReferral::select('assents.*')
                       ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                       ->join('assents', 'forms.id','assents.form_id')
                       ->where('referrals_id', $id)
                       ->where('type_form_id', 3)->first();

            $legal_representative = StudentReferral::select('legal_representatives.*')
                       ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                       ->join('legal_representatives', 'forms.id','legal_representatives.form_id')
                       ->where('referrals_id', $id)
                       ->where('type_form_id', 4)->first();

            if( !is_null($consent) || !is_null($assent) || !is_null($legal_representative) ){
                return view('form.index', compact('id_referral'));
            }

            $informedDissents = StudentReferral::select('informed_dissents.*')
                                ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                ->join('informed_dissents', 'forms.id','informed_dissents.form_id')
                                ->where('referrals_id', $id)
                                ->where('type_form_id', 5)->first();

            if(!is_null($informedDissents)){
                return view('form.index-dissent', compact('id_referral'));
                }
            }
            return view('form.index-consent', compact('id_referral'));
        }
    }
