@extends('layouts.app')

@section('template_title')
    Create User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header color-card-header">
                        <span class="card-title">Create User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('usuarios.store') }}"  role="form" enctype="multipart/form-data" files = true>
                            @csrf
                            @include('user.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
