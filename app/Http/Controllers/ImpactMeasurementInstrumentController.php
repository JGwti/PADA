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
use App\Http\Requests\ImpactMeasurementInstrument\EditRequest;
use App\Models\ImpactMeasurementInstrument;
use Illuminate\Http\Request;

/**
 * Class ImpactMeasurementInstrumentController
 * @package App\Http\Controllers
 */
class ImpactMeasurementInstrumentController extends Controller
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
        $impactMeasurementInstruments = StudentReferral::select('impact_measurement_instruments.*','patients.name','patients.last_name')
                                        ->join('patients', 'student_referrals.patient_id', '=', 'patients.id')
                                        ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                        ->join('impact_measurement_instruments', 'forms.id', '=', 'impact_measurement_instruments.form_id')
                                        ->where('referrals_id', $id_referral->id)->get();

        return view('impact-measurement-instrument.index', compact('impactMeasurementInstruments','id_referral','i'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_referral = StudentReferral::find($id);
        $impactMeasurementInstrument = StudentReferral::select('individual_trackings.session_number')
                                        ->join('forms', 'student_referrals.id', '=', 'forms.referrals_id')
                                        ->join('individual_trackings', 'forms.id', '=', 'individual_trackings.form_id')
                                        ->orderBy('session_number', 'desc')
                                        ->where('referrals_id', $id_referral->id)->first();
        $impactMeasurementInstrument = new ImpactMeasurementInstrument();
        $studentReferral = StudentReferral::find($id);
        $id_referral =$studentReferral->id;
        return view('impact-measurement-instrument.create', compact('impactMeasurementInstrument','studentReferral','id_referral'));
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
        $impactMeasurementInstrument = new ImpactMeasurementInstrument($request->all());

        request()->validate(ImpactMeasurementInstrument::$rules)    ;

        $crateData = Form::create(['referrals_id'=>$request->id_referral,'type_form_id'=>$request->type_form_id]);
        $impactMeasurementInstrument->form_id = $crateData->id;
        $impactMeasurementInstrument->save();

        return redirect()->route('index.impact.measurement', $id_referral->id)
            ->with('success', 'ImpactMeasurementInstrument created successfully.');
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
        $impactMeasurementInstrument = ImpactMeasurementInstrument::find($id);

        return view('impact-measurement-instrument.show', compact('impactMeasurementInstrument','studentReferral','id_referral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_referral)
    {
        $impactMeasurementInstrument = ImpactMeasurementInstrument::find($id);

        $studentReferral = StudentReferral::find($id_referral);
        $id_referral =$studentReferral->id;

        return view('impact-measurement-instrument.edit', compact('impactMeasurementInstrument','studentReferral','id_referral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ImpactMeasurementInstrument $impactMeasurementInstrument
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, ImpactMeasurementInstrument $impactMeasurementInstrument)
    {
        $impactMeasurementInstrument = ImpactMeasurementInstrument::find($request->id);
        $impactMeasurementInstrument->fill($request->all());
        $impactMeasurementInstrument->save();
        $id_referral = StudentReferral::find($request->id_referral);
        return redirect()->route('index.impact.measurement',$id_referral->id)
            ->with('success', 'ImpactMeasurementInstrument updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $impactMeasurementInstrument = ImpactMeasurementInstrument::find($id);
        $form_id = $impactMeasurementInstrument->form_id;
        $impactMeasurementInstrument = ImpactMeasurementInstrument::find($id)->delete();
        $form = Form::find($form_id)->delete();

        return redirect()->route('index.impact.measurement',$id_referral)
            ->with('success', 'ImpactMeasurementInstrument deleted successfully');
    }
}
