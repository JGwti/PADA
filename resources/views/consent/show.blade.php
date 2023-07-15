@extends('layouts.app')

@section('template_title')
    {{ $consent->name }}.{{ __('Show Consent') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Consent') }}</span>
                        </div>
                    </div>
                    @include('consent.form')
                    <div class="box-footer mt20">
                        <a class="btn btn-primary" href="{{ route('index.consent',$id_referral) }}">{{ __('Back') }}</a>
                        <a class="btn btn-primary" href="{{ route('consent.PDF',[$consent,$id_referral]) }}"> generar PDF</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <br>
                </div>
            </div>
        </div>
    </section>
@endsection




