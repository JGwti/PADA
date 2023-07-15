@extends('layouts.app')

@section('template_title')
    {{ __('Create Patient')}}
@endsection

@section('content')
    <section class="content container-fluid ">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header mb-6 ">
                        <span class="card-title">{{ __('Create Patient')}}</span>
                    </div>
                    <div class="card-header">
                        <form method="POST" action="{{ route('pacientes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('patient.form')
                            <div class="box-footer ">
                                <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
                                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                    <a href="{{ route('pacientes.index') }}"class="btn btn-secondary">
                                        <i class="fas fa-undo"></i> {{__('Back')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

