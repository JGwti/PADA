uso de mis facultades libre y voluntariamente, manifiesto que he sido informado sobre los procedimientos

que se van a realizar desde la Unidad de Bienestar Universitario, y acepto participar en el acompañamiento del área de

@if ($studentReferral->remission_to == 'psychology' || $studentReferral->remission_to == 'psychopedagogy')
    psicología (
    {{ Form::radio('professional_area', 'psychology', $studentReferral->remission_to == 'psychology' ? true : false, ['class' => 'parrafos' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}

    ) y/o psicopedagogía (

    {{ Form::radio('professional_area', 'psychopedagogy', $studentReferral->remission_to == 'psychopedagogy' ? true : false, ['class' => 'parrafos' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}

    ), con
@else
    psicología (
    {{ Form::checkbox('professional_area', 'psychology', $studentReferral->remission_to == 'academic_accompaniment_program' ? true : false, ['class' => 'parrafos' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}

    ) y/o psicopedagogía (

    {{ Form::checkbox('professional_area', 'psychopedagogy', $studentReferral->remission_to == 'academic_accompaniment_program' ? true : false, ['class' => 'parrafos' . ($errors->has('professional_area') ? ' is-invalid' : ''), 'placeholder' => 'Remission To']) }}
    {!! $errors->first('professional_area', '<div class="invalid-feedback">:message</div>') !!}

    ), con
@endif


el fin de orientar y garantizar mi desarrollo integral dentro de la Institución. Lo anterior, por medio de valoración
inicial, sesiones de orientación, seguimiento y

evaluación periódica de los procesos; de igual manera, entiendo que la información suministrada a las profesionales es
de carácter confidencial y tengo derecho

a conocer los avances y resultados alcanzados.
<br>
<br>

Por otra parte, entiendo que se dará manejo ético y responsable de la información suministrada,
la cual solo podrá ser revelada en aquellas situaciones que

pudieran representar un riesgo muy
grave para mi integridad, terceras personas o bien porque así fuere ordenado judicialmente. En
el supuesto de que la

autoridad judicial exija la revelación de alguna información, el profesional estará obligado a proporcionar solo aquella
que sea sea relevante para el asunto en

cuestión, manteniendo la confidencialidad de cualquier otra información.
<br>
<br>

Expreso que he leído y comprendido integralmente este documento y, en consecuencia, acepto su contenido y reconozco el
derecho a revocar la participación del

acompañamiento desde el área de desarrollo humano sin ninguna implicación por parte de la Institución.
<br>
<br>

En constancia, se firma a los

{{ Form::number('day', $consent->day, ['class' => 'line-date-day' . ($errors->has('day') ? ' is-invalid' : ''), 'placeholder' => 'Day']) }}
{!! $errors->first('day', '<div class="invalid-feedback">:message</div>') !!}

días del mes de

{{ Form::text('mont', $consent->mont, ['class' => 'line-date-month' . ($errors->has('mont') ? ' is-invalid' : ''), 'placeholder' => 'Mont']) }}
{!! $errors->first('mont', '<div class="invalid-feedback">:message</div>') !!}

del año

{{ Form::number('year', $consent->year, ['class' => 'line-date-year' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
{!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}

, en la ciudad de

{{ Form::text('city', $consent->city, ['class' => 'line-date-city' . ($errors->has('city') ? ' is-invalid' : '')]) }}
{!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}

<br>
