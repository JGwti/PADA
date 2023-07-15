@extends('layouts.app')

@section('template_title')
    Create Legal Representative
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header">
                        <span class="card-title">Create Legal Representative</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('legal-representatives.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('legal-representative.form')

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
