@component('components.main')
@section('template_title')
{{ $caseClosure->name }}.{{ __('Show Case Closure')}}
@endsection
    @slot('title')
    <span class="card-title">{{ __('Show Case Closure')}}</span>

    @endslot
    <br>

    @include('case-closure.form')

        <div class="container row justify-content-center text-center">
            <div class="box-footer mt20">
                <a class="btn btn-primary" href="{{ route('index.case-closures',$id_referral) }}">{{ __('Back') }}</a>
                <a class="btn btn-primary" href="{{ route('case-closures.PDF',[$caseClosure,$id_referral]) }}"> generar PDF</a>
            </div>
        </div>
        <br>

@endcomponent

@section('template_title')
    {{ $caseClosure->name }}.{{ __('Show Case Closure')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                        </div>
                    </div>
                    <br>
                    @include('case-closure.form')
                    <br>
                        <div class="box-footer mt20">
                            <a class="btn btn-primary" href="{{ route('index.case-closures',$id_referral) }}">{{ __('Back') }}</a>
                            <a class="btn btn-primary" href="{{ route('case-closures.PDF',[$caseClosure,$id_referral]) }}"> generar PDF</a>
                        </div>
                    </div>
                </div>
                <br>
                </div>
            </div>
        </div>
    </section>
@endsection
