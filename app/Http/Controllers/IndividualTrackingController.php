<?php

namespace App\Http\Controllers;

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
use App\Http\Requests\IndividualTracking\EditRequest;
use App\Models\IndividualTracking;
use Illuminate\Http\Request;

/**
 * Class IndividualTrackingController
 * @package App\Http\Controllers
 */
class IndividualTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_referral = StudentReferral::find($id);
        $i = 0;
        $individualTrackings = StudentReferral::select('individual_trackings.*','patients.name','patients.last_name')
                                        ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                        ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                        ->join('individual_trackings', 'forms.id', '=', 'individual_trackings.form_id')
                                        ->where('referrals_id', $id_referral->id)->get();

        return view('individual-tracking.index', compact('individualTrackings','id_referral','i'));
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

        $id_referral = StudentReferral::find($id);
        $i = 0;
        $individualTracking = StudentReferral::select('individual_trackings.session_number')
                                        ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                        ->join('individual_trackings', 'forms.id', '=', 'individual_trackings.form_id')
                                        ->orderBy('session_number', 'desc')
                                        ->where('referrals_id', $id_referral->id)->first();
        if($individualTracking == '')
        {
            $individualTracking = new IndividualTracking();
            $individualTracking->session_number++;
        }
        elseif($individualTracking->session_number!='')
        {
            $individualTracking->session_number++;
        }
        $individualTracking= Arr::add($individualTracking, 'day', $day);
        $individualTracking= Arr::add($individualTracking, 'mont', $mont);
        $individualTracking= Arr::add($individualTracking, 'year', $year);


        if($individualTracking->session_number <= 6){
            return view('individual-tracking.create', compact('individualTracking','studentReferral','id_referral'));
        }else{
            return redirect()->route('index.individual.trackings',$id_referral)
            ->with('success', 'La remision de este estudiante ya tiene el maximo de sesiones.');
        }

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
        $individualTracking = new IndividualTracking($request->all());
        $date = Carbon::now();
        $individualTracking->date_tracking=$date;
        request()->validate(IndividualTracking::$rules);
        $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
        $individualTracking->form_id = $crateData->id;
        $individualTracking->save();

        return redirect()->route('index.individual.trackings',$id_referral->id)
            ->with('success', 'IndividualTracking created successfully.');
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
        $individualTracking = IndividualTracking::find($id);

        $creation_date = $individualTracking->created_at;

        $day = $creation_date->format('d');
        $mont = $creation_date->isoFormat('MMMM');
        $year = $creation_date->format('Y');

        $individualTracking= Arr::add($individualTracking, 'day', $day);
        $individualTracking= Arr::add($individualTracking, 'mont', $mont);
        $individualTracking= Arr::add($individualTracking, 'year', $year);

        return view('individual-tracking.show', compact('individualTracking','studentReferral','id_referral'));
    }

    public function pdf($id, $id_referral)
    {
        $studentReferral = StudentReferral::find($id_referral);
        $id_referral = $studentReferral->id;
        $individualTracking = IndividualTracking::find($id);

        $creation_date = $individualTracking->created_at;

        $day = $creation_date->format('d');
        $mont = $creation_date->isoFormat('MMMM');
        $year = $creation_date->format('Y');
        $individualTracking= Arr::add($individualTracking, 'day', $day);
        $individualTracking= Arr::add($individualTracking, 'mont', $mont);
        $individualTracking= Arr::add($individualTracking, 'year', $year);
        $user = User::find($individualTracking->user_id);

        $pdf = PDF::loadView('individual-tracking.pdf', compact(
            'individualTracking','studentReferral', 'user'
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
        $individualTracking = IndividualTracking::find($id);
        $creation_date = $individualTracking->created_at;

        $day = $creation_date->format('d');
        $mont = $creation_date->isoFormat('MMMM');
        $year = $creation_date->format('Y');

        $individualTracking= Arr::add($individualTracking, 'day', $day);
        $individualTracking= Arr::add($individualTracking, 'mont', $mont);
        $individualTracking= Arr::add($individualTracking, 'year', $year);

        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;
        return view('individual-tracking.edit', compact('individualTracking','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  IndividualTracking $individualTracking
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, IndividualTracking $individualTracking)
    {

        $individualTracking = IndividualTracking::find($request->id);

        $individualTracking->fill($request->all());
        /*
        if ($individualTracking->creation_date == ''){
            $data_creation_date=$individualTracking->creation_date;
            $individualTracking->creation_date=$data_creation_date;
        }
        */
        $individualTracking->save();
        $id_referral = StudentReferral::find($request->id_referral);

        return redirect()->route('index.individual.trackings',$id_referral->id)
            ->with('success', 'IndividualTracking updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, $id_referral)
    {

        $individualTracking = IndividualTracking::find($id);
        $form_id = $individualTracking->form_id;
        $individualTracking = IndividualTracking::find($id)->delete();
        $form = Form::find($form_id)->delete();

        return redirect()->route('index.individual.trackings',$id_referral)
            ->with('success', 'IndividualTracking deleted successfully');
    }
}
