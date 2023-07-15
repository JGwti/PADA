@extends('layouts.app')

@section('template_title')
    {{('Update Consent')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header">
                        <span class="card-title">{{ __('Update Consent')}} </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('consents.update', $consent->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('consent.form')

                            {!! Form::hidden('id', $consent->id) !!}
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
