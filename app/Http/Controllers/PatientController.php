<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Arr;
use App\Models\document_type;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests\Patient\EditRequest;

/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
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
    public function index(Request $request)
    {

        $patients = Patient::patientFilter($request->patient_data);

        return view('patient.index', compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * $patients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = new Patient();
        return view('patient.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_nacimiento  = $request->date_birth;
        $age_patient = Carbon::parse($fecha_nacimiento )->diff(Carbon::now())->y;
        $patient= new Patient();
        $patient->fill($request->all());
        $patient->age=$age_patient;
        request()->validate(Patient::$rules);
        $patient->save();
        return redirect()->route('pacientes.index')
            ->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Patient $patient, $id, Route $route)
    {
        $patient = Patient::find($id);
        $fecha_nacimiento  = $request->date_birth;
        $age_patient = Carbon::parse($fecha_nacimiento )->diff(Carbon::now())->y;
        if(is_null($patient)){
            return redirect()->route('pacientes.index');
        }

        if($request->password == null){
            $password_patient = $patient->password;
        }
        $patient->fill($request->all());
        $patient->password=$password_patient;
        $patient->age=$age_patient;
        $patient->save();
        return redirect()->route('pacientes.index')
            ->with('success', 'Patient updated successfully');
    }



    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $patient = Patient::find($id)->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Patient deleted successfully');
    }
    public function getSelectStates (Request $request)
    {
        if($request->ajax()){

            $states = State::where('country_id', $request->countrie_id)->get();

            foreach ($states as $states){
                $statesArray[$states->id]=$states->name;
            }
            return response()->json($statesArray);
        }
    }

    public function getSelectCities(Request $request)
    {
        if($request->ajax()){
            $cities = City::where('state_id', $request->state_id)->get();

            foreach ($cities as $cities){
                $citiesArray[$cities->id]=$cities->name;
            }
            return response()->json($citiesArray);
        }
    }
    public function getSelectPatient (Request $request, $id)
    {
        if($request->ajax()){

            $patient= Patient::select('academic_programs.name as aprogram_name','semesters.name as semester_name','patients.*')
                                ->join('academic_programs', 'patients.academic_program_id', '=', 'academic_programs.id')
                                ->join('semesters', 'patients.semester_id', '=', 'semesters.id')
                                ->find($id);

            return response()->json($patient);
        }
    }
}
