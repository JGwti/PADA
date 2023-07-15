
@component('components.main')
    @section('template_title')
        {{ $assent->name }}.{{ __('Show Assent')}}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Show Assent')}}</span>
    @endslot
    <br>
    @include('assent.form')
    <div class="container row justify-content-center text-center">
        <div class="box-footer mt20">
            <a class="btn btn-primary" href="{{ route('index.assent', $id_referral) }}">{{ __('Back') }}</a>
            <a class="btn btn-primary" href="{{ route('assent.PDF', [$assent, $id_referral]) }}"> generar PDF</a>
        </div>
    </div>
    <br>
@endcomponent

