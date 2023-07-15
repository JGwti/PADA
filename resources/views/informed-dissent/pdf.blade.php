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
        .text-size{
            font-size:75%;
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
            height: 20px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-document {
            width: 280px;
            height: 20px;
            border: none;
            text-align:center;
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
            width: 50px;
            height: 20px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .line-city {
            width: 300px;
            height: 20px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .p-justificado {
            text-align: justify;
            line-height: 2.5em;
            margin-left: 60px;
            margin-top: 40px;
            margin-right: 60px;
            margin-bottom: 40px;
        }

        .table {
            border-collapse: collapse;
            border: rgb(0, 0, 0) 2px solid;
            font-size:85%;
            margin-left: 65px;
            width: 80%;
            height: 5px;
        }
        .table-font {
            background: rgb(121, 125, 148);
        }
        .table-head {
            border-collapse: collapse;
            font-size:85%;
            margin-left: 65px;
            width: 80%;
            height: 5px;
        }
        .table-head-ms{
            border: 1px solid mediumblue;
            border-radius: 20PX;
            margin-left: 60px;
            margin-right: 60px;
        }
        img.escudo{
            width: 10px;
            height: 10px;
        }

</style>
    <table class="table-head" CELLPADDING=10 CELLSPACING=0>
        <TR>
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/escudo.png')}}" width="50" height="50">
            </TD>
            <TD class="table-head-ms" ROWSPAN=2>
                {{$informedDissent->form->typeForm->name_form}}
            </TD>
            <TD class="table-head-ms"> Código: </TD>
            <TD class="table-head-ms">
                {{$informedDissent->form->typeForm->code_form}}
            </TD>
        </TR>
        <TR>
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/JDC.png')}}" width="50" height="30">
            </TD>
            <TD class="table-head-ms">Página: </TD>
            <TD class="table-head-ms"> 1 de 1 </TD>
        </TR>
    </table>



        <div class="contenedor">
            <p class="p-justificado text-size">
                Yo,
                <samp class="line-name">
                    {{$studentReferral->patient->name . ' ' . $studentReferral->patient->last_name}}
                </samp>
                mayor de edad, identificado con cédula de ciudadanía N.°
                <samp class="line-document">
                    {{$studentReferral->patient->document_number}}
                </samp>
                en mi rol como
                <samp class="line-document">
                    {{$studentReferral->patient->patientType->name}}
                </samp>
                de la Fundación Universitaria Juan de Castellanos, en pleno
                uso de mis facultades libre y voluntariamente, manifiesto que he sido informado sobre los procedimientos
                que se van a realizar desde la Unidad de Bienestar Universitario, y acepto participar en el
                acompañamiento del área de psicología (
                @if ( $informedDissent->professional_area=='psychology')
                    x
                @endif
                ) y/o psicopedagogía (

                @if ( $informedDissent->professional_area == 'psychopedagogy')
                    x
                @endif
                ) que brinda la Unidad de Bienestar Universitario.
                <br>
                Se me han sido explicadas las implicaciones y posibles complicaciones por su no realización; no
                obstante, me niego al mismo, asumiendo los riesgos bajo mi propia responsabilidad.
                <br>
                En constancia, se firma a los
                <samp class="line-date-day">
                    {{$informedDissent->day}}
                </samp>
                días del mes de
                <samp class="line-date-month">
                    {{ $informedDissent->mont}}
                </samp>
                del año
                <samp class="line-date-year">
                    {{$informedDissent->year}}
                </samp>
                , en la ciudad de
                <samp class="line-city">
                    {{ $informedDissent->city}}
                </samp>

                <br>
            </p>
            <table class="table">
                <tr>
                    {{-- firma de paciente --}}
                    <th class="table">
                        <p><img src="{{ public_path('./storage/signatures/'.$informedDissent->patient_signature) }} " width="100" height="70"></p>
                    </th>
                    {{-- firma de Psicologo --}}
                    <th class="table">
                        <p><img src="{{ public_path('./storage/signatures/'.$psychological->signature_professional) }}" width="100" height="70"></p>
                    </th>
                </tr>
                <tr class="table table-font">
                    <th class="table">Firma de quien recibirá el acompañamiento</th>
                    <th class="table">Firma profesional en Psicología</th>
                </tr>
                <tr>
                    {{-- nombre de paciente --}}
                    <th class="table">Nombre:
                        <samp class="line-document">
                            {{$studentReferral->patient->name . ' ' . $studentReferral->patient->last_name}}
                        </samp>
                    </th>
                    {{-- nombre de Psicologo --}}
                    <th class="table">Nombre:
                        <samp class="line-document">
                            {{ $psychological->name.' '.$psychological->last_name }}
                        </samp>
                    </th>
                </tr>
                <tr>
                    {{-- documento de identidad paciente --}}
                    <th class="table">C.C.:
                        <samp class="line-document">
                            {{  $studentReferral->patient->document_number }}
                        </samp>
                    </th>

                    {{-- documento de identidad psicologo --}}
                    <th class="table">C.C.:
                        <samp class="line-document">
                            {{ $psychological->document_number }}
                        </samp>
                    </th>

                </tr>
                <tr>
                    {{-- firma del psicopedagogo --}}
                    <th colspan="2" class="table">
                        <p><img src="{{ public_path('./storage/signatures/'.$psychopedagogical->signature_professional) }}" width="100" height="70"></p>
                    </th>
                </tr>
                <tr class="table table-font">
                    <th colspan="2" class="table">Firma profesional en Psicopedagogía</th>
                </tr>
                <tr>
                    {{-- nombre del psicodedagogo --}}
                    <th colspan="2" class="table">Nombre:
                        <samp class="line-document">
                            {{ $psychopedagogical->name.' '.$psychopedagogical->last_name }}
                        </samp>
                    </th>
                </tr>
                <tr>
                    {{-- documento de identidad psicopedagogo --}}
                    <th colspan="2" class="table">C.C.:
                        <samp class="line-document">
                            {{ $psychopedagogical->document_number }}
                        </samp>
                    </th>
                </tr>
            </table>
        </div>
</body>

</html>
