<style>
    .line-name-ipa {
        width: 430px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-age-ipa {
        width: 85px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-document-ipv {
        width: 400px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-ipa {
        width: 210px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-city-ipa {
        width: 210px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-address-ipa {
        width: 283px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-phone-ipa {
        width: 283px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-eps-ipa {
        width: 283px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-laterality-ipa {
        width: 150px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-academic-program-ipa {
        width: 554px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-marital-status-ipa {
        width: 240px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-email-ipa {
        width: 320px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-user-ipa {
        width: 602px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-month {
        width: 80px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-day {
        width: 40px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-date-year {
        width: 60px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .p-justificado {
        text-align: justify;
        line-height: 2.5em;

    }

    .texto-justificado {
        text-align: justify;
        line-height: 2.5em;
    }

    .fila--firma {
        background-color: rgb(137, 144, 173);
    }

    .tabla-firmas {
        width: 600px;
    }

    .psicopedagogo th {
        text-align: left;
        column-span: unset;
    }

    .check-box {
        align-content: center;
    }

    .tabla-datos-personales {
        width: 600px;
    }

    .titulo-centrado {
        text-align: center;
    }

    .cuadros-texto {
        width: 600px;
        height: 100px;
    }

    .input-auto {
        height: auto;
        align-items: center;
        text-align: justify;
    }

    .sub-titulo-left {
        left: -100px;
    }

    .p-justificado {
        text-align: justify;
        line-height: 2.5em;
    }
</style>

@inject('selects', 'App\Services\Selects')

{{ Form::hidden('id_referral', $studentReferral->id) }}
{{ Form::hidden('type_form_id', '6') }}
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <p class="p-justificado">
            PROTECCIÓN DE DATOS PERSONALES. Mediante la suscripción del presente documento, usted autoriza
            de manera voluntaria, previa, explícita, informada e inequívoca, a LA FUNDACIÓN UNIVERSITARIA JUAN
            DE CASTELLANOS, para tratar sus datos personales, de acuerdo con la Política de tratamiento de
            protección de datos personales de los titulares de la FUJDC, la cual puede ser consultada en el enlace
            https://www.jdc.edu.co/politica-de-tratamiento-de-datos-personales, exclusivamente para los fines
            relacionados con su objeto social y conforme a la Ley 1581 de 2012.
            <br>
        </p>
        <p>
            Acepto (
            {{ Form::radio('accept_conditions', 'Acepto', ($initialPsychologicalAssessment->accept_conditions == 'Acepto' ? false : true )|| ($initialPsychologicalAssessment->accept_conditions == 'Acepto' ? true : false), ['class' => 'parrafos' . ($errors->has('accept_conditions') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('accept_conditions', '<div class="invalid-feedback">:message</div>') !!}
            )
            No Acepto(
            {{ Form::radio('accept_conditions', 'No acepto', $initialPsychologicalAssessment->accept_conditions == 'No acepto' ? true : false, ['class' => 'parrafos' . ($errors->has('accept_conditions') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('accept_conditions', '<div class="invalid-feedback">:message</div>') !!}
            )

        </p>
    </div>
</div>
<br>
<div class="container col-8">
    <label for="Fecha-diligenciamiento">Fecha de diligenciamiento: </label>
    {{ Form::number('day', $initialPsychologicalAssessment->day, ['class' => 'line-date-day' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
    {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}
    //
    {{ Form::text('mont', $initialPsychologicalAssessment->mont, ['class' => 'line-date-month' . ($errors->has('mont') ? ' is-invalid' : ''), 'placeholder' => 'Mont']) }}
    {!! $errors->first('mont', '<div class="invalid-feedback">:message</div>') !!}
    //
    {{ Form::number('year', $initialPsychologicalAssessment->year, ['class' => 'line-date-year' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
    {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
</div>
<br>
<br>
<div class="container col-8">
    <h3 class="titulo-centrado">DATOS DE IDENTIFICACIÓN</h3>
    <br>

    {{-- Nombres y Apellidos --}}
    <label for="Nombres-Apellidos">Nombres y apellidos </label>
    {{ Form::text('patien_name', ' ' . $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name . ' ', ['class' => 'line-name-ipa' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
    {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
    {{-- Edad --}}
    {{ Form::label('age', 'Edad') }}
    {{ Form::number('age', $studentReferral->patient->age, ['class' => 'line-age-ipa' . ($errors->has('age') ? ' is-invalid' : '')]) }}
    {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
    {{-- Documento de identidad y Tipo --}}
    {{ Form::label('document_number', 'Documento de identidad C.C.') }}(
    {{ Form::radio('document_type_id', 'C.C', $studentReferral->patient->documentType->name == 'Cedula de Ciudadania' ? true : false, ['class' => 'parrafos' . ($errors->has('document_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('document_type_id', '<div class="invalid-feedback">:message</div>') !!}

    )T.I. (

    {{ Form::radio('document_type_id', 'T.I', $studentReferral->patient->documentType->name == 'Tarjeta de Identidad' ? true : false, ['class' => 'parrafos' . ($errors->has('document_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('document_type_id', '<div class="invalid-feedback">:message</div>') !!}

    )No.
    {{ Form::number('document_number', $studentReferral->patient->document_number, ['class' => 'line-document-ipv' . ($errors->has('document_number') ? ' is-invalid' : '')]) }}
    {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}

    {{-- Fecha y lugar de nacimiento --}}
    {{ Form::label('date_birth', 'Fecha de nacimiento') }}
    {{ Form::text('date_birth', $studentReferral->patient->date_birth, ['class' => 'line-date-ipa' . ($errors->has('date_birth') ? ' is-invalid' : '')]) }}
    {!! $errors->first('date_birth', '<div class="invalid-feedback">:message</div>') !!}
    {{ Form::label('citie_id', 'Lugar de nacimiento') }}
    {{ Form::text('citie_id', $studentReferral->patient->city->name, ['class' => 'line-city-ipa' . ($errors->has('citie_id') ? ' is-invalid' : '')]) }}
    {!! $errors->first('citie_id', '<div class="invalid-feedback">:message</div>') !!}
    {{-- direccion y telefono --}}
    {{ Form::label('address', 'Dirección') }}
    {{ Form::text('address', $studentReferral->patient->address, ['class' => 'line-address-ipa' . ($errors->has('address') ? ' is-invalid' : '')]) }}
    {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    {{ Form::label('phone', 'Telefono') }}
    {{ Form::text('phone', $studentReferral->patient->phone, ['class' => 'line-phone-ipa' . ($errors->has('phone') ? ' is-invalid' : '')]) }}
    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
    {{-- EPS, Lateralidad, genero --}}
    {{ Form::label('eps_id', 'EPS') }}
    {{ Form::text('eps_id', $studentReferral->patient->ep->name, ['class' => 'line-eps-ipa' . ($errors->has('eps_id') ? ' is-invalid' : '')]) }}
    {!! $errors->first('eps_id', '<div class="invalid-feedback">:message</div>') !!}

    {{ Form::label('patients_laterality', 'Lateralidad') }}
    {{ Form::text('patients_laterality', $initialPsychologicalAssessment->patients_laterality, ['class' => 'line-laterality-ipa' . ($errors->has('patients_laterality') ? ' is-invalid' : '')]) }}
    {!! $errors->first('patients_laterality', '<div class="invalid-feedback">:message</div>') !!}
    Género: M (
    {{ Form::radio('gender_type_id', 'Masculino', $studentReferral->patient->genderType->name == 'Masculino' ? true : false, ['class' => 'parrafos' . ($errors->has('gender_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('gender_type_id', '<div class="invalid-feedback">:message</div>') !!}
    )
    F (
    {{ Form::radio('gender_type_id', 'Femenino', $studentReferral->patient->genderType->name == 'Femenino' ? true : false, ['class' => 'parrafos' . ($errors->has('gender_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('gender_type_id', '<div class="invalid-feedback">:message</div>') !!}
    )
    {{-- programa academido --}}
    {{ Form::label('academic_program_id', 'Programa academico:') }}
    {{ Form::text('academic_program_id', $studentReferral->patient->academicProgram->name, ['class' => 'line-academic-program-ipa' . ($errors->has('academic_program_id') ? ' is-invalid' : '')]) }}
    {!! $errors->first('academic_program_id', '<div class="invalid-feedback">:message</div>') !!}
    {{-- Estado civil y correo --}}
    {{ Form::label('marital_status', 'Estado civil:') }}
    {{ Form::text('marital_status', $initialPsychologicalAssessment->marital_status, ['class' => 'line-marital-status-ipa' . ($errors->has('marital_status') ? ' is-invalid' : '')]) }}
    {!! $errors->first('marital_status', '<div class="invalid-feedback">:message</div>') !!}
    {{ Form::label('email', 'Correo:') }}
    {{ Form::email('email', $studentReferral->patient->email, ['class' => 'line-email-ipa' . ($errors->has('email') ? ' is-invalid' : '')]) }}
    {{-- Remitido por --}}
    {!! Form::label('user_id', 'Remitido por:') !!}
    {{ Form::text('user_id', $studentReferral->user->name . ' ' . $studentReferral->user->last_name, ['class' => 'line-user-ipa' . (!empty($errors->first('user_id')) ? 'is-invalid' : '')]) }}
    {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
</div><br><br>
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <h3 class="titulo-centrado">DATOS PERSONAS SIGNIFICATIVAS</h3>
        <br>
        <TABLE class="table table-bordered border-dark">
            <TR>
                <TD>Nombre</TD>
                <TD>Parentesco </TD>
                <TD>Número de contacto</TD>
            </TR>
            <TR>
                <TD>
                    {{ Form::text('family_name', $initialPsychologicalAssessment->family_name, ['class' => 'form-control' . ($errors->has('family_name') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('family_name', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
                <TD>
                    {{ Form::text('family_relationship', $initialPsychologicalAssessment->family_relationship, ['class' => 'form-control' . ($errors->has('family_relationship') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('family_relationship', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
                <TD>
                    {{ Form::text('family_phone', $initialPsychologicalAssessment->family_phone, ['class' => 'form-control' . ($errors->has('family_phone') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('family_phone', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
            </TR>
            <TR>
                <TD></TD>
                <TD></TD>
                <TD></TD>
            </TR>
            <TR>
                <TD></TD>
                <TD></TD>
                <TD></TD>
            </TR>
        </TABLE>
    </div>
</div>

<div class="container row justify-content-center text-center">
    <div class="col-8">
        <h3 class="titulo-centrado">MOTIVO DE CONSULTA</h3>
        <br>
        {{ Form::textarea('reason_consultation', $initialPsychologicalAssessment->reason_consultation, ['class' => 'form-control' . ($errors->has('reason_consultation') ? ' is-invalid' : '')]) }}
        {!! $errors->first('reason_consultation', '<div class="invalid-feedback">:message</div>') !!}
        <br>
    </div>
</div>

<div class="container row justify-content-center text-center">
    <div class="col-8">
        <h3 class="titulo-centrado">HISTORIA GENERAL DE LA SITUACIÓN</h3>
        <br>
        {{ Form::textarea('overall_story', $initialPsychologicalAssessment->overall_story, ['class' => 'form-control' . ($errors->has('overall_story') ? ' is-invalid' : '')]) }}
        {!! $errors->first('overall_story', '<div class="invalid-feedback">:message</div>') !!}
        <br>
    </div>
</div>
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <h3 class="titulo-centrado">ÁREA DE FUNCIONAMIENTO</h3>
        <br>

        <h4 class="sub-titulo-left"> • Área familiar </h4>
        {{ Form::textarea('family_topic', $initialPsychologicalAssessment->family_topic, ['class' => 'form-control' . ($errors->has('family_topic') ? ' is-invalid' : '')]) }}
        {!! $errors->first('family_topic', '<div class="invalid-feedback">:message</div>') !!}
        <br>

        <h4 class="sub-titulo-left"> • Área social</h4>
        {{ Form::textarea('social_topic', $initialPsychologicalAssessment->social_topic, ['class' => 'form-control' . ($errors->has('social_topic') ? ' is-invalid' : '')]) }}
        {!! $errors->first('social_topic', '<div class="invalid-feedback">:message</div>') !!}
        <br>
        <h4 class="sub-titulo-left">• Área académica</h4>
        {{ Form::textarea('academic_topic', $initialPsychologicalAssessment->academic_topic, ['class' => 'form-control' . ($errors->has('academic_topic') ? ' is-invalid' : '')]) }}
        {!! $errors->first('academic_topic', '<div class="invalid-feedback">:message</div>') !!}
        <br>
        <h4 class="sub-titulo-left"> • Área personal</h4>
        {{ Form::textarea('personal_topic', $initialPsychologicalAssessment->personal_topic, ['class' => 'form-control' . ($errors->has('personal_topic') ? ' is-invalid' : '')]) }}
        {!! $errors->first('personal_topic', '<div class="invalid-feedback">:message</div>') !!}
        <br>
    </div>
</div>
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <h3 class="titulo-centrado">HISTORIA DE SALUD</h3>
        <br>

        <h4 class="sub-titulo-left">• Antecedes personales</h4>
        {{ Form::textarea('personal_history', $initialPsychologicalAssessment->personal_history, ['class' => 'form-control' . ($errors->has('personal_history') ? ' is-invalid' : '')]) }}
        {!! $errors->first('personal_history', '<div class="invalid-feedback">:message</div>') !!}
        <br>

        <h4 class="sub-titulo-left">• Antecedentes familiares </h4>
        {{ Form::textarea('family_history', $initialPsychologicalAssessment->family_history, ['class' => 'form-control' . ($errors->has('family_history') ? ' is-invalid' : '')]) }}
        {!! $errors->first('family_history', '<div class="invalid-feedback">:message</div>') !!}
        <br>

        <h4 class="sub-titulo-left">• Percepción estado de salud actual </h4>
        {{ Form::textarea('healthy_state', $initialPsychologicalAssessment->healthy_state, ['class' => 'form-control' . ($errors->has('healthy_state') ? ' is-invalid' : '')]) }}
        {!! $errors->first('healthy_state', '<div class="invalid-feedback">:message</div>') !!}
        <br>
    </div>
</div>
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <h3 class="titulo-centrado">OBSERVACIONES GENERALES/ RECOMENDACIONES PARA EL ACOMPAÑAMIENTO</h3>
        <br>
        {{ Form::textarea('general_observation', $initialPsychologicalAssessment->general_observation, ['class' => 'form-control' . ($errors->has('general_observation') ? ' is-invalid' : '')]) }}
        {!! $errors->first('general_observation', '<div class="invalid-feedback">:message</div>') !!}
        <br>
    </div>
</div>
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <TABLE class="table table-bordered border-dark">
            <TR>
                {{-- firma de Psicologo --}}
                <th class="col-md-6">
                    <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}" name="signature_professional"
                        id="signature_psychological_id" class="img-thumbnail" width="50" height="50"
                        alt="Avatar">
                </th>
            </TR>
            <TR class="table-secondary">
                <th class="col-md-6">Firma profesional en Psicología</th>
            </TR>
            <TR>
                {{-- nombre de Psicologo --}}
                <th scope="col">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="col-md">
                            {{ Form::select('id_psychological', $selects->getUserPsychological(), $initialPsychologicalAssessment->id_psychological, ['class' => 'form-control ' . (!empty($errors->first('id_psychological')) ? 'is-invalid' : ''), 'id' => 'psychological_id']) }}
                            {!! $errors->first('id_psychological', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
            </TR>
            <TR>
                {{-- documento de identidad psicologo --}}
                <th scope="col-5">C.C.:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::number('psychological_document', null, ['class' => 'form-control' . ($errors->has('psychological_document') ? ' is-invalid' : ''), 'id' => 'psychological_document_id']) }}
                            {!! $errors->first('psychological_document', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
            </TR>

        </TABLE>
    </div>
</div>

@section('scriptSelectPsychological')
    <script>
        $(document).ready(function() {
            var id_user = document.getElementById('psychological_id').value;
            if (id_user != '') {
                var ajaxUrl = "{{ route('data.psychological', -1) }}";
                ajaxUrl = ajaxUrl.replace('-1', id_user);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            $.ajax({
                url: ajaxUrl,
                method: "GET",
                dataType: 'JSON',
                success: function(data) {
                    $('#psychological_document_id').val(data.document_number);
                    var src_img = document.getElementById("signature_psychological_id").src;
                    src_img = src_img.replace('default/-00000.jpeg', data.signature_professional);
                    document.getElementById('signature_psychological_id').setAttribute('src', src_img);
                }
            })
            $('#psychological_id').on('change', function(event) {
                var id_user = document.getElementById('psychological_id').value;
                if (id_user != '') {
                    var ajaxUrl = "{{ route('data.psychological', -1) }}";
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
                    method: "GET",
                    dataType: 'JSON',
                    success: function(data) {
                        $('#psychological_document_id').val(data.document_number);
                        var src_img = document.getElementById("signature_psychological_id").src;
                        src_img = src_img.replace('default/-00000.jpeg', data
                            .signature_professional);
                        document.getElementById('signature_psychological_id').setAttribute(
                            'src', src_img);
                    }
                })
            });
        });
    </script>
@endsection
