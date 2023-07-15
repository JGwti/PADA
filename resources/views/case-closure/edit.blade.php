@component('components.main')
    @section('template_title')
        {{ __('Update Case Closure') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Update Case Closure') }}</span>
    @endslot
    <br>
    <form method="POST" action="{{ route('case-closures.update', $caseClosure->id) }}" role="form"
        enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf

        @include('case-closure.form')
        <div class="container row justify-content-center text-center">
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                <a class="btn btn-primary" href="{{ route('index.case-closures', $id_referral) }}">{{ __('Back') }}</a>
            </div>
        </div>
        <br>
    </form>
@endcomponent
