@extends('layouts.app')

@section('template_title')
    {{ $legalRepresentative->name }}.{{ __('Show Legal Representative')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Legal Representative')}}</span>
                        </div>
                    </div>
                    @include('legal-representative.form')
                                <a class="btn btn-primary" href="{{ route('index.legal-representatives', $id_referral) }}">{{ __('Back') }}</a>
                                <a class="btn btn-primary" href="{{ route('legal-representatives.PDF',[$legalRepresentative,$id_referral]) }}"> generar PDF</a>
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
