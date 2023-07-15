@inject('selects', 'App\Services\Selects')

<style>
    .line-father-name {
        width: 550px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-father-document {
        width: 180px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-father-city {
        width: 145px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-patient-name {
        width: 400px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-patient-document {
        width: 140px;
        height: 20px;
        border: none;
        text-align: center;
        border-bottom: 1px solid rgb(0, 0, 0);
    }

    .line-patient-city {
        width: 140px;
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

    }
</style>

<div class="container row justify-content-center text-center">
    <div class="col-8">
        <p class="p-justificado">
            {{ Form::hidden('age', $studentReferral->patient->age) }}
            {{ Form::hidden('id_referral', $studentReferral->id) }}
            {{ Form::hidden('type_form_id', '4') }}
            Yo,
            {{ Form::text('representative_name', $legalRepresentative->representative_name, ['class' => 'line-father-name ' . ($errors->has('representative_name') ? ' is-invalid' : ''), 'placeholder' => 'Representative Name']) }}
            {!! $errors->first('representative_name', '<div class="invalid-feedback">:message</div>') !!}
            mayor de edad, identificado con cédula de ciudadanía N.°
            {{ Form::text('representative_document_number', $legalRepresentative->representative_document_number, ['class' => 'line-father-document ' . ($errors->has('representative_document_number') ? ' is-invalid' : ''), 'placeholder' => 'Representative Document Number']) }}
            {!! $errors->first('representative_document_number', '<div class="invalid-feedback">:message</div>') !!}
            de
            {{ Form::text('representative_document_city', $legalRepresentative->representative_document_city, ['class' => 'line-father-city' . ($errors->has('representative_document_city') ? ' is-invalid' : ''), 'placeholder' => 'Representative Document City']) }}
            {!! $errors->first('representative_document_city', '<div class="invalid-feedback">:message</div>') !!}
            , en calidad de representante legal del menor
            {{ Form::text('patien_name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'line-patient-name' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
            identificado con Registro Civil Registro civil (
                {!! Form::radio('civil_registration','registro_civil',$studentReferral->patient->documentType->name == 'Registro civil' ? true : false) !!}
            ) Tarjeta de Identidad (
                {!! Form::radio('identity_card','tarjeta de identidad',$studentReferral->patient->documentType->name == 'Tarjeta de Identidad' ? true : false) !!}
            ) N.°
            {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'line-patient-document' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
            de
            {{ Form::text('patient_document_city', $legalRepresentative->representative_document_city, ['class' => 'line-patient-city' . ($errors->has('patient_document_city') ? ' is-invalid' : ''), 'placeholder' => 'Patient Document City']) }}
            {!! $errors->first('patient_document_city', '<div class="invalid-feedback">:message</div>') !!}
            ,y en pleno uso de mis facultades libre y voluntariamente, manifiesto que he sido informado sobre los
            procedimientos que se van a realizar desde la Unidad de Bienestar Universitario, y acepto
            participar en el acompañamiento del área de psicología (
            {{ Form::radio('professional_area', 'psychology', $legalRepresentative->professional_area == 'psychology' ? true : false, ['class' => ' ' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
             ) y/o psicopedagogía (
            {{ Form::radio('professional_area', 'psychopedagogy', $legalRepresentative->professional_area == 'psychopedagogy' ? true : false, ['class' => ' ' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
             ) , con el fin de
            orientar y garantizar mi desarrollo integral dentro de la Institución. Lo anterior, por medio de
            valoración inicial, sesiones de orientación, seguimiento y evaluación periódica de los procesos;
            de igual manera, entiendo que la información suministrada a las profesionales es de carácter
            confidencial y tengo derecho a conocer los avances y resultados alcanzados.
            <br>
            <br>
            Por otra parte, entiendo que se dará manejo ético y responsable de la información suministrada,
            la cual solo podrá ser revelada en aquellas situaciones que pudieran representar un riesgo muy
            grave para mi integridad, terceras personas o bien porque así fuere ordenado judicialmente. En
            el supuesto de que la autoridad judicial exija la revelación de alguna información, el profesional
            estará obligado a proporcionar solo aquella que sea relevante para el asunto en cuestión,
            manteniendo la confidencialidad de cualquier otra información.
            <br>
            <br>
            Expreso que he leído y comprendido integralmente este documento y, en consecuencia, acepto
            su contenido y reconozco el derecho a revocar la participación del acompañamiento desde el
            área de desarrollo humano sin ninguna implicación por parte de la Institución.
            <br>
            <br>
            En constancia, se firma a los
            {{ Form::number('day', $legalRepresentative->day, ['class' => 'line-date-day' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
            {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}
            días del mes de
            {{ Form::text('mont', $legalRepresentative->mont, ['class' => 'line-date-month' . ($errors->has('mont') ? ' is-invalid' : ''), 'placeholder' => 'Mont']) }}
            {!! $errors->first('mont', '<div class="invalid-feedback">:message</div>') !!}
            del año
            {{ Form::number('year', $legalRepresentative->year, ['class' => 'line-date-year' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
            , en la ciudad de
            {{ Form::text('city', $legalRepresentative->city, ['class' => 'line-city' . ($errors->has('city') ? ' is-invalid' : '')]) }}
            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
            <br>
            <br>
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
                            {{ Form::text('representative_name', $legalRepresentative->representative_name, ['class' => 'form-control' . ($errors->has('representative_name') ? ' is-invalid' : ''), 'placeholder' => 'Representative Name']) }}
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
                            {{ Form::text('representative_document_number', $legalRepresentative->representative_document_number, ['class' => 'form-control' . ($errors->has('representative_document_number') ? ' is-invalid' : ''), 'placeholder' => 'Representative Document Number']) }}
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
                            {{ Form::select('id_psychological', $selects->getUserPsychological(), $legalRepresentative->id_psychological, ['class' => 'form-control ' . (!empty($errors->first('id_psychological')) ? 'is-invalid' : ''), 'id' => 'psychological_id']) }}
                            {!! $errors->first('id_psychological', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </th>
                {{-- name  psicopedagogo --}}
                <th colspan="2">Nombre:
                    <div class="form-group col-md-12 justify-content-center">
                        <div class="col-md">
                            {{ Form::select('id_psychopedagogical', $selects->getUserPsychopedagogical(), $legalRepresentative->id_psychopedagogical, ['class' => 'form-control ' . (!empty($errors->first('id_psychopedagogical')) ? 'is-invalid' : ''), 'id' => 'psychopedagogical_name_id']) }}
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
        </TABLE>


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
