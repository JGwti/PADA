@inject('selects', 'App\Services\Selects')
<br>
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
            {{ Form::hidden('id_referral', $studentReferral->id) }}
            {{ Form::hidden('type_form_id', '5') }}
            Yo,

            {{ Form::text('patien_name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'line-name' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}

            mayor de edad, identificado con cédula de ciudadanía N.°

            {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'line-document' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}

            en mi rol como

            {{ Form::text('patient_rol', $studentReferral->patient->patientType->name, ['class' => 'line-role' . ($errors->has('patient_rol') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_rol', '<div class="invalid-feedback">:message</div>') !!}

            de la Fundación Universitaria Juan de Castellanos, por
            medio de la presente constancia y en uso de mis facultades mentales, otorgo de forma libre mi
            disentimiento para la realización del acompañamiento de la línea de psicología (

            {{ Form::radio('professional_area', 'psychology', $informedDissent->professional_area == 'psychology' ? true : false, ['class' => ' ' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
            ) o psicopedagogía(

            {{ Form::radio('professional_area', 'psychopedagogy', $informedDissent->professional_area == 'psychopedagogy' ? true : false, ['class' => ' ' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
            {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}

            ) que brinda la Unidad de Bienestar Universitario.
            <br>
            <br>
            Se me han sido explicadas las implicaciones y posibles complicaciones por su no realización; no
            obstante, me niego al mismo, asumiendo los riesgos bajo mi propia responsabilidad.
            <br>
            <br>

            En constancia, se firma a los

            {{ Form::number('day', $informedDissent->day, ['class' => 'line-date-day' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
            {!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}

            días del mes de

            {{ Form::text('mont', $informedDissent->mont, ['class' => 'line-date-month' . ($errors->has('mont') ? ' is-invalid' : ''), 'placeholder' => 'Mont']) }}
            {!! $errors->first('mont', '<div class="invalid-feedback">:message</div>') !!}

            del año

            {{ Form::number('year', $informedDissent->year, ['class' => 'line-date-year' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}

            , en la ciudad de

            {{ Form::text('city', $informedDissent->city, ['class' => 'line-city' . ($errors->has('city') ? ' is-invalid' : '')]) }}
            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}


            <br>
            <br>


        <div class="container row justify-content-center text-center">
            <div class="col-md-12 ">
                <table class="table table-bordered border-dark">
                    <tr>
                        {{-- firma paciente --}}
                        <th class="col-md-6">
                            <div class="form-group col">
                                {{ Form::file('patient_signature', ['class' => 'form-control' . ($errors->has('patient_signature') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('patient_signature', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </th>
                    </tr>
                    <tr class="col-md-12 table-secondary">
                        <th>Firma de quien disiente </th>
                    </tr>
                    <tr class="col-md-12">
                        {{-- nombre de paciente --}}
                        <th scope="col">Nombre:
                            <div class="form-group col-md-12 justify-content-center">
                                <div class="form-group">
                                    {{ Form::text('patien_name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'form-control' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr class="col-md-12">
                        {{-- documento de identidad paciente --}}
                        <th scope="col">Nombre:
                            <div class="form-group col-md-12 justify-content-center">
                                <div class="form-group">
                                    {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'form-control' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
                                    {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>

                <table class="table table-bordered border-dark">

                    <tr class="col-md-6">
                        {{-- firma de Psicologo --}}
                        <th class="col-md-6">
                            <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}"
                                name="signature_professional" id="signature_psychological_id" class="img-thumbnail"
                                width="50" height="50" alt="Avatar">
                        </th>
                        {{-- firma del psicopedagogo --}}
                        <th colspan="2">
                            <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}"
                                name="signature_psychopedagogical" id="signature_psychopedagogical_id"
                                class="img-thumbnail" width="50" height="50" alt="Avatar">
                        </th>
                    </tr>
                    <tr class="table-secondary">
                        <th>Firma profesional en Psicología</th>
                        <th>Firma profesional en Psicopedagogía</th>
                    </tr>
                    <tr class="col-md-6">
                        {{-- nombre de Psicologo --}}
                        {{-- nombre de Psicologo --}}
                        <th scope="col">Nombre:
                            <div class="form-group col-md-12 justify-content-center">
                                <div class="col-md">
                                    {{ Form::select('id_psychological', $selects->getUserPsychological(), $informedDissent->id_psychological, ['class' => 'form-control ' . (!empty($errors->first('id_psychological')) ? 'is-invalid' : ''), 'id' => 'psychological_id']) }}
                                    {!! $errors->first('id_psychological', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </th>
                        {{-- nombre del psicodedagogo --}}
                        <th colspan="2">Nombre:
                            <div class="form-group col-md-12 justify-content-center">
                                <div class="col-md">
                                    {{ Form::select('id_psychopedagogical', $selects->getUserPsychopedagogical(), $informedDissent->id_psychopedagogical, ['class' => 'form-control ' . (!empty($errors->first('id_psychopedagogical')) ? 'is-invalid' : ''), 'id' => 'psychopedagogical_name_id']) }}
                                    {!! $errors->first('id_psychopedagogical', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </th>

                    </tr>
                    <tr class="col-md-6">
                        {{-- documento de identidad psicologo --}}
                        <th scope="col-5">C.C.:
                            <div class="form-group col-md-12 justify-content-center">
                                <div class="form-group">
                                    {{ Form::number('psychological_document', null, ['class' => 'form-control' . ($errors->has('psychological_document') ? ' is-invalid' : ''), 'id' => 'psychological_document_id']) }}
                                    {!! $errors->first('psychological_document', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </th>
                        {{-- documento de identidad psicopedagogo --}}
                        <th colspan="2">C.C.:
                            <div class="form-group col-md-12 justify-content-center">
                                <div class="form-group">
                                    {{ Form::number('document_psychopedagogical', null, ['class' => 'form-control' . ($errors->has('document_psychopedagogical') ? ' is-invalid' : ''), 'id' => 'id_cc_profecional']) }}
                                    {!! $errors->first('document_psychopedagogical', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
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
