@inject('selects', 'App\Services\Selects')

<div class="box box-info padding-6">
    <div class="box-body">

        <div class="row">
            <div class="form-group col">
                {{ Form::label('name','Nombres') }}
                {{ Form::text('name', $patient->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('last_name','Apellidos') }}
                {{ Form::text('last_name', $patient->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : '')]) }}
                {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('date_birth','Fecha de nacimiento') }}
                {{ Form::date('date_birth', $patient->date_birth, ['class' => 'form-control' . ($errors->has('date_birth') ? ' is-invalid' : '')]) }}
                {!! $errors->first('date_birth', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('age','Edad') }}
                {{ Form::number('age', $patient->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : '')]) }}
                {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('countrie_id','Pais de origen') }}
                {{ Form::select('countrie_id', $selects->getCountries(), $patient->countrie_id, ['class' => 'form-control' . ($errors->has('countrie_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('countrie_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('state_id','Departamento') }}
                {{ Form::select('state_id',[],null, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''),'data-old-state' => old("state_id"),'data-old-base'=> $patient->state_id]) }}
                {!! $errors->first('state_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('citie_id','Ciudad') }}
                {{ Form::select('citie_id',[], null, ['class' => 'form-control' . ($errors->has('citie_id') ? ' is-invalid' : ''),'data-old-city' => old("citie_id"),'data-old-base'=> $patient->citie_id]) }}
                {!! $errors->first('citie_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('address','Direccion') }}
                {{ Form::text('address', $patient->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : '')]) }}
                {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('phone','Telefono') }}
                {{ Form::text('phone', $patient->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) }}
                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('email','Email') }}
                {{ Form::email('email', $patient->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('password','Contraseña') }}
                {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('password_confirmation','Confirmar contraseña') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('Password confirmation') ? ' is-invalid' : '')]) }}
                {!! $errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('document_type_id','Tipo de documento') }}
                {{ Form::select('document_type_id', $selects->getDocumentType(), $patient->document_type_id, ['class' => 'form-control' . ($errors->has('document_type_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('document_type_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('document_number','Numero de documento') }}
                {{ Form::number('document_number', $patient->document_number, ['class' => 'form-control' . ($errors->has('document_number') ? ' is-invalid' : '')]) }}
                {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('gender_type_id','Genero') }}
                {{ Form::select('gender_type_id', $selects->getGenderType(), $patient->gender_type_id, ['class' => 'form-control' . ($errors->has('gender_type_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('gender_type_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('eps_id','EPS') }}
                {{ Form::select('eps_id', $selects->getEps(), $patient->eps_id, ['class' => 'form-control' . ($errors->has('eps_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('eps_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('patient_type_id','Rol del paciente') }}
                {{ Form::select('patient_type_id', $selects->getPatientType(), $patient->patient_type_id, ['class' => 'form-control' . ($errors->has('patient_type_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('patient_type_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('academic_program_id','Programa academico') }}
                {{ Form::select('academic_program_id', $selects->getAcademicProgram(), $patient->academic_program_id, ['class' => 'form-control' . ($errors->has('academic_program_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('academic_program_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('semester_id','Semestre') }}
                {{ Form::select('semester_id', $selects->getSemesters(), $patient->semester_id, ['class' => 'form-control' . ($errors->has('semester_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('semester_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <br>

@section('scriptStates')
    <script>
        $(document).ready(function(){
            var id_states = '';
            function loadState() {
                var id_countries = $('#countrie_id').val();
               console.log(id_countries+' esto es id pais') // crear variable para guardar el id del pais que se ah selecionado
                if ($.trim(id_countries) != '') { //verificar que el id no este vacio
                    console.log($('#state_id').val());
                    $.get('{{ route('states') }}', {countrie_id: id_countries}, function(States) {
                        var old =$('#state_id').data('old-state') != '' ? $('#state_id').data('old-state') : '';
                        var old_base =$('#state_id').data('old-base')!= '' ? $('#state_id').data('old-base') : '';
                        console.log(old_base);

                        //var old_city =$('#citie_id').data('old') != '' ? $('#citie_id').data('old') : '';
                        $('#state_id').empty(); //limpiar el select
                        $('#state_id').append("<option value=''>Seleccionar estado: </option>"); // valor del select
                        id_states = $('#state_id').val();
                        $.each(States, function(index, value) {
                            $('#state_id').append("<option value='" + index + "'" + (old==index || old_base==index ? 'selected':'') + ">" + value + "</option>"); // valor del select
                        })
                    });
                }
            }
            loadState();
            $('#countrie_id').on('change', loadState);

            function loadCitie() {
                id_states = $('#state_id').data('old-state') == undefined  ? $('#state_id').val() : $('#state_id').data('old-state')
                console.log(id_states+' esto es id estados');
                // crear variable para guardar el id del pais que se ah selecionado
                if ($.trim(id_states) != '') { //verificar que el id no este vacio
                console.log(id_states+' prueba');

                    $.get('{{ route('cities') }}', {state_id: id_states}, function(Cities) {
                        var old =$('#citie_id').data('old-city') != '' ? $('#citie_id').data('old-city') : '';
                        var old_base =$('#citie_id').data('old-base')!= '' ? $('#citie_id').data('old-base') : '';
                        $('#citie_id').empty(); //limpiar el select
                        $('#citie_id').append("<option value=''>Seleccionar ciudad: </option>"); // valor del select

                        $.each(Cities, function(index, value) {
                            $('#citie_id').append("<option value='" + index + "'" + (old==index || old_base==index ? 'selected':'') + ">" + value + "</option>"); // valor del select
                        })

                    });
                }
            }
            loadCitie();

            $('#state_id').on('change', loadCitie);
        });
    </script>
@endsection

@section('scriptCities')
    <script>
        /*
        $(document).ready(function() {
            function loadState(){
                var id_state = $('#state_id').val();
                if ($.trim(id_state != '')) {
                console.log(id_state+'#state_id');
                    $.get('{{ route('cities') }}', {state_id:id_state}, function(Cities) {
                        console.log(Cities);
                        var old = $('#citie_id').data('old') != '' ? $('#citie_id').data('old') : '';
                       // console.log(old);
                        $('#citie_id').empty();
                        $('#citie_id').append("<option value=''>Seleccionar estado: </option>");
                        $.each(Cities, function(index, value) {
                            $('#citie_id').append("<option value='" + index + "'" +(old== index ? 'selected' : '') + ">" + value +"</option>"); // valor del select
                        })

                    });
                }
            }
            loadState();
            $('#state_id').on('change', loadState);
        });

        */
    </script>
@endsection


