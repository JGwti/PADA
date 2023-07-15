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

@inject('selects', 'App\Services\Selects')
<br>
<div class="container row justify-content-center text-center">
    <div class="col-8">
        <p class="p-justificado">
            {{ Form::hidden('age', $studentReferral->patient->age) }}
            {{ Form::hidden('id_referral', $studentReferral->id) }}
            {{ Form::hidden('type_form_id', '2') }}
            Yo,
            {{ Form::text('patien_name', ' ' . $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name . ' ', ['class' => 'line-name' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
            mayor de edad,

            identificado con cédula de ciudadanía N.°
            {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'line-document' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
            en mi rol como

            {{ Form::text('patient_rol', $studentReferral->patient->patientType->name, ['class' => 'line-document' . ($errors->has('patient_rol') ? ' is-invalid' : '')]) }}
            {!! $errors->first('patient_rol', '<div class="invalid-feedback">:message</div>') !!}
            de la Fundación Universitaria Juan de Castellanos, en pleno

            @include('consent.components.form-text')
        </p>
        <br>
        <br>
        <div class="col-md-12 ">
            <table class="table table-bordered border-dark">
                <tr>
                    {{-- firma de paciente --}}
                    <th class="col-md-6">
                        <div class="form-group col">
                            {{ Form::file('patient_signature', ['class' => 'form-control' . ($errors->has('patient_signature') ? ' is-invalid' : '')]) }}
                            {!! $errors->first('patient_signature', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </th>
                    {{-- firma de Psicologo --}}
                    <th class="col-md-6">
                        <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}" name="signature_professional"
                            id="signature_psychological_id" class="img-thumbnail" width="50" height="50"
                            alt="Avatar">
                    </th>
                </tr>
                <tr class="table-secondary">
                    <th class="col-md-6">Firma de quien recibirá el acompañamiento</th>
                    <th class="col-md-6">Firma profesional en Psicología</th>
                </tr>
                <tr>
                    {{-- nombre de paciente --}}
                    <th scope="col">Nombre:
                        <div class="form-group col-md-12 justify-content-center">
                            <div class="form-group">
                                {{ Form::text('patien_name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'form-control' . ($errors->has('patien_name') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('patien_name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </th>
                    {{-- nombre de Psicologo --}}
                    <th scope="col">Nombre:
                        <div class="form-group col-md-12 justify-content-center">
                            <div class="col-md">
                                {{ Form::select('id_psychological', $selects->getUserPsychological(), $consent->id_psychological, ['class' => 'form-control ' . (!empty($errors->first('id_psychological')) ? 'is-invalid' : ''), 'id' => 'psychological_id']) }}
                                {!! $errors->first('id_psychological', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    {{-- documento de identidad paciente --}}
                    <th scope="col">Nombre:
                        <div class="form-group col-md-12 justify-content-center">
                            <div class="form-group">
                                {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'form-control' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </th>

                    {{-- documento de identidad psicologo --}}
                    <th scope="col-5">C.C.:
                        <div class="form-group col-md-12 justify-content-center">
                            <div class="form-group">
                                {{ Form::number('psychological_document', null, ['class' => 'form-control' . ($errors->has('psychological_document') ? ' is-invalid' : ''), 'id' => 'psychological_document_id']) }}
                                {!! $errors->first('psychological_document', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </th>

                </tr>
                <tr>
                    {{-- firma del psicopedagogo --}}
                    <th colspan="2">
                        <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}"
                            name="signature_psychopedagogical" id="signature_psychopedagogical_id" class="img-thumbnail"
                            width="50" height="50" alt="Avatar">
                    </th>
                </tr>
                <tr class="table-secondary">
                    <th colspan="2">Firma profesional en Psicopedagogía</th>
                </tr>
                <tr>
                    {{-- nombre del psicodedagogo --}}
                    <th colspan="2">Nombre:
                        <div class="form-group col-md-12 justify-content-center">
                            <div class="col-md">
                                {{ Form::select('id_psychopedagogical', $selects->getUserPsychopedagogical(), $consent->id_psychopedagogical, ['class' => 'form-control ' . (!empty($errors->first('id_psychopedagogical')) ? 'is-invalid' : ''), 'id' => 'psychopedagogical_name_id']) }}
                                {!! $errors->first('id_psychopedagogical', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
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
