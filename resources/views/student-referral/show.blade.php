@component('components.main')
    @section('template_title')
        {{ $studentReferral->name }}.{{ __('Show Student Referral') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Show Student Referral') }}</span>
    @endslot
    <br>
    @include('student-referral.form')
    <div class="container row justify-content-center text-center">
        <div class="box-footer mt20">
            <a href="{{ route('remision_estudiantes.index') }}"class="btn btn-secondary"><i class="fas fa-undo"></i> Regresar</a>
            <a class="btn btn-primary" href="{{ route('referral.PDF',[$studentReferral]) }}"> generar PDF</a>
        </div>
    </div>
    <br>
@endcomponent
