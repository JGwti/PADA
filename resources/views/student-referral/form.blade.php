@inject('selects', 'App\Services\Selects')

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container row justify-content-center text-center">
        <div class="col-md-10 ">
            <table class="table table-bordered border-dark ">
                {{-- fecha de remision --}}
                <tr>
                    <TD colspan="4">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{ Form::label('remission_date', 'FECHA DE REMISIÓN:', ['class' => 'col-md-8']) }}
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{ Form::date('remission_date', $studentReferral->remission_date, ['class' => 'form-control' . ($errors->has('remission_date') ? ' is-invalid' : ''), 'placeholder' => 'Remission Date']) }}
                                    {!! $errors->first('remission_date', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div><br>
                    </TD>
                </tr>
                {{-- remision a --}}
                <tr>
                    <div class="form-group row">
                        <td class="col-md-2">
                            <div class="col-md-12">
                                {{ Form::label('remission_to', 'REMISIÓN A:  ', ['class' => 'col-md-12']) }}
                            </div>
                            <br>
                        </td>
                        <td class="col-md-2">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('referral_to_psychology', 'Psicología:', ['class' => 'col-md-12']) !!}
                                    <div class="form-group">
                                        {{ Form::radio('remission_to', 'psychology', $studentReferral->remission_to == 'psychology' ? true : false , ['class' => 'form-check-input' . ($errors->has('remission_to') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                                        {!! $errors->first('remission_to', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div><br>
                        </td>
                        <td class="col-md-2">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('referral_to_psychopedagogy', 'Psicopedagogía:', ['class' => 'col-md-12']) !!}
                                    <div class="form-group">
                                        {{ Form::radio('remission_to', 'psychopedagogy',$studentReferral->remission_to == 'psychopedagogy' ? true : false , ['class' => 'form-check-input' . ($errors->has('remission_to') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                                        {!! $errors->first('remission_to', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div><br>
                        </td>
                        <td>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('referral_to_academic_accompaniment_program', 'Programa de Acompañamiento Académico:', ['class' => 'col-md-12']) !!}
                                    <div class="form-group">
                                        {{ Form::radio('remission_to', 'academic_accompaniment_program',$studentReferral->remission_to == 'academic_accompaniment_program' ? true : false , ['class' => 'form-check-input' . ($errors->has('remission_to') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                                        {!! $errors->first('remission_to', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div><br>
                        </td>
                </tr>
                {{-- nombre de quien remite --}}
                <tr>
                    <TD colspan="4">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {!! Form::label('user_id', 'NOMBRE DE QUIEN REMITE:', ['class' => 'col-md-12']) !!}
                            </div>
                            <div class="col-md-8">
                                {{ Form::select('user_id', $selects->getUserName(), $studentReferral->user_id,['class' => 'form-control ' . (!empty($errors->first('user_id')) ? 'is-invalid' : '')]) }}
                                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div><br>

                    </TD>
                </tr>
                {{-- info de quien remite --}}
                <tr>
                    {{-- campo correo --}}
                    <td colspan="3">
                        <div class="form-group row">
                            {{ Form::label('email_id', 'CORREO ELECTRÓNICO', ['class' => 'col-md-12']) }}
                            <div class="col-md-12">
                                {{ Form::text('email_id', null , ['class' => 'form-control' . ($errors->has('email_id') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('email_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div><br>
                    </td>
                    {{-- campo Telefono --}}
                    <td colspan="3">
                        <div class="form-group row">
                            {!! Form::label('phone_id', 'NÚMERO DE CONTACTO:', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                {{ Form::text('phone_id', null, ['class' => 'form-control' . ($errors->has('phone_id') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('phone_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div><br>
                    </td>
                </tr>
                {{-- nombre estudiante --}}
                <tr>
                    <TD colspan="4">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{ Form::label('patient_id', 'NOMBRE DEL ESTUDIANTE:', ['class' => 'col-md-12']) }}
                            </div>
                            <div class="col-md-8">
                                {{ Form::select('patient_id', $selects->getPatientName(), $studentReferral->patient_id,['class' => 'form-control ' . (!empty($errors->first('patient_id')) ? 'is-invalid' : '')]) }}
                            </div>
                        </div><br>
                    </TD>
                </tr>
                {{-- programa academico --}}
                <tr>
                    <td colspan="3">
                        <div class="form-group row">
                            {!! Form::label('academic_program', 'PROGRAMA:', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'academic_program',
                                        null,
                                        [

                                            'class' => 'form-control ' . (!empty($errors->first('academic_program')) ? 'is-invalid' : ''),
                                        ],
                                    ) !!}
                                    @error('academic_program')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div><br>
                    </td>
                    <td colspan="3">
                        <div class="form-group row">
                            {!! Form::label('semester', 'SEMESTRE: ', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'semester',
                                        null,
                                        [

                                            'class' => 'form-control ' . (!empty($errors->first('semester')) ? 'is-invalid' : ''),
                                        ],
                                    ) !!}
                                    @error('semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        {{-- campo Correo --}}
                        <div class="form-group row">
                            {!! Form::label('student_email', 'CORREO ELECTRÓNICO', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'student_email',
                                         null,
                                        [

                                            'class' => 'form-control ' . (!empty($errors->first('student_email')) ? 'is-invalid' : ''),
                                        ],
                                    ) !!}
                                    @error('student_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>
                    </td>
                    <td colspan="3">
                        {{-- campo Telefono --}}
                        <div class="form-group row">
                            {!! Form::label('student_phone', 'NÚMERO DE CONTACTO:', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'student_phone',
                                    null,
                                        [

                                            'class' => 'form-control ' . (!empty($errors->first('student_phone')) ? 'is-invalid' : ''),
                                        ],
                                    ) !!}
                                    @error('student_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>
                    </td>
                {{--razon de remision--}}
                <tr>
                    <TD colspan="4">
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('reason_referral',
                                    ' MOTIVO POR EL QUE SE REMITE (Describa brevemente las situaciones por las cuales considera que el estudiante debe recibir acompañamiento psicosocial).',['class' => 'col-md-12']) }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::textarea('reason_referral',  $studentReferral->reason_referral, ['class' => 'form-control' . ($errors->has('reason_referral') ? ' is-invalid' : ''), 'placeholder' => 'Reason Referral']) }}
                                    {!! $errors->first('reason_referral', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div><br>
                    </TD>
                </tr>
                {{--estrategias de acompañamiento--}}
                <tr>
                    <TD colspan="4">
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('accompanying_strategies',
                                    'ESTRATEGIAS DE ACOMPAÑAMIENTO (Describa las estrategias de acompañamiento y mediaciones pedagógicas que usted ha utilizado para favorecer la formación integral del estudiante).',['class' => 'col-md-12']) }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::textarea('accompanying_strategies', $studentReferral->accompanying_strategies, ['class' => 'form-control' . ($errors->has('accompanying_strategies') ? ' is-invalid' : ''), 'placeholder' => 'Accompanying Strategies']) }}
                                    {!! $errors->first('accompanying_strategies', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div><br>
                    </TD>
                </tr>
                {{--observaciones--}}
                <tr>
                    <TD colspan="4">
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('observations',' OBSERVACIONES (En caso de ser necesario, describa de manera detallada la situación emocional, personal acompañamiento).',['class' => 'col-md-8']) }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::textarea('observations',  $studentReferral->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observations']) }}
                                    {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div><br>
                    </TD>
                </tr>
            </table>
            <div class="container row justify-content-center text-center">
                <div class="col-md-8 ">
                    <table class="table table-bordered border-dark">
                        <tr class="">
                            <th colspan="2">
                                    <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}" name="signature_professional"
                                        id="signature_professional_id" class="img-thumbnail" width="50" height="50"
                                        alt="Avatar">
                            </th>
                        </tr>
                        <tr class="">
                            <th colspan="2">Firma del profesional</th>
                        </tr>
                        <tr class="">
                            <th scope="col">Nombre: </th>
                            <th scope="col">
                                <div class="form-group col-md-10 justify-content-center">
                                    {!! Form::text('user_id',null , [
                                        'disabled' => true,
                                        'class' => 'form-control ' . (!empty($errors->first('user_id')) ? 'is-invalid' : ''),
                                        'id' => 'id_name_profecional',
                                    ]) !!}
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </th>
                        </tr>
                        <tr class="">
                            <th scope="col-5">C.C.: </th>
                            <th scope="col-5">
                                <div class="form-group col-md-10 justify-content-center">
                                    {!! Form::text('name_profecional', null , [
                                        'disabled' => true,
                                        'class' => 'form-control ' . (!empty($errors->first('id_cc_profecional')) ? 'is-invalid' : ''),
                                        'id' => 'id_cc_profecional',
                                    ]) !!}
                                    @error('id_cc_profecional')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@section('scriptSelectPatient')
        <script>
            $(document).ready(function() {
                var id_patient = document.getElementById('patient_id').value;
                    console.log('hola');
                    //console.log(id_patient);
                    if (id_patient != '') {
                        var ajaxUrl = "{{ route('data.patient', -1) }}";
                        ajaxUrl = ajaxUrl.replace('-1', id_patient);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    }
                    $.ajax({
                        url: ajaxUrl,
                        method: "POST",
                        dataType: 'JSON',
                        success: function(data) {
                            console.log(data);
                            $('#academic_program').val(data.aprogram_name);
                            console.log('#aprogram_name');
                            $('#semester').val(data.semester_name);
                            $('#student_email').val(data.email);
                            $('#student_phone').val(data.phone);
                        }
                    })
                $('#patient_id').on('change', function(event) {
                    var id_patient = document.getElementById('patient_id').value;
                    console.log('hola');
                    //console.log(id_patient);
                    if (id_patient != '') {
                        var ajaxUrl = "{{ route('data.patient', -1) }}";
                        ajaxUrl = ajaxUrl.replace('-1', id_patient);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        event.preventDefault();
                    }
                    $.ajax({
                        url: ajaxUrl,
                        method: "POST",
                        dataType: 'JSON',
                        success: function(data) {
                            console.log(data);
                            $('#academic_program').val(data.aprogram_name);
                            $('#semester').val(data.semester_name);
                            $('#student_email').val(data.email);
                            $('#student_phone').val(data.phone);
                        }
                    })
                });
            });
        </script>
@endsection

@section('scriptSelectUser')
    <script>
        $(document).ready(function() {
            var id_user = document.getElementById('user_id').value;
                //console.log(id_user);
                if (id_user != '') {
                    var ajaxUrl = "{{ route('data.user', -1) }}";
                    ajaxUrl = ajaxUrl.replace('-1', id_user);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                }
                $.ajax({
                    url: ajaxUrl,
                    method: "POST",
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data);
                        $('#email_id').val(data.email);
                        $('#phone_id').val(data.phone);
                        $('#id_cc_profecional').val(data.document_number);
                        $('#id_name_profecional').val(data.name);
                        var src_img = document.getElementById("signature_professional_id").src;
                        src_img = src_img.replace('default/-00000.jpeg', data.signature_professional);
                        document.getElementById('signature_professional_id').setAttribute('src',
                            src_img);
                    }
                })
            $('#user_id').on('change', function(event) {
                var id_user = document.getElementById('user_id').value;
                console.log(id_user);
                if (id_user != '') {
                    var ajaxUrl = "{{ route('data.user', -1) }}";
                    ajaxUrl = ajaxUrl.replace('-1', id_user);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    event.preventDefault();
                }
                $.ajax({
                    url: ajaxUrl,
                    method: "POST",
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data);
                        $('#email_id').val(data.email);
                        $('#phone_id').val(data.phone);
                        $('#id_cc_profecional').val(data.document_number);
                        $('#id_name_profecional').val(data.name);
                        var src_img = document.getElementById("signature_professional_id").src;
                        src_img = src_img.replace('default/-00000.jpeg', data.signature_professional);
                        document.getElementById('signature_professional_id').setAttribute('src',
                            src_img);
                    }
                })
            });
        });
    </script>
@endsection

















{{--
        <div class="form-group">
            {{ Form::label('patient_id') }}
            {{ Form::text('patient_id', $studentReferral->patient_id, ['class' => 'form-control' . ($errors->has('patient_id') ? ' is-invalid' : ''), 'placeholder' => 'Patient Id']) }}
            {!! $errors->first('patient_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $studentReferral->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

--}}
