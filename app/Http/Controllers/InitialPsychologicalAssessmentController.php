<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\TypeForm ;
use App\Models\StudentReferral;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\InitialPsychologicalAssessment;
use App\Http\Requests\initialPsychological\EditRequest;
use Illuminate\Http\Request;


/**
 * Class InitialPsychologicalAssessmentController
 * @package App\Http\Controllers
 */
class InitialPsychologicalAssessmentController extends Controller
{
    protected $route;

    public function __construct(Route $route){

        $this->route = $route;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_referral = StudentReferral::find($id);
        $i = 0;
        $initialPsychologicalAssessments = StudentReferral::select('initial_psychological_assessments.*','patients.name','patients.last_name')
                                        ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                        ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                        ->join('initial_psychological_assessments', 'forms.id', '=', 'initial_psychological_assessments.form_id')
                                        ->where('referrals_id', $id_referral->id)->get();

        return view('initial-psychological-assessment.index', compact('initialPsychologicalAssessments','id_referral','i'));

        $initialPsychologicalAssessments = InitialPsychologicalAssessment::paginate();

        return view('initial-psychological-assessment.index', compact('initialPsychologicalAssessments'))
            ->with('i', (request()->input('page', 1) - 1) * $initialPsychologicalAssessments->perPage());
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
        $initialPsychologicalAssessment = new InitialPsychologicalAssessment();
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'day', $day);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'mont', $mont);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'year', $year);
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('initial-psychological-assessment.create', compact('initialPsychologicalAssessment','studentReferral','id_referral'));

        $initialPsychologicalAssessment = new InitialPsychologicalAssessment();
        return view('initial-psychological-assessment.create', compact('initialPsychologicalAssessment'));
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

        $initialPsychologicalAssessment = new InitialPsychologicalAssessment($request->all());
        $date = Carbon::now();
        $initialPsychologicalAssessment->creation_date=$date;
        request()->validate(InitialPsychologicalAssessment::$rules);

            $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
            $initialPsychologicalAssessment->form_id = $crateData->id;
            $initialPsychologicalAssessment->save();

        return redirect()->route('index.initial.psychological',$id_referral->id)
            ->with('success', 'InitialPsychologicalAssessment created successfully.');
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
        $initialPsychologicalAssessment = InitialPsychologicalAssessment::find($id);
        $creation_date = $initialPsychologicalAssessment->created_at;

        $day = $creation_date->format('d');
        $mont = $creation_date->isoFormat('MMMM');
        $year = $creation_date->format('Y');
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'day', $day);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'mont', $mont);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'year', $year);

        return view('initial-psychological-assessment.show', compact('initialPsychologicalAssessment','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $initialPsychologicalAssessment = InitialPsychologicalAssessment::find($id);
        $creation_date = $initialPsychologicalAssessment->created_at;

        $day = $creation_date->format('d');
        $mont = $creation_date->isoFormat('MMMM');
        $year = $creation_date->format('Y');
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'day', $day);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'mont', $mont);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'year', $year);
        $psychological = User::find($initialPsychologicalAssessment->id_psychological);

        $pdf = PDF::loadView('initial-psychological-assessment.pdf', compact(
            'initialPsychologicalAssessment','studentReferral', 'psychological'
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
        $initialPsychologicalAssessment = InitialPsychologicalAssessment::find($id);
        $creation_date = $initialPsychologicalAssessment->created_at;

        $day = $creation_date->format('d');
        $mont = $creation_date->isoFormat('MMMM');
        $year = $creation_date->format('Y');

        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'day', $day);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'mont', $mont);
        $initialPsychologicalAssessment= Arr::add($initialPsychologicalAssessment, 'year', $year);

        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('initial-psychological-assessment.edit', compact('initialPsychologicalAssessment','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InitialPsychologicalAssessment $initialPsychologicalAssessment
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, InitialPsychologicalAssessment $initialPsychologicalAssessment, $id, Route $route)
    {
        $initialPsychologicalAssessment = InitialPsychologicalAssessment::find($id);
        $initialPsychologicalAssessment->fill($request->all());
        //dd($initialPsychologicalAssessment);

        /*
        $Update_date = $initialPsychologicalAssessment->creation_date;

        $day = Carbon::parse($Update_date)->format('d');
        $mont = Carbon::parse($Update_date)->format('m');
        $year = Carbon::parse($Update_date)->format('Y');
        $r_mont = Carbon::parse($request->mont)->format('m');

        if ($day != $request->day || $mont != $request->mont || $year != $request->year ){
            $date_update = Carbon::update($request->year,$request->mont, $day != $request->day);
            dd($date_update);

            $initialPsychologicalAssessment->creation_date= $date_update;

        }
        */


        $initialPsychologicalAssessment->save();
        $id_referral = StudentReferral::find($request->id_referral);

        return redirect()->route('index.initial.psychological',$id_referral->id)
            ->with('success', 'InitialPsychologicalAssessment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {
        $initialPsychologicalAssessment = InitialPsychologicalAssessment::find($id);
        $form_id = $initialPsychologicalAssessment->form_id;
        $initialPsychologicalAssessment = InitialPsychologicalAssessment::find($id)->delete();
        $form = Form::find($form_id)->delete();
        return redirect()->route('index.initial.psychological',$id_referral)
            ->with('success', 'InitialPsychologicalAssessment deleted successfully');
    }
}
