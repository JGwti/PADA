@extends('layouts.app')

@section('template_title')
    {{ __('Update Legal Representative')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header">
                        <span class="card-title">{{ __('Update Legal Representative')}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('legal-representatives.update', $legalRepresentative->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('legal-representative.form')
                            {!! Form::hidden('id', $legalRepresentative->id) !!}
                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                <a class="btn btn-primary" href="{{ route('index.legal-representatives', $id_referral) }}">{{ __('Back') }}</a>

                        </p>
                    </div>
                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
