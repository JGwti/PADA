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

        .line-input {
                    height: 10px;
            border: none;
            text-align: center;
            border-bottom: 1px solid rgb(0, 0, 0);
        }

        .no-line-input {
                    height: 10px;
            border: none;
            text-align: center;
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

    <table class="table-head" CELLPADDING=10 CELLSPACING=0>
        <TR>
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/escudo.png') }}" width="50" height="50">
            </TD>
            <TD class="table-head-ms" ROWSPAN=2>
                {{ $individualTracking->form->typeForm->name_form }}
            </TD>
            <TD class="table-head-ms"> Código: </TD>
            <TD class="table-head-ms">
                {{ $individualTracking->form->typeForm->code_form }}
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
    <br>
    <div class="p-justificadoo">
        <div class="text-sizeee">
            <TABLE class="table table-bordered border-dark" BORDER CELLPADDING=10 CELLSPACING=0>
                <TR>
                    <TD ROWSPAN=2>
                        <div class="">
                            <b>FICHA DE SEGUIMIENTO</b>
                        </div>
                        <BR>
                        <div class="">
                            <b>SESIÓN N°</b>
                            <samp class="line-input">
                                {{ ' ' . $individualTracking->session_number }}
                            </samp>
                        </div>
                    </TD>
                    <TD>
                        <b>DD</b>
                    </TD>
                    <TD>
                        <b>MM</b>
                    </TD>
                    <TD>
                        <b>AAAA</b>
                    </TD>
                </TR>
                <TR>
                    <TD>
                        <samp class="no-line-input">
                            {{ $individualTracking->day }}
                        </samp>
                    </TD>
                    <TD>
                        <samp class="no-line-input">
                            {{ $individualTracking->mont }}
                        </samp>
                    </TD>
                    <TD>
                        <samp class="no-line-input">
                            {{ $individualTracking->year }}
                        </samp>
                    </TD>
                </TR>
                <TR>
                    <TD>
                        <b>NOMBRE COMPLETO:</b>

                        <samp class="no-line-input">
                            {{ $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name . ' ' }}
                        </samp>
                    </TD>
                    <TD colspan="3">
                        <br>
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
                    </TD>
                </TR>
                <TR>
                    <TD>
                        LÍNEA:
                        <samp class="no-line-input">

                            @if ($studentReferral->remission_to == 'psychology')
                                {{ $studentReferral->remission_to == 'psychology' ? 'Psicologia' : '' }}
                            @elseif ($studentReferral->remission_to == 'psychopedagogy')
                                {{ $studentReferral->remission_to == 'psychopedagogy' ? 'Psicopedagogia' : '' }}
                            @else
                                {{ $studentReferral->remission_to == 'academic_accompaniment_program' ? 'Acompañamiento academico' : '' }}
                            @endif
                        </samp>

                    </TD>
                    <TD colspan="3">
                        PROCESO:
                        <samp class="no-line-input">
                            {{ $individualTracking->process }}
                        </samp>
                    </TD>
                </TR>
                <TR>
                    <TD colspan="4" class="cuadros-texto ">
                        OBJETIVO:
                        <samp class="no-line-input">
                            {{ $individualTracking->objective }}
                        </samp>
                    </TD>
                </TR>

                <TR>
                    <TD colspan="4" class="cuadros-texto">
                        DESCRIPCIÓN DE LA SESIÓN:
                        <samp class="no-line-input">
                            {{ $individualTracking->session_description }}
                        </samp>
                    </TD>
                </TR>

                <TR>
                    <TD colspan="4" class="cuadros-texto">
                        OBSERVACIONES:
                        <samp class="no-line-input">
                            {{ $individualTracking->observations }}
                        </samp>
                    </TD>
                </TR>
            </TABLE>
            <br>
            {{-- TABLA FIRMAS --}}
            <table class="table">
                <tr>
                    {{-- firma del psicologo --}}
                    <th class="table">
                        <p><img src="{{ public_path('./storage/signatures/' . $user->signature_professional) }}"
                                width="100" height="70"></p>
                    </th>
                </tr>
                <tr class="table table-font">
                    <TD>Firma del profesional</TD>
                </tr>
                <tr>
                    {{-- nombre del psicologo --}}
                    <th class="table">Nombre:
                        <samp class="line-document">
                            {{ $user->name . ' ' . $user->last_name }}
                        </samp>
                    </th>
                </tr>
                <tr>
                    {{-- documento de identidad psicologo --}}
                    <th class="table">C.C.:
                        <samp class="line-document">
                            {{ $user->document_number }}
                        </samp>
                    </th>
                </tr>
            </table>

        </div>
    </div>

</body>

</html>
