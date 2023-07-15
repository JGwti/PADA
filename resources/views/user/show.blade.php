@extends('layouts.app')

@section('template_title')
    {{ $user->name }}.{{__('Show User')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Show User')}}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-pane fade show active" id="v-pills-customer" role="tabpanel"
                            aria-labelledby="v-pills-customer-tab" tabindex="0">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th><strong>Avatar:</strong></th>
                                        <td><img src="{{asset('storage/avatars/'.$user->avatar)}}" class="img-thumbnail" width="50" height="50" alt="Avatar"></td>
                                    </tr>
                                    <tr>
                                        <th><strong>{{ __('Name:') }}</strong></th>
                                        <td>{{ $user->name.' '.$user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th><strong>{{ __('Document Type:') }}</strong></th>
                                        <td>{{ $user->documentType->name }}</td>
                                    </tr>
                                    <tr>
                                        <th><strong>{{ __('Document Number:') }}</strong></th>
                                        <td>{{ $user->document_number }}</td>
                                    </tr>
                                    <tr>
                                        <th><strong>{{ __('Phone:') }}</strong></th>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th><strong>{{ __('User Type:') }}</strong></th>
                                        <td>{{$user->usersType->name}}</td>
                                    </tr>
                                    <tr>
                                        <th><strong>Email:</strong></th>
                                        <td>{{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th><strong>{{ __('Signature Professional:') }}</strong></th>
                                        <td><img src="{{asset('storage/signatures/'.$user->signature_professional)}}" class="img-thumbnail" width="50" height="50" alt="Avatar"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
