@extends('layouts.app')

@section('template_title')
    {{ $memorandumOfAssociation->name }}.{{ __('Show Memorandum Of Association')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Memorandum Of Association')}}</span>
                        </div>
                    </div>
                    @include('memorandum-of-association.form')
                    <div class="box-footer mt20">
                        <a class="btn btn-primary" href="{{ route('index.memorandum-of-associations',$id_referral) }}">{{ __('Back') }}</a>
                        <a class="btn btn-primary" href="{{ route('memorandum-of-associations.PDF',[$memorandumOfAssociation,$id_referral]) }}"> generar PDF</a>
                    </div>
                </p>
            </div>
        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
