<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @inject('selects', 'App\Services\Selects')

    <style>
        .text-size {
            font-size: 75%;
        }
        .text-size-txta  {
            font-size: 85%;
        }

        .table-text-size {
            font-size: 150%;
        }

        .line-select {
            margin: 2em;
            padding: .5em;
            width: 12em;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
        }

        .line-name {
            width: 550px;
            height: 10px;
            border: none;
            text-align: left;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-document {
            width: 280px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-date-month {
            width: 80px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-date-day {
            width: 40px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-date-year {
            width: 50px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-city {
            width: 300px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .p-justificado {
            text-align: justify;
            margin-left: 60px;
            margin-top: 20px;
            margin-right: 60px;
            margin-bottom: 0px;
        }

        .table {
            border-collapse: collapse;
            border: rgb(0, 0, 0) 2px solid;
            font-size: 85%;
            margin-left: 65px;
            width: 80%;
            height: 5px;
        }
        .table-signature {
            border-collapse: collapse;
            border: rgb(0, 0, 0) 2px solid;
            font-size: 85%;
            margin: 0 auto;

            width: 60%;
            height: 5px;
        }

        .table-font {
            background: rgb(121, 125, 148);
        }

        .table-head {
            border-collapse: collapse;
            font-size: 85%;
            margin-left: 65px;
            width: 80%;
            height: 5px;
        }

        .table-head-ms {
            border: 1px solid mediumblue;
            border-radius: 20PX;
            margin-left: 60px;
            margin-right: 60px;
        }

        img.escudo {
            width: 10px;
            height: 10px;
        }
    </style>

    <style>
        div {
            border: red 1px solid;
        }

        input {
            margin-top: 0px;
        }

        .line-name-ipa {
            width: 240px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);

        }

        .line-age-ipa {
            width: 103px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);

        }

        .line-document-ipv {
            width: 247px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);

        }

        .line-date-ipa {
            width: 135px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-city-ipa {
            width: 136px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-address-ipa {
            width: 206px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-phone-ipa {
            width: 173px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-eps-ipa {
            width: 187px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-laterality-ipa {
            width: 103px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-academic-program-ipa {
            width: 378px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-marital-status-ipa {
            width: 120px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-email-ipa {
            width: 253px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-user-ipa {
            width: 416px;
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-date-month {
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-date-day {
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-date-year {
            height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-text-area {
            word-break: break-word;
            height: 10px;
            border: none;
            border-bottom: 1px solid rgb(0, 0, 0);


        }

        .texto-justificado {
            text-align: justify;
            line-height: 2.5em;
        }

        .texto-centrado {
            text-align: center;
        }

        .texto-centrado-acept {
            text-align: center;
            margin-left: 100px;
            margin-right: 100px;
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
            text-align: justify;
            width: 80%;
            height: 100px;
            margin-left: 60px;
            margin-right: 60px;
            margin-bottom: 0px;
        }

        .input-auto {
            height: auto;
            align-items: center;
            text-align: justify;
        }

        .sub-titulo-left {
            left: -100px;
            margin-left: 60px;
            margin-right: 60px;
        }

        .txt-a-justificado {
            text-align: justify;
            word-wrap: break-word;

        }
    </style>
    <table class="table-head" CELLPADDING=10 CELLSPACING=0>
        <TR>
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/escudo.png') }}" width="50" height="50">
            </TD>
            <TD class="table-head-ms" ROWSPAN=2>
                {{ $initialPsychologicalAssessment->form->typeForm->name_form }}
            </TD>
            <TD class="table-head-ms"> Código: </TD>
            <TD class="table-head-ms">
                {{ $initialPsychologicalAssessment->form->typeForm->code_form }}
            </TD>
        </TR>
        <TR>
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/JDC.png') }}" width="50" height="30">
            </TD>
            <TD class="table-head-ms">Página: </TD>
            <TD class="table-head-ms"> 1 de 3 </TD>
        </TR>
    </table>

    <div class="">
        <div class="text-size">
            <p class="p-justificado ">
                PROTECCIÓN DE DATOS PERSONALES. Mediante la suscripción del presente documento, usted autoriza
                de manera voluntaria, previa, explícita, informada e inequívoca, a LA FUNDACIÓN UNIVERSITARIA JUAN
                DE CASTELLANOS, para tratar sus datos personales, de acuerdo con la Política de tratamiento de
                protección de datos personales de los titulares de la FUJDC, la cual puede ser consultada en el enlace
                https://www.jdc.edu.co/politica-de-tratamiento-de-datos-personales, exclusivamente para los fines
                relacionados con su objeto social y conforme a la Ley 1581 de 2012.
            </p>
            <div class="d-justificado texto-centrado-acept ">
                Acepto (
                @if ($initialPsychologicalAssessment->accept_conditions == 'Acepto')
                    x
                @endif
                )
                No Acepto(
                @if ($initialPsychologicalAssessment->accept_conditions == 'No acepto')
                    x
                @endif
                )
            </div>
        </div>
        <div class="p-justificado text-size">
            <label for="Fecha-diligenciamiento">Fecha de diligenciamiento: </label>
            <samp class="line-date-day">
                {{ $initialPsychologicalAssessment->day }}
            </samp>
            //
            <samp class="line-date-month">
                {{ $initialPsychologicalAssessment->mont }}
            </samp>
            //
            <samp class="line-date-year">
                {{ $initialPsychologicalAssessment->year }}
            </samp>
        </div>
        <div class="text-size">
            <h3 class="titulo-centrado">DATOS DE IDENTIFICACIÓN</h3>
            <div class="titulo-centrado">
                <div class="d-justificado">
                    {{-- Nombres y Apellidos --}}
                    <label for="Nombres-Apellidos">Nombres y apellidos </label>
                    <input type="text" class="line-name-ipa"
                        value="{{ ' ' . $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name . ' ' }}">
                    {{-- Edad --}}
                    {{ Form::label('age', 'Edad') }}
                    <input type="text" class="line-age-ipa" value="{{ $studentReferral->patient->age }}">
                </div>
                <div class="d-justificado">
                    {{-- Documento de identidad y Tipo --}}
                    {{ Form::label('document_number', 'Documento de identidad C.C.') }}
                    @if ($studentReferral->patient->documentType->name == 'Cedula de Ciudadania')
                        (
                        <samp>
                            x
                        </samp>
                        )
                    @else
                        ( )
                    @endif
                    T.I.
                    @if ($studentReferral->patient->documentType->name == 'Tarjeta de Identidad')
                        (
                        <samp>
                            x
                        </samp>
                        )
                    @else
                        ( )
                    @endif
                    No.
                    <input type="text" class="line-document-ipv"
                        value="{{ $studentReferral->patient->document_number }}">
                </div>
                <div class="d-justificado">
                    {{-- Fecha y lugar de nacimiento --}}
                    {{ Form::label('date_birth', 'Fecha de nacimiento') }}
                    <input type="text" class="line-date-ipa" value="{{ $studentReferral->patient->date_birth }}">
                    {{ Form::label('citie_id', 'Lugar de nacimiento') }}
                    <input type="text" class="line-city-ipa" value="{{ $studentReferral->patient->city->name }}">
                </div>
                <div class="d-justificado">
                    {{-- direccion y telefono --}}
                    {{ Form::label('address', 'Dirección') }}
                    <input type="text" class="line-address-ipa" value="{{ $studentReferral->patient->address }}">
                    {{ Form::label('phone', 'Telefono') }}
                    <input type="text" class="line-phone-ipa" value="{{ $studentReferral->patient->phone }}">
                </div>
                <div class="d-justificado">
                    {{-- EPS, Lateralidad, genero --}}
                    {{ Form::label('eps_id', 'EPS') }}
                    <input type="text" class="line-eps-ipa" value="{{ $studentReferral->patient->ep->name }}">
                    {{ Form::label('patients_laterality', 'Lateralidad') }}
                    <input type="text" class="line-laterality-ipa"
                        value="{{ $initialPsychologicalAssessment->patients_laterality }}">
                    Género: M
                    @if ($studentReferral->patient->genderType->name == 'Masculino')
                        (
                        x
                        )
                    @else
                        ( )
                    @endif
                    F
                    @if ($studentReferral->patient->genderType->name == 'Femenino')
                        (
                        x
                        )
                    @else
                        ( )
                    @endif
                </div>
                {{-- programa academido --}}
                <div class="d-justificado">
                    {{ Form::label('academic_program_id', 'Programa academico:') }}
                    <input type="text" class="line-academic-program-ipa"
                        value="{{ $studentReferral->patient->academicProgram->name }}">
                </div>
                {{-- Estado civil y correo --}}
                <div class="d-justificado">
                    {{ Form::label('marital_status', 'Estado civil:') }}
                    <input type="text" class="line-marital-status-ipa"
                        value="{{ $initialPsychologicalAssessment->marital_status }}">
                    {{ Form::label('email', 'Correo:') }}
                    <input type="text" class="line-email-ipa" value="{{ $studentReferral->patient->email }}">
                </div>
                {{-- Remitido por --}}
                <div class="d-justificado">
                    {!! Form::label('user_id', 'Remitido por:') !!}
                    <input type="text" class="line-user-ipa"
                        value="{{ $studentReferral->user->name . ' ' . $studentReferral->user->last_name }}">
                </div>
            </div>
        </div>
        <div class="text-size">
            <h3 class="titulo-centrado">DATOS PERSONAS SIGNIFICATIVAS</h3>
        </div>
        <div class="table-text-size">
            <TABLE class="table">
                <TR class="table">
                    <TD class="table"><b>Nombre</b></TD>
                    <TD class="table"><b>Parentesco</b> </TD>
                    <TD class="table"><b>Número de contacto</b></TD>
                </TR>
                <TR class="table">
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_name }}
                    </TD>
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_relationship }}
                    </TD>
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_phone }}
                    </TD>
                </TR>
                <TR class="table">
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_name }}
                    </TD>
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_relationship }}
                    </TD>
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_phone }}
                    </TD>
                </TR>
                <TR class="table">
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_name }}
                    </TD>
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_relationship }}
                    </TD>
                    <TD class="table">
                        {{ $initialPsychologicalAssessment->family_phone }}
                    </TD>
                </TR>
            </TABLE>
        </div>
        <div class="text-size">
            <h3 class="titulo-centrado">MOTIVO DE CONSULTA</h3>
        </div>

        <div class="cuadros-texto text-size-txta ">
            <samp class="line-text-area">
                {{ $initialPsychologicalAssessment->reason_consultation}}
            </samp>
        </div>
        <div class="text-size">
            <h3 class="titulo-centrado">HISTORIA GENERAL DE LA SITUACIÓN</h3>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->overall_story}}
            </samp>
        </div>
        <div class="text-size">
            <h3 class="titulo-centrado">ÁREA DE FUNCIONAMIENTO</h3>
        </div>
        <div class="text-size">
            <h4 class="sub-titulo-left"> • Área familiar </h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->family_topic }}
            </samp>
        </div>

        <div class="text-size">
            <h4 class="sub-titulo-left"> • Área social</h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->social_topic}}
            </samp>
        </div>
        <div class="text-size">
            <h4 class="sub-titulo-left">• Área académica</h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->academic_topic}}
            </samp>
        </div>
        <div class="text-size">
            <h4 class="sub-titulo-left"> • Área personal</h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->personal_topic}}
            </samp>
        </div>


        <div class="text-size">
            <h3 class="titulo-centrado">HISTORIA DE SALUD</h3>
        </div>
        <div class="text-size">
            <h4 class="sub-titulo-left">• Antecedes personales</h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->personal_history}}
            </samp>
        </div>
        <div class="text-size">
            <h4 class="sub-titulo-left">• Antecedentes familiares </h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->family_history}}
            </samp>
        </div>
        <div class="text-size">
            <h4 class="sub-titulo-left">• Percepción estado de salud actual </h4>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->healthy_state}}
            </samp>
        </div>
        <div class="text-size">
            <h3 class="titulo-centrado">OBSERVACIONES GENERALES/ RECOMENDACIONES PARA EL ACOMPAÑAMIENTO</h3>
        </div>
        <div class="cuadros-texto ">
            <samp class="line-text-area text-size-txta">
                {{ $initialPsychologicalAssessment->general_observation}}
            </samp>
        </div>
        <div class="table-text-size">
            <TABLE class="table-signature  ">
                <TR>
                    {{-- firma de Psicologo --}}
                    <th class="table">
                        <p><img src="{{ public_path('./storage/signatures/' . $psychological->signature_professional) }} "
                                width="100" height="70"></p>
                    </th>
                </TR>
                <TR class="table table-font">
                    <th class="table">Firma profesional en Psicología</th>
                </TR>
                <TR>
                    {{-- nombre de Psicologo --}}
                    <th class="table">Nombre:
                        <samp class="line-document">
                            {{ $psychological->name . ' ' . $psychological->last_name }}
                        </samp>
                    </th>
                </TR>
                <TR>
                    {{-- documento de identidad psicologo --}}
                    <th class="table">C.C.:
                        <samp class="line-document">
                            {{ $psychological->document_number }}
                        </samp>
                    </th>
                </TR>
            </TABLE>
        </div>
    </div>
</body>

</html>
