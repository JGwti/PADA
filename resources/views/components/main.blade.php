@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card color-card-header">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            {{ $title }}
                        </div>
                        <div class="card -body">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
