<style>
    .p-justificado {
        text-align: justify;
    }

    .text-size {
        font-size: 70%;
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

    .p-justificado {
        text-align: justify;
        line-height: 2.5em;
    }

    .t-aling {
        width: 95%;
        align-content: center;
        left: 20px;
    }

    .content-aling-initial {
        width: 100%;
        align-items: flex-start;
    }

    .item-alig {
        align-content: :flex-end;
    }

    .td-size {
        width: 30px;
        right: 5px;
    }

    div {
        border: red 1px solid;
    }
</style>
{{ Form::hidden('id_referral', $studentReferral->id) }}
{{ Form::hidden('type_form_id', '11') }}
<div class="container row justify-content-center">
    <div class="col-8">
        <p class="p-justificado">
            A continuación, encontrará el cuestionario que evalúa el impacto del Programa de Acompañamiento
            Académico, por lo tanto, es importante conocer su percepción frente a algunos componentes de esta
            estrategia institucional.
            <br>
            Tenga en cuenta las siguientes descripciones al momento de responder el cuestionario:
            <br>
        <div class="t-aling p-justificado">
            <table>
                <tr>
                    <td class="td-size">
                        •
                    </td>
                    <td class="text-size">
                        Equipo psicosocial involucra a los profesionales en psicología y psicopedagogía.
                    </td>
                </tr>
                <tr>
                    <td class="td-size">
                        •
                    </td>
                    <td class="text-size">
                        Docentes representantes, es un docente designado por facultad o programa que lidera
                        el acompañamiento académico a los estudiantes de su facultad y/o programa.
                    </td>
                </tr>
                <tr>
                    <td class="td-size">
                        •
                    </td>
                    <td class="text-size">
                        El Programa de Acompañamiento Académico involucra los siguientes actores: decanos, directores de
                        programa, docentes representantes, equipo psicosocial, coordinación área de desarrollo humano y
                        jefatura de la Unidad de Bienestar Universitario.
                    </td>
                </tr>
            </table>
        </div>
        </p>
        <div class="content-aling-initial">
            <h4>DATOS PERSONALES </h4>
            <div class="">
                {{ Form::label('gender', 'Género:') }}
                {{ Form::text('gender', $studentReferral->patient->genderType->name, ['class' => 'form-control col-7' . ($errors->has('gender') ? ' is-invalid' : '')]) }}
                {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="">
                {{ Form::label('age', 'Edad') }}
                {{ Form::number('age', $studentReferral->patient->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : '')]) }}
                {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="">
                {{ Form::label('academic_program', 'Programa académico:') }}
                {{ Form::text('academic_program', $studentReferral->patient->academicProgram->name, ['class' => 'form-control' . ($errors->has('academic_program') ? ' is-invalid' : '')]) }}
                {!! $errors->first('academic_program', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="">
                {{ Form::label('semester', 'Semestre:') }}
                {{ Form::text('semester', $studentReferral->patient->semester->name, ['class' => 'form-control' . ($errors->has('semester') ? ' is-invalid' : '')]) }}
                {!! $errors->first('semester', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <br>
        <TABLE class="table table-bordered border-dark">
            <div class="p-justificado">
                <TR>
                <TR>
                    <TD class="text-center item-alig" ROWSPAN=3>
                        <b>
                            ÍTEM
                        </b>
                    </TD>
                    <TD class="text-center" colspan="5">
                        <b>
                            ESCALA DE MEDICIÓN
                        </b>
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        Totalmente de acuerdo
                    </TD>
                    <TD class="text-size">
                        Parcialmente de acuerdo
                    </TD>
                    <TD class="text-size">
                        Ni en acuerdo ni en desacuerdo
                    </TD>
                    <TD class="text-size">
                        Parcialmente en desacuerdo
                    </TD>
                    <TD class="text-size">
                        Totalmente en desacuerdo
                    </TD>
                </TR>
                </TR>
                <TR>
                <TR>
                    <TD ROWSPAN=2>
                        1. El equipo psicosocial de la Unidad de
                        Bienestar Universitario atiende las
                        necesidades académicas y psicológicas de la
                        población estudiantil.
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        {{ Form::radio('item_one', 'unoTotalmenteAucuerdo', $impactMeasurementInstrument->item_one == 'unoTotalmenteAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_one') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_one', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_one', 'unoPacrcialAucuerdo', $impactMeasurementInstrument->item_one == 'unoPacrcialAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_one') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_one', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_one', 'unoMedioAucuerdo', $impactMeasurementInstrument->item_one == 'unoMedioAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_one') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_one', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_one', 'unoPacrcialDesacuerdo', $impactMeasurementInstrument->item_one == 'unoPacrcialDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_one') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_one', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_one', 'unoTotalmenteDesacuerdo', $impactMeasurementInstrument->item_one == 'unoTotalmenteDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_one') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_one', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                </TR>
                <TR>
                <TR>
                    <TD ROWSPAN=2>
                        2. Los docentes representantes y el equipo
                        psicosocial cuentan con las habilidades
                        personales y profesionales para garantizar el
                        acompañamiento académico a la población
                        estudiantil.
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        {{ Form::radio('item_two', 'dosTotalmenteAucuerdo', $impactMeasurementInstrument->item_two == 'dosTotalmenteAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_two') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_two', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_two', 'dosPacrcialAucuerdo', $impactMeasurementInstrument->item_two == 'dosPacrcialAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_two') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_two', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_two', 'dosMedioAucuerdo', $impactMeasurementInstrument->item_two == 'dosMedioAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_two') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_two', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_two', 'dosPacrcialDesacuerdo', $impactMeasurementInstrument->item_two == 'dosPacrcialDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_two') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_two', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_two', 'dosTotalmenteDesacuerdo', $impactMeasurementInstrument->item_two == 'dosTotalmenteDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_two') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_two', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                </TR>
                <TR>
                    <TD ROWSPAN=2>
                        3. El Programa de Acompañamiento
                        Académico contribuyó al desarrollo de mi
                        proceso académico y emocional.
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        {{ Form::radio('item_three', 'tresTotalmenteAucuerdo', $impactMeasurementInstrument->item_three == 'tresTotalmenteAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_three') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_three', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_three', 'tresPacrcialAucuerdo', $impactMeasurementInstrument->item_three == 'tresPacrcialAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_three') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_three', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_three', 'tresMedioAucuerdo', $impactMeasurementInstrument->item_three == 'tresMedioAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_three') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_three', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_three', 'tresPacrcialDesacuerdo', $impactMeasurementInstrument->item_three == 'tresPacrcialDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_three') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_three', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_three', 'tresTotalmenteDesacuerdo', $impactMeasurementInstrument->item_three == 'tresTotalmenteDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_three') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_three', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                </TR>
                <TR>
                    <TD ROWSPAN=2>
                        4. Los recursos materiales, tecnológicos y
                        de infraestructura son apropiados para el
                        desarrollo de la estrategia institucional.
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        {{ Form::radio('item_four', 'cuatroTotalmenteAucuerdo', $impactMeasurementInstrument->item_four == 'cuatroTotalmenteAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_four') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_four', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_four', 'cuatroPacrcialAucuerdo', $impactMeasurementInstrument->item_four == 'cuatroPacrcialAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_four') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_four', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_four', 'cuatroMedioAucuerdo', $impactMeasurementInstrument->item_four == 'cuatroMedioAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_four') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_four', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_four', 'cuatroPacrcialDesacuerdo', $impactMeasurementInstrument->item_four == 'cuatroPacrcialDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_four') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_four', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_four', 'cuatroTotalmenteDesacuerdo', $impactMeasurementInstrument->item_four == 'cuatroTotalmenteDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_four') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_four', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                </TR>
                <TR>
                    <TD ROWSPAN=2>
                        5. El Programa de Acompañamiento
                        Académico representa una estrategia idónea,
                        pertinente y de impacto positivo en la población
                        estudiantil.
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        {{ Form::radio('item_five', 'cincoTotalmenteAucuerdo', $impactMeasurementInstrument->item_five == 'cincoTotalmenteAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_five') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_five', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_five', 'cincoPacrcialAucuerdo', $impactMeasurementInstrument->item_five == 'cincoPacrcialAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_five') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_five', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_five', 'cincoMedioAucuerdo', $impactMeasurementInstrument->item_five == 'cincoMedioAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_five') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_five', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_five', 'cincoPacrcialDesacuerdo', $impactMeasurementInstrument->item_five == 'cincoPacrcialDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_five') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_five', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_five', 'cincoTotalmenteDesacuerdo', $impactMeasurementInstrument->item_five == 'cincoTotalmenteDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_five') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_five', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                </TR>
                <TR>
                    <TD ROWSPAN=2>
                        6. Mi compromiso y motivación al cambio
                        favorecieron al cumplimiento de los objetivos
                        del Programa de Acompañamiento Académico.
                    </TD>
                </TR>
                <TR>
                    <TD class="text-size">
                        {{ Form::radio('item_six', 'seisTotalmenteAucuerdo', $impactMeasurementInstrument->item_six == 'seisTotalmenteAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_six') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_six', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_six', 'seisPacrcialAucuerdo', $impactMeasurementInstrument->item_six == 'seisPacrcialAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_six') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_six', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_six', 'seisMedioAucuerdo', $impactMeasurementInstrument->item_six == 'seisMedioAucuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_six') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_six', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_six', 'seisPacrcialDesacuerdo', $impactMeasurementInstrument->item_six == 'seisPacrcialDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_six') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_six', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                    <TD class="text-size">
                        {{ Form::radio('item_six', 'seisTotalmenteDesacuerdo', $impactMeasurementInstrument->item_six == 'seisTotalmenteDesacuerdo' ? true : false, ['class' => ' ' . ($errors->has('item_six') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
                        {!! $errors->first('item_six', '<div class="invalid-feedback">:message</div>') !!}
                    </TD>
                </TR>
                </TR>
            </div>
        </TABLE>
        <p class="">
            {{ Form::label('program_strengths') }}
            {!! $errors->first('program_strengths', '<div class="invalid-feedback">:message</div>') !!}
            {{ Form::textarea('program_strengths', $impactMeasurementInstrument->program_strengths, ['class' => 'form-control' . ($errors->has('program_strengths') ? ' is-invalid' : '')]) }}

            <br>
            {{ Form::label('improvements_program') }}
            {{ Form::textarea('improvements_program', $impactMeasurementInstrument->improvements_program, ['class' => 'form-control' . ($errors->has('improvements_program') ? ' is-invalid' : '')]) }}
            {!! $errors->first('improvements_program', '<div class="invalid-feedback">:message</div>') !!}
        <div>
            Gracias por su colaboración ¡Juntos construimos Universidad!
        </div>
        </p>
    </div>
</div>
