@extends('layouts.app')

@section('template_title')
    {{ $typeForm->name ?? 'Show Type Form' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Type Form</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-forms.index') }}">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name Form:</strong>
                            {{ $typeForm->name_form }}
                        </div>
                        <div class="form-group">
                            <strong>Code Form:</strong>
                            {{ $typeForm->code_form }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
