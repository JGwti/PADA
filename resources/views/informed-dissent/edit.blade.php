@extends('layouts.app')

@section('template_title')
    {{ __('Update Informed Dissent')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header">
                        <span class="card-title">{{ __('Update Informed Dissent')}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('informed-dissents.update', $informedDissent->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            {!! Form::hidden('id', $informedDissent->id) !!}
                            @include('informed-dissent.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                <a class="btn btn-primary" href="{{ route('index.informed-dissents',$id_referral) }}">{{ __('Back') }}</a>
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
