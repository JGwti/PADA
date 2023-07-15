@inject('selects', 'App\Services\Selects')

{{-- campo fecha FECHA DE SESIÓN INICIAL: --}}
{{ Form::hidden('id_referral', $studentReferral->id) }}
{{ Form::hidden('type_form_id', '9') }}
<div class="container row justify-content-center text-center">
    <div class="col-10">
        {{-- campo fecha FECHA DE INICIO DE CASO: --}}
        <div class="form-group row">
            {!! Form::label('initial_session', 'FECHA DE SESIÓN INICIAL:', ['class' => 'col-md-4']) !!}
            <div class="col-md-8">
                <div class="col-md-10">
                    {!! Form::date(
                        'initial_session',
                        $studentReferral->remission_date,
                        [
                            'class' => 'form-control ' . (!empty($errors->first('initial_session')) ? 'is-invalid' : ''),
                        ],
                        \Carbon\Carbon::now(),
                    ) !!}
                    @error('initial_session')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div><br>
        {{-- campo fecha FECHA DE CIERRE DE CASO: --}}
        <div class="form-group row">
            {!! Form::label('date_case_clousure', 'FECHA DE CIERRE DE CASO:', ['class' => 'col-md-4']) !!}
            <div class="col-md-8">
                <div class="col-md-10">
                    {{ Form::date('end_session', $caseClosure->end_session, ['class' => 'form-control' . ($errors->has('end_session') ? ' is-invalid' : ''), 'placeholder' => 'Remission Date']) }}
                    {!! $errors->first('end_session', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div><br>
        {{-- campo area profecional --}}
        <div class="form-group row">
            {!! Form::label('professional_area', 'LÍNEA:', ['class' => 'col-md-4']) !!}
            <div class="col-md-8">
                <div class="col-md-10">
                    @if ($studentReferral->remission_to == 'psychology')
                        {{ Form::text('professional_area', $studentReferral->remission_to == 'psychology' ? 'Psicologia' : '', ['class' => 'form-control' . ($errors->has('professional_area') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
                    @elseif ($studentReferral->remission_to == 'psychopedagogy')
                        {{ Form::text('professional_area', $studentReferral->remission_to == 'psychopedagogy' ? 'Psicopedagogia' : '', ['class' => 'form-control' . ($errors->has('professional_area') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
                    @else
                        {{ Form::text('professional_area', $studentReferral->remission_to == 'academic_accompaniment_program' ? 'Acompañamiento academico' : '', ['class' => 'form-control' . ($errors->has('professional_area') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}
                    @endif

                </div>
            </div>
        </div><br>
        {{-- campo nombre --}}
        <div class="form-group row">
            {!! Form::label('name', 'NOMBRES Y APELLIDOS:', ['class' => 'col-md-4']) !!}
            <div class="col-md-8">
                <div class="col-md-10">
                    {{ Form::text('name', $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div><br>
        {{-- campo DOCUMENTO IDENTIDAD --}}
        <div class="form-group row">
            {!! Form::label('document_number', 'NÚMERO DE DOCUMENTO DE IDENTIDAD', ['class' => 'col-md-4']) !!}
            <div class="col-md-8">
                <div class="col-md-10">
                    {{ Form::text('patient_document', $studentReferral->patient->document_number, ['class' => 'form-control' . ($errors->has('patient_document') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('patient_document', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div><br>
        {{-- campo NUMERO DE SESSIONES --}}
        <div class="form-group row">
            {{ Form::label('number_sessions', 'NÚMERO DE SESIONES', ['class' => 'col-md-4']) }}
            <div class="col-md-8">
                <div class="col-md-10">
                    {{ Form::number('number_sessions', $caseClosure->number_sessions, ['class' => 'form-control' . ($errors->has('number_sessions') ? ' is-invalid' : ''), 'placeholder' => 'Number Sessions']) }}
                    {!! $errors->first('number_sessions', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div><br>
        {{-- TABLA SITUACIONES, DESCRIPCION AVANCES --}}
        <TABLE class="table table-bordered border-dark">
            <TR>
                <TD>
                    SITUACIONES ENCONTRADAS
                </TD>
                <TD>
                    DESCRIPCIÓN DEL PROCESO
                </TD>
                <TD>
                    AVANCES Y ASPECTOS POR MEJORAR
                </TD>
            </TR>
            <TR>
                <TD>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::textarea('found_situations', $caseClosure->found_situations, ['class' => 'form-control' . ($errors->has('found_situations') ? ' is-invalid' : ''), 'placeholder' => 'Found Situations']) }}
                            {!! $errors->first('found_situations', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div><br>
                </TD>
                <TD>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::textarea('process_description', $caseClosure->process_description, ['class' => 'form-control' . ($errors->has('process_description') ? ' is-invalid' : ''), 'placeholder' => 'Process Description']) }}
                            {!! $errors->first('process_description', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div><br>
                </TD>
                <TD>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::textarea('progress_issues', $caseClosure->progress_issues, ['class' => 'form-control' . ($errors->has('progress_issues') ? ' is-invalid' : ''), 'placeholder' => 'Progress Issues']) }}
                            {!! $errors->first('progress_issues', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div><br>
                </TD>
            </TR>
        </TABLE>

        {{-- campo OBSERVACIONES --}}
        <div class="form-group">
            {{ Form::label('observations') }}
            {{ Form::textarea('observations', $caseClosure->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observations']) }}
            {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
</div>
{{-- TABLA FIRMAS --}}
<div class="container row justify-content-center text-center">
    <div class="col-md-8 ">
        <table class="table table-bordered border-dark">
            <tr class="">
                <th colspan="2">
                    <img src="{{ asset('storage/signatures/default/-00000.jpeg') }}" name="signature_professional"
                        id="signature_professional_id" class="img-thumbnail" width="50" height="50"
                        alt="Avatar">
                </th>
            </tr>
            <tr class="">
                <th colspan="2">Firma del profesional</th>
            </tr>
            <tr class="">
                <th scope="col">Nombre: </th>
                <th scope="col">
                    <div class="form-group col-md-10 justify-content-center">
                        {!! Form::select('id_professional', $selects->get_psychopedagogical_name(), $caseClosure->id_professional, [
                            'class' => 'form-select col-md-4 ' . (!empty($errors->first('id_professional')) ? 'is-invalid' : ''),
                            'id' => 'id_professional',
                        ]) !!}
                        @error('id_professional')
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

@section('scriptSelectUser')
    <script>
        $(document).ready(function() {
            var id_user = document.getElementById('id_professional').value;
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
            $('#id_professional').on('change', function(event) {
                var id_user = document.getElementById('id_professional').value;
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
@endsection
