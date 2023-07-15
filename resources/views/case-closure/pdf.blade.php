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
        tr, td{
            border: 1px solid rgb(0, 0, 0);
            margin-left: 60px;
            margin-right: 60px;
        }
        .text-area{
            height: 150px
        }
        .text-area-cl{
            height: 150px;


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
                {{$caseClosure->form->typeForm->name_form}}
            </TD>
            <TD class="table-head-ms"> Código: </TD>
            <TD class="table-head-ms">
                {{$caseClosure->form->typeForm->code_form}}
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
                FECHA DE SESIÓN INICIAL:
                <samp class="line-name">
                    {{ $studentReferral->remission_date }}
                </samp>
                <br>
                FECHA DE CIERRE DE CASO:
                <samp class="line-document">
                    {{ $caseClosure->end_session}}
                </samp>
                <br>
                LÍNEA:
                @if ($studentReferral->remission_to == 'psychology')
                    <samp class="line-document">
                        {{ $studentReferral->remission_to == 'psychology' ? 'Psicologia' : '' }}
                    </samp>
                @elseif ($studentReferral->remission_to == 'psychopedagogy')
                    <samp class="line-document">
                        {{ $studentReferral->remission_to == 'psychopedagogy' ? 'Psicopedagogia' : '' }}
                    </samp>
                @else
                    <samp class="line-document">
                        {{ $studentReferral->remission_to == 'academic_accompaniment_program' ? 'Acompañamiento academico' : '' }}
                    </samp>
                @endif
                <br>
                NOMBRES Y APELLIDOS:
                <samp class="line-document">
                    {{ $studentReferral->patient->name.' '.$studentReferral->patient->last_name }}
                </samp>
                <br>
                NÚMERO DE DOCUMENTO DE IDENTIDAD:
                <samp class="line-document">
                    {{ $studentReferral->patient->document_number }}
                </samp>
                <br>
                NÚMERO DE SESIONES:
                <samp class="line-document">
                    {{ $caseClosure->number_sessions }}
                </samp>
            </p>
            <TABLE class="table table-form-ms text-size">
                <TR>
                    <TD class="text-size">
                        SITUACIONES ENCONTRADAS
                    </TD>
                    <TD class="text-size">
                        DESCRIPCIÓN DEL PROCESO
                    </TD>
                    <TD class="text-size">
                        AVANCES Y ASPECTOS POR MEJORAR
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size text-area">
                        {{ $caseClosure->found_situations }}
                    </TD>
                    <TD class="text-size text-area">
                        {{ $caseClosure->process_description }}
                    </TD>
                    <TD class="text-size text-area">
                        {{ $caseClosure->progress_issues }}
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size" colspan="3">
                        OBSERVACIONES
                    </TD>
                </TR>
                <TR>
                        <TD class="text-size text-area" colspan="3">
                            {{ $caseClosure->observations }}
                        </TD>
                    </TR>
            </TABLE>
            <br>
            <br>
            <table class="table">
                <tr>
                    {{-- firma del psicologo --}}
                    <th class="table">
                        <p><img src="{{ public_path('./storage/signatures/'.$professional->signature_professional) }}" width="100" height="70"></p>
                    </th>

                </tr>
                <tr class="table table-font">
                    <TD >Firma del profesional</TD>
                </tr>
                <tr>
                    {{-- nombre del psicologo --}}
                    <th class="table">Nombre:
                        <samp class="line-document">
                            {{ $professional->name.' '.$professional->last_name }}
                        </samp>
                    </th>
                </tr>
                <tr>
                    {{-- documento de identidad psicologo --}}
                    <th class="table">C.C.:
                        <samp class="line-document">
                            {{ $professional->document_number }}
                        </samp>
                    </th>
                </tr>
            </table>





        </div>
</body>

</html>


