@component('components.main')
    @section('template_title')
        {{ $studentReferral->name }}.{{ __('Show Individual Tracking') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Show Individual Tracking') }}</span>
    @endslot
    <br>
    @include('individual-tracking.form')
    <div class="container row justify-content-center text-center">
        <div class="box-footer mt20">
            <a class="btn btn-primary" href="{{ route('index.individual.trackings',$id_referral) }}">{{ __('Back') }}</a>
            <a class="btn btn-primary" href="{{ route('individual.trackings.PDF',[$individualTracking,$id_referral]) }}"> generar PDF</a>
        </div>
    </div>
    <br>
@endcomponent


