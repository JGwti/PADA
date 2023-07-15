@component('components.main')
    @section('template_title')
        {{ $studentReferral->name }}.{{ __('Show Initial Psychological Assessment') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Show Initial Psychological Assessment') }}</span>
    @endslot
    <br>
    @include('initial-psychological-assessment.form')
    <div class="container row justify-content-center text-center">
        <div class="box-footer mt20">
            <a class="btn btn-primary" href="{{ route('index.initial.psychological',$id_referral) }}">{{ __('Back') }}</a>
            <a class="btn btn-primary" href="{{ route('initial.psychological.PDF',[$initialPsychologicalAssessment,$id_referral]) }}"> generar PDF</a>
        </div>
    </div>
    <br>
@endcomponent

