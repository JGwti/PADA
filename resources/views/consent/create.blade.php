@extends('layouts.app')

@section('template_title')
    {{ __('Create Consent')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header">
                        <span class="card-title">{{ __('Create Consent')}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('consents.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('consent.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                <a class="btn btn-primary" href="{{ route('index.consent',$id_referral) }}">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
