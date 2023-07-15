@component('components.main')
    @section('template_title')
    {{ __('Create Initial Psychological Assessment')}}
    @endsection
    @slot('title')
    <span class="card-title">{{ __('Create Initial Psychological Assessment')}}</span>
    @endslot
    <br>
    <form method="POST" action="{{ route('initial-psychological-assessmen.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('initial-psychological-assessment.form')

        <div class="box-footer ">
            <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                <a href="{{ route('index.initial.psychological',$id_referral) }}"class="btn btn-secondary">
                    <i class="fas fa-undo"></i> {{__('Back')}}
                </a>
            </div>
        </div>
    </form>
@endcomponent
