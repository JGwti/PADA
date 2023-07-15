@component('components.main')
    @section('template_title')
        {{ $impactMeasurementInstrument->name }}.{{ __('Show Impact Measurement Instrument') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Show Impact Measurement Instrument') }}</span>
    @endslot
    <br>
    @include('impact-measurement-instrument.form')
    <div class="container row justify-content-center text-center">
        <div class="box-footer mt20">
            <a class="btn btn-primary" href="{{ route('index.impact.measurement',$id_referral) }}">{{ __('Back') }}</a>
            <a class="btn btn-primary" href="{{ route('impact.measurement.PDF',[$impactMeasurementInstrument,$id_referral]) }}"> generar PDF</a>
        </div>
    </div>
    <br>
@endcomponent


