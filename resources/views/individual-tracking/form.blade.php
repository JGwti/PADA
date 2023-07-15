<style>
    .texto-justificado {
        text-align: justify;
        width: 600px;
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

    .line-date-month {
        width: 80px;
        height: 20px;
        border: none;
        text-align: center;
    }

    .line-date-day {
        width: 40px;
        height: 20px;
        border: none;
        text-align: center;
    }

    .line-date-year {
        width: 60px;
        height: 20px;
        border: none;
        text-align: center;
    }
</style>

<style>
    .contenedor {
        display: inline-block;
        min-width: 100px;
    }

    .objectives {
        background-color: red;
        width: 100%;
    }
</style>
@inject('selects', 'App\Services\Selects')

{{ Form::hidden('id_referral', $studentReferral->id) }}
{{ Form::hidden('type_form_id', '8') }}
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <TABLE class="table table-bordered border-dark" BORDER CELLPADDING=10 CELLSPACING=0>
            <TR>
                <TD ROWSPAN=2>
                    <div class="col">
                        <label for="sesionN">FICHA DE SEGUIMIENTO </label>
                    </div>
                    <BR>
                    <div class="col-3">
                        {{ Form::label('SESIÓN N°') }}
                    </div>
                    <div class="col-9">
                        {{ Form::text('session_number', $individualTracking->session_number, ['class' => 'form-control' . ($errors->has('session_number') ? ' is-invalid' : ''), 'placeholder' => 'Session Number']) }}
                        {!! $errors->first('session_number', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </TD>
                <TD>
                    {{ Form::label('DD') }}
                </TD>
                <TD>

                    {{ Form::label('MM') }}
                </TD>
                <TD>
                    {{ Form::label('AAAA') }}
                </TD>
            </TR>
            <TR>
                <TD>
                    {{ Form::number('day', $individualTracking->day, ['class' => 'line-date-day' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
                    {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}

                </TD>
                <TD>
                    {{ Form::text('mont', $individualTracking->mont, ['class' => 'line-date-month' . ($errors->has('mont') ? ' is-invalid' : ''), 'placeholder' => 'Mont']) }}
                    {!! $errors->first('mont', '<div class="invalid-feedback">:message</div>') !!}

                </TD>
                <TD>
                    {{ Form::number('year', $individualTracking->year, ['class' => 'line-date-year' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
                    {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}

                </TD>
            </TR>
            <TR>
                <TD>
                    {{ Form::label('NOMBRE COMPLETO:') }}
                    {{ Form::text('FULL_NAME', ' ' . $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name . ' ', ['class' => 'form-control' . ($errors->has('FULL_NAME') ? ' is-invalid' : ''), 'placeholder' => 'FULL_NAME']) }}
                    {!! $errors->first('FULL_NAME', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
                <TD colspan="3">
                    <br>
                    {{ Form::label('document_number', 'C.C.') }}
                    (
                    {{ Form::radio('document_type_id', 'C.C', $studentReferral->patient->documentType->name == 'Cedula de Ciudadania' ? true : false, ['class' => 'parrafos' . ($errors->has('document_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                    {!! $errors->first('document_type_id', '<div class="invalid-feedback">:message</div>') !!}

                    )T.I. (

                    {{ Form::radio('document_type_id', 'T.I', $studentReferral->patient->documentType->name == 'Tarjeta de Identidad' ? true : false, ['class' => 'parrafos' . ($errors->has('document_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                    {!! $errors->first('document_type_id', '<div class="invalid-feedback">:message</div>') !!}
                    )
                </TD>
            </TR>
            <TR>
                <TD>
                    @if ($studentReferral->remission_to == 'psychology')
                        {{ Form::label('LÍNEA:') }}
                        {{ Form::text('line', $studentReferral->remission_to == 'psychology' ? 'Psicologia' : '', ['class' => 'form-control' . ($errors->has('line') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('line', '<div class="invalid-feedback">:message</div>') !!}
                    @elseif ($studentReferral->remission_to == 'psychopedagogy')
                        {{ Form::label('LÍNEA:') }}
                        {{ Form::text('line', $studentReferral->remission_to == 'psychopedagogy' ? 'Psicopedagogia' : '', ['class' => 'form-control' . ($errors->has('line') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('line', '<div class="invalid-feedback">:message</div>') !!}
                    @else
                        {{ Form::label('LÍNEA:') }}
                        {{ Form::text('line', $studentReferral->remission_to == 'academic_accompaniment_program' ? 'Acompañamiento academico' : '', ['class' => 'form-control' . ($errors->has('line') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('line', '<div class="invalid-feedback">:message</div>') !!}
                    @endif
                </TD>
                <TD colspan="3">
                    {{ Form::label('PROCESO:') }}
                    {{ Form::text('process', $individualTracking->process, ['class' => 'form-control' . ($errors->has('process') ? ' is-invalid' : ''), 'placeholder' => 'Process']) }}
                    {!! $errors->first('process', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
            </TR>
            <TR>
                <TD colspan="4" class="cuadros-texto ">
                    {{ Form::label('OBJETIVO:') }}
                    {{ Form::text('objective', $individualTracking->objective, ['class' => 'form-control' . ($errors->has('objective') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('objective', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
            </TR>

            <TR>
                <TD colspan="4" class="cuadros-texto">
                    {{ Form::label('DESCRIPCIÓN DE LA SESIÓN:') }}
                    {{ Form::textarea('session_description', $individualTracking->session_description, ['class' => 'form-control' . ($errors->has('session_description') ? ' is-invalid' : ''), 'placeholder' => 'Session Description']) }}
                    {!! $errors->first('session_description', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
            </TR>

            <TR>
                <TD colspan="4" class="cuadros-texto">
                    {{ Form::label('OBSERVACIONES:') }}
                    {{ Form::textarea('observations', $individualTracking->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observations']) }}
                    {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
                </TD>
            </TR>
        </TABLE>
        <br>







        {{-- TABLA FIRMAS --}}
        <div class="container row justify-content-center text-center">
            <div class="col-md-8 ">
                <table class="table table-bordered border-dark">
                    <tr class="">
                        <th colspan="2">
                            <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}"
                                name="signature_professional" id="signature_professional_id" class="img-thumbnail"
                                width="50" height="50" alt="Avatar">
                        </th>
                    </tr>
                    <tr class="">
                        <th colspan="2">Firma del profesional</th>
                    </tr>
                    <tr class="">
                        <th scope="col">Nombre: </th>
                        <th scope="col">
                            <div class="form-group col-md-10 justify-content-center">
                                {!! Form::select(
                                    'user_id',
                                    $selects->get_psychopedagogical_name(),
                                    $individualTracking->user_id,
                                    [
                                        'class' => 'form-select col-md-4 ' . (!empty($errors->first('user_id')) ? 'is-invalid' : ''),
                                        'id' => 'user_id',
                                    ],
                                ) !!}
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
                                {!! Form::text('name_profecional', null, [
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

@section('scriptSelectUser')
    <script>
        $(document).ready(function() {
            var id_user = document.getElementById('user_id').value;
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
                    $('#id_cc_profecional').val(data.document_number);
                    var src_img = document.getElementById("signature_professional_id").src;
                    src_img = src_img.replace('default/-00000.jpeg', data.signature_professional);
                    document.getElementById('signature_professional_id').setAttribute('src',
                        src_img);
                }
            })
            $('#user_id').on('change', function(event) {
                var id_user = document.getElementById('user_id').value;
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
                        $('#id_cc_profecional').val(data.document_number);
                        var src_img = document.getElementById("signature_professional_id").src;
                        src_img = src_img.replace('default/-00000.jpeg', data
                            .signature_professional);
                        document.getElementById('signature_professional_id').setAttribute('src',
                            src_img);
                    }
                })
            });
        });
    </script>

    <script>
        let area = document.querySelectorAll(".text-area")

        window.addEventListener("DOMContentLoaded", () => {
            area.forEach((elemento) => {
                elemento.style.height = `${elemento.scrollHeight}px`
            })
        })
    </script>
@endsection
