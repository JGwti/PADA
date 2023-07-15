{!! Form::model(request()->all, ['route' => 'pacientes.index', 'method'=> 'GET', 'class' => 'row g-3 align-items-center']) !!}

<div class="col-2">
{!!Form::label('patient_data', 'Datos del paciente')!!}
</div>
<div class="col-5">
{!!Form::text('patient_data', null,
        ['placeholder' => 'Ingrese el ID, Nombre o Apellido del paciente',
            'class'=>'form-control mr-sm-4']);
!!}
</div>
<div class="col-3">
    <button type="submit" class="btn btn-primary ">
        <i class="fas fa-search"></i> Filtrar
    </button>

    <a href="{{route('pacientes.index')}}"class="btn btn-primary">
        <i class="fas fa-sync"></i> Limpiar
    </a>
</div>
{!! Form::close() !!}
