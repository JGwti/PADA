@inject('selects', 'App\Services\Selects')


<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col">
                {{ Form::label('name','Nombres') }}
                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('last_name','Apellidos') }}
                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : '')]) }}
                {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('document_type_id','Tipo de documento') }}
                {{ Form::select('document_type_id',$selects->getDocumentType(), $user->document_type_id, ['class' => 'form-control' . ($errors->has('document_type_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('document_type_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('document_number','Numero de documento') }}
                {{ Form::text('document_number', $user->document_number, ['class' => 'form-control' . ($errors->has('document_number') ? ' is-invalid' : '')]) }}
                {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('phone','Telefono') }}
                {{ Form::text('phone', $user->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) }}
                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('user_type_id','Rol') }}
                {{ Form::select('user_type_id', $selects->getUserType(),$user->user_type_id, ['class' => 'form-control' . ($errors->has('user_type_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('user_type_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('avatar_file', 'Avatar') }}
                {{ Form::file('avatar', ['class' => 'form-control' . ($errors->has('avatar') ? ' is-invalid' : '')]) }}
                {!! $errors->first('avatar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('signature_professional', 'Firma del profecional') }}
                {{ Form::file('signature_professional',['class' => 'form-control' . ($errors->has('signature_professional') ? ' is-invalid' : '')]) }}
                {!! $errors->first('signature_professional', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <br>
        <div class="row">
            <div class="form-group col">
                {{ Form::label('email') }}
                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('password','Contraseña') }}
                {{ Form::password('password', ['placeholder'=>'Ingrese una contraseña','class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col">
                {{ Form::label('password_confirmation','Confirmar contraseña') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('Password confirmation') ? ' is-invalid' : '')]) }}
                {!! $errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <br>
    </div>
    <div class="box-footer ">
        <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            <a href="{{ route('usuarios.index') }}"class="btn btn-secondary">
                <i class="fas fa-undo"></i> Regresar
            </a>
        </div>
    </div>
</div>

