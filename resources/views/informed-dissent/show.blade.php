@extends('layouts.app')

@section('template_title')
    {{ $informedDissent->name }}.{{ __('Show Informed Dissent')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Informed Dissent')}}</span>
                        </div>
                    </div>
                    <br>
                    @include('informed-dissent.form')
                    <br>
                    <div class="box-footer mt20">
                        <a class="btn btn-primary" href="{{ route('index.informed-dissents',$id_referral) }}">{{ __('Back') }}</a>
                        <a class="btn btn-primary" href="{{ route('informed-dissents.PDF',[$informedDissent,$id_referral]) }}"> generar PDF</a>
                    </div>
                </div>
            </div>
            <br>
                </div>
            </div>
        </div>
    </section>
@endsection
