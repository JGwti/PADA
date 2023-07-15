@inject('selects', 'App\Services\Selects')

<style>
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

    .line-role {
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

    .line-date-city {
        width: 300px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .p-justificado {
        text-align: justify;
        line-height: 2.5em;

    }
</style>

<div class="container row justify-content-center text-center">
    <div class="col-8">
        <p class="p-justificado">
            {{ Form::hidden('age', $studentReferral->patient->age) }}
            {{ Form::hidden('id_referral', $studentReferral->id) }}
            {{ Form::hidden('type_form_id', '3') }}
            Yo,
            {{ Form::text('patien_name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'line-name' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
            menor de edad, identificado con Tarjeta de Identidad N.°
            {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'line-document' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
            en mi rol como
            {{ Form::text('patient_rol', $studentReferral->patient->patientType->name, ['class' => 'line-role' . ($errors->has('patient_rol') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_rol', '<div class="invalid-feedback">:message</div>') !!}
            de la Fundación Universitaria Juan de Castellanos, en pleno uso de mis facultades libre y voluntariamente,
            manifiesto que he sido informado sobre los
            procedimientos que se van a realizar desde la Unidad de Bienestar Universitario, y acepto participar en el
            acompañamiento del área de psicología (
            {{ Form::radio('professional_area', 'psychology', $assent->professional_area == 'psychology' ? true : false, ['class' => ' ' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
            ) y/o psicopedagogía (
            {{ Form::radio('professional_area', 'psychopedagogy', $assent->professional_area == 'psychopedagogy' ? true : false, ['class' => ' ' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
            ), con el fin de orientar y garantizar mi desarrollo integral dentro de la Institución. Lo anterior, por
            medio de de igual manera, entiendo que la información suministrada a las profesionales es de carácter
            confidencial y tengo derecho a conocer los avances y resultados alcanzados.
            <br>
            <br>
            Por otra parte, entiendo que se dará manejo ético y responsable de la información suministrada, la cual solo
            podrá ser revelada en aquellas situaciones que pudieran representar un riesgo muy
            grave para mi integridad, terceras personas o bien porque así fuere ordenado judicialmente. En el supuesto
            de que la autoridad judicial exija la revelación de alguna información, el profesional
            estará obligado a proporcionar solo aquella que sea relevante para el asunto en cuestión, manteniendo la
            confidencialidad de cualquier otra información.
            <br>
            <br>
            Expreso que he leído y comprendido integralmente este documento y, en consecuencia, acepto su contenido y
            reconozco el derecho a revocar la participación del acompañamiento desde el
            área de desarrollo humano sin ninguna implicación por parte de la Institución.
            <br>
            <br>
            En constancia, se firma a los
            {{ Form::number('day', $assent->day, ['class' => 'line-date-day' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
            {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}
            días del mes de
            {{ Form::text('mont', $assent->mont, ['class' => 'line-date-month' . ($errors->has('mont') ? ' is-invalid' : ''), 'placeholder' => 'Mont']) }}
            {!! $errors->first('mont', '<div class="invalid-feedback">:message</div>') !!}
            del año
            {{ Form::number('year', $assent->year, ['class' => 'line-date-year' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
            , en la ciudad de
            {{ Form::text('city', $assent->city, ['class' => 'line-date-city' . ($errors->has('city') ? ' is-invalid' : '')]) }}
            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
            <br>
            <br>
        </p>

        <TABLE class="table table-bordered border-dark">
            <TR>
                {{-- firma paciente --}}
                <th class="col-md-6">
                    <div class="form-group col">
                        {{ Form::file('patient_signature', ['class' => 'form-control' . ($errors->has('patient_signature') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('patient_signature', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </th>
                {{-- firma representante --}}
                <th class="col-md-6">
                    <div class="form-group col">
                        {{ Form::file('representative_signature', ['class' => 'form-control' . ($errors->has('representative_signature') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('representative_signature', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </th>
            </TR>
            <TR class="table-secondary">
                <TD class="fila--firma">Firma de quien recibe el acompañamiento</TD>
                <TD class="fila--firma">Firma del representante legal</TD>
            </TR>
            <TR>
                {{-- nombre paciente --}}
                <th scope="col">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::text('patien_name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'form-control' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
                {{-- nombre representante --}}
                <th scope="col">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::text('representative_name', $assent->representative_name, ['class' => 'form-control' . ($errors->has('representative_name') ? ' is-invalid' : ''), 'placeholder' => 'Representative Name']) }}
                            {!! $errors->first('representative_name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
            </TR>
            <TR>
                {{-- C.c pacientes --}}
                <th scope="col">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'form-control' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
                {{-- C.c representante --}}
                <th scope="col">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::text('representative_document_number', $assent->representative_document_number, ['class' => 'form-control' . ($errors->has('representative_document_number') ? ' is-invalid' : ''), 'placeholder' => 'Representative Document Number']) }}
                            {!! $errors->first('representative_document_number', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
            </TR>
            <TR>
                {{-- firma  psicologo --}}
                <th class="col-md-6">
                    <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}" name="signature_professional"
                        id="signature_psychological_id" class="img-thumbnail" width="50" height="50"
                        alt="Avatar">
                </th>
                {{-- firma  psicopedagogo --}}
                <th colspan="2">
                    <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}" name="signature_psychopedagogical"
                        id="signature_psychopedagogical_id" class="img-thumbnail" width="50" height="50"
                        alt="Avatar">
                </th>

            </TR>
            <TR class="table-secondary">
                <TD class="fila--firma">Firma profesional en Psicología</TD>
                <TD class="fila--firma">Firma profesional en Psicopedagogía</TD>
            </TR>
            <TR>
                {{-- name  psicologo --}}
                <th scope="col">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="col-md">
                            {{ Form::select('id_psychological', $selects->getUserPsychological(), $assent->id_psychological, ['class' => 'form-control ' . (!empty($errors->first('id_psychological')) ? 'is-invalid' : ''), 'id' => 'psychological_id']) }}
                            {!! $errors->first('id_psychological', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
                {{-- name  psicopedagogo --}}
                <th colspan="2">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="col-md">
                            {{ Form::select('id_psychopedagogical', $selects->getUserPsychopedagogical(), $assent->id_psychopedagogical, ['class' => 'form-control ' . (!empty($errors->first('id_psychopedagogical')) ? 'is-invalid' : ''), 'id' => 'psychopedagogical_name_id']) }}
                            {!! $errors->first('id_psychopedagogical', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
            </TR>
            <TR>
                {{-- numero  psicologo --}}
                <th scope="col-5">C.C.:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::number('psychological_document', null, ['class' => 'form-control' . ($errors->has('psychological_document') ? ' is-invalid' : ''), 'id' => 'psychological_document_id']) }}
                            {!! $errors->first('psychological_document', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
                {{-- numero  psicopedagogo --}}
                <th colspan="2">C.C.:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="form-group">
                            {{ Form::number('document_psychopedagogical', null, ['class' => 'form-control' . ($errors->has('document_psychopedagogical') ? ' is-invalid' : ''), 'id' => 'id_cc_profecional']) }}
                            {!! $errors->first('document_psychopedagogical', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
            </TR>
        </table>

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


@section('scriptSelectPsychopedagogical')
    <script>
        $(document).ready(function() {
            var id_user = document.getElementById('psychopedagogical_name_id').value;
            if (id_user != '') {
                var ajaxUrl = "{{ route('data.psychopedagogical', -1) }}";
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
                    $('#id_cc_profecional').val(data.document_number);
                    var src_img = document.getElementById("signature_psychopedagogical_id")
                        .src;
                    src_img = src_img.replace('default/-00000.jpeg', data.signature_professional);
                    document.getElementById('signature_psychopedagogical_id').setAttribute(
                        'src', src_img);
                }
            })
            $('#psychopedagogical_name_id').on('change', function(event) {
                var id_user = document.getElementById('psychopedagogical_name_id').value;
                if (id_user != '') {
                    var ajaxUrl = "{{ route('data.psychopedagogical', -1) }}";
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
                        $('#id_cc_profecional').val(data.document_number);
                        var src_img = document.getElementById("signature_psychopedagogical_id")
                            .src;
                        src_img = src_img.replace('default/-00000.jpeg', data
                            .signature_professional);
                        document.getElementById('signature_psychopedagogical_id').setAttribute(
                            'src', src_img);
                    }
                })
            });
        });
    </script>
@endsection
