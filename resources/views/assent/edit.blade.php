@component('components.main')
    @section('template_title')
        {{ __('Update Assent') }}
    @endsection
    @slot('title')
        <span class="card-title">{{ __('Update Assent') }}</span>
    @endslot
    <br>
    <form method="POST" action="{{ route('asentimiento.update', $assent->id) }}" role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf

        @include('assent.form')
        {!! Form::hidden('id', $assent->id) !!}

        <div class="container row justify-content-center text-center">
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                <a class="btn btn-primary" href="{{ route('index.assent', $id_referral) }}">{{ __('Back') }}</a>
            </div>
        </div>
        <br>
    </form>
@endcomponent
