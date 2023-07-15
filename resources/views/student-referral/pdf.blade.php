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

        .text-area {
            height: 50px;
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
            font-size: 85%;
            margin-left: 65px;
            width: 80%;
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

        .p-justificado {
            text-align: justify;
            line-height: 2.5em;
        }

        .margin-tex {
            text-align: justify;
            line-height: 2.5em;
            margin-left: 60px;
            margin-right: 60px;

        }
    </style>

    <table class="table-head" CELLPADDING=10 CELLSPACING=0>
        <TR class="table">
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/escudo.png') }}" width="50" height="50">
            </TD>
            <TD class="table-head-ms" ROWSPAN=2>
                FORMATO REMISIÓN DE ESTUDIANTES
            </TD>
            <TD class="table-head-ms"> Código: </TD>
            <TD class="table-head-ms">
                FO-BIE-27 V.2
            </TD>
        </TR>
        <TR class="table">
            <TD class="table-head-ms">
                <img src="{{ public_path('./storage/img/JDC.png') }}" width="50" height="30">
            </TD>
            <TD class="table-head-ms">Página: </TD>
            <TD class="table-head-ms"> 1 de 1 </TD>
        </TR>
    </table>
    <br>
    <br>

    <table class="table-head" CELLPADDING=10 CELLSPACING=0>
        {{-- fecha de remision --}}
        <tr class="table">
            <TD colspan="4">
                FECHA DE REMISIÓN: {{ $studentReferral->remission_date }}
            </TD>
        </tr>
        {{-- remision a --}}
        <tr class="table">
            <td class="table">
                'REMISIÓN A:
            </td>
            <td class="table">
                Psicología:
                @if ($studentReferral->remission_to == 'psychology')
                    ( x )
                @endif
            </td>
            <td class="table">
                Psicopedagogía:
                @if ($studentReferral->remission_to == 'psychopedagogy')
                    ( x )
                @endif
            </td>
            <td class="table">
                Programa de Acompañamiento Académico:
                @if ($studentReferral->remission_to == 'academic_accompaniment_program')
                    ( x )
                @endif
            </td>
        </tr>
        {{-- nombre de quien remite --}}
        <tr class="table">
            <TD colspan="4" class="table table-font">
                NOMBRE DE QUIEN
                REMITE:{{ '  ' . $studentReferral->user->name . ' ' . $studentReferral->user->last_name }}
            </TD>
        </tr>
        {{-- Informacion del remitente --}}
        <tr class="table">
            {{-- campo correo --}}
            <td colspan="2">
                CORREO ELECTRÓNICO: {{ ' ' . $studentReferral->user->email }}
            </td>
            {{-- campo Telefono --}}
            <td colspan="2">
                NÚMERO DE CONTACTO: {{ ' ' . $studentReferral->user->phone }}
            </td>
        </tr>
        {{-- nombre estudiante --}}
        <tr class="table">
            <TD colspan="4" class="table table-font">
                NOMBRE DEL
                ESTUDIANTE:{{ $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name }}
            </TD>
        </tr>
        {{-- programa academico --}}
        <tr class="table">
            <td colspan="2">
                'PROGRAMA: {{ $studentReferral->patient->academicProgram->name }}
            </td>
            <td colspan="2">
                SEMESTRE: {{ $studentReferral->patient->semester->name }}
            </td>
        </tr>
        <tr class="table">
            {{-- campo Correo --}}
            <td colspan="2">
                'CORREO ELECTRÓNICO: {{ $studentReferral->patient->academicProgram->name }}
            </td>
            {{-- campo Telefono --}}

            <td colspan="2">
                NÚMERO DE CONTACTO: {{ $studentReferral->patient->semester->name }}
            </td>
        </tr>
        {{-- razon de remision --}}
        <tr class="table">
            <TD colspan="4" class="table table-font">
                MOTIVO POR EL QUE SE REMITE (Describa brevemente las situaciones por las cuales considera que el
                estudiante debe recibir acompañamiento psicosocial).
            </TD>
        </tr>
        {{--Text area motivos--}}
        <tr colspan="4" class="table">
            <TD colspan="4">
                <div class="text-area">
                    {{ $studentReferral->reason_referral }}
                </div>
            </TD>
        </tr>

        {{-- estrategias de acompañamiento --}}
        <tr class="table">
            <TD colspan="4" class="table table-font">
                ESTRATEGIAS DE ACOMPAÑAMIENTO (Describa las estrategias de acompañamiento y mediaciones pedagógicas que
                usted ha utilizado para favorecer la formación integral del estudiante).
            </TD>
        </tr>
        {{--Text area estrategias--}}
        <tr colspan="4" class="table">
            <TD colspan="4">
                <div class="text-area">
                    {{ $studentReferral->accompanying_strategies }}
                </div>
            </TD>
        </tr>
        {{-- observaciones --}}
        <tr class="table">
            <TD colspan="4" class="table table-font">
                OBSERVACIONES (En caso de ser necesario, describa de manera detallada la situación emocional, personal
                acompañamiento).
            </TD>
        </tr>
         {{--Text area estrategias--}}
         <tr colspan="4" class="table">
            <TD colspan="4">
                <div class="text-area">
                    {{ $studentReferral->observations }}
                </div>  
            </TD>
        </tr>
    </table>
    <br><br><br>


    <table class="table">
        <tr>
            {{-- firma de Psicologo --}}
            <th class="table">
                <p><img src="{{ public_path('./storage/signatures/' . $professional->signature_professional) }}"
                        width="100" height="70"></p>
            </th>
        </tr>
        <tr class="table table-font">
            <th class="table">Firma profesional en Psicología</th>
        </tr>
        <tr>
            {{-- nombre de Psicologo --}}
            <th class="table">Nombre:
                <samp class="line-document">
                    {{ $professional->name . ' ' . $professional->last_name }}
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




</body>

</html>
