@component('components.main')
    @section('template_title')
    {{ __('Create Student Referral')}}
    @endsection
    @slot('title')
    <span class="card-title">{{ __('Create Student Referral')}}</span>
    @endslot
    <br>
    <form method="POST" action="{{ route('remision_estudiantes.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('student-referral.form')

        <div class="box-footer ">
            <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                <a href="{{ route('remision_estudiantes.index') }}"class="btn btn-secondary">
                    <i class="fas fa-undo"></i> {{__('Back')}}
                </a>
            </div>
        </div>

    </form>
@endcomponent


