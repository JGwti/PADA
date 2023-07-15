@component('components.main')
    @section('template_title')
        {{ __('Update Impact Measurement Instrument') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Update Impact Measurement Instrument') }}</span>
    @endslot
    <br>
    <form method="POST" action="{{ route('impact_measurement.update', $studentReferral->id) }}" role="form"
        enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf

        @include('impact-measurement-instrument.form')
        {!! Form::hidden('id', $impactMeasurementInstrument->id) !!}

        <div class="box-footer ">
            <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                <a href="{{ route('index.impact.measurement', $id_referral) }}"class="btn btn-secondary">
                    <i class="fas fa-undo"></i> {{ __('Back') }}
                </a>
            </div>
        </div>
    </form>
@endcomponent


