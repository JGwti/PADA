<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Route;

/**
 * Class Patient
 *
 * @property $id
 * @property $document_number
 * @property $name
 * @property $last_name
 * @property $age
 * @property $date_birth
 * @property $address
 * @property $phone
 * @property $email
 * @property $password
 * @property $created_at
 * @property $updated_at
 * @property $document_type_id
 * @property $patient_type_id
 * @property $gender_type_id
 * @property $academic_program_id
 * @property $semester_id
 * @property $eps_id
 * @property $state_id
 * @property $countrie_id
 * @property $citie_id
 *
 * @property AcademicProgram $academicProgram
 * @property City $city
 * @property Country $country
 * @property DocumentType $documentType
 * @property Ep $ep
 * @property GenderType $genderType
 * @property PatientType $patientType
 * @property Semester $semester
 * @property State $state
 * @property Route $route
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patient extends Model
{

    static $rules = [
		'document_number' => 'required|unique:patients,document_number|unique:users,document_number|unique:legal_representatives,representative_document_number',
		'name' => 'required|string|max:50',
		'last_name' => 'required|string|max:50',
		'age' => 'required|integer',
		'date_birth' => 'required|date',
		'address' => 'required|string',
		'phone' => 'required|unique:patients,phone|string|max:20',
		'email' => 'required|unique:patients,email',
        'password'=>'required|max:16|min:8|nullable|confirmed',
		'document_type_id' => 'required|exists:document_types,id',
		'patient_type_id' => 'required|exists:patient_types,id',
		'gender_type_id' => 'required|exists:gender_types,id',
		'academic_program_id' => 'required|exists:academic_programs,id',
		'semester_id' => 'required|exists:semesters,id',
		'eps_id' => 'required|exists:eps,id',
		'state_id' => 'required|exists:states,id',
		'countrie_id' => 'required|exists:countries,id',
		'citie_id' => 'required|exists:cities,id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['document_number','name','last_name','age','date_birth','address','phone','email','password','document_type_id','patient_type_id','gender_type_id','academic_program_id','semester_id','eps_id','state_id','countrie_id','citie_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function academicProgram()
    {
        return $this->hasOne('App\Models\AcademicProgram', 'id', 'academic_program_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'citie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'countrie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function documentType()
    {
        return $this->hasOne('App\Models\DocumentType', 'id', 'document_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ep()
    {
        return $this->hasOne('App\Models\Ep', 'id', 'eps_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genderType()
    {
        return $this->hasOne('App\Models\GenderType', 'id', 'gender_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patientType()
    {
        return $this->hasOne('App\Models\PatientType', 'id', 'patient_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semester()
    {
        return $this->hasOne('App\Models\Semester', 'id', 'semester_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }

    public static function patientFilter($data)
    {
        return Patient::patientData($data)->paginate(10);
    }

public function scopePatientData($query, $patient_data)
    {
        if (!empty($patient_data)){
        return $query->where('document_number', $patient_data)
            ->orwhere('name', 'LIKE', "%$patient_data%")
            ->orwhere('last_name', 'LIKE', "%$patient_data%");
        }
    }

}
