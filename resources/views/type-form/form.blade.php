<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name_form') }}
            {{ Form::text('name_form', $typeForm->name_form, ['class' => 'form-control' . ($errors->has('name_form') ? ' is-invalid' : ''), 'placeholder' => 'Name Form']) }}
            {!! $errors->first('name_form', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('code_form') }}
            {{ Form::text('code_form', $typeForm->code_form, ['class' => 'form-control' . ($errors->has('code_form') ? ' is-invalid' : ''), 'placeholder' => 'Code Form']) }}
            {!! $errors->first('code_form', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
    </div>
</div>
