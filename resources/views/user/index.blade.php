@extends('layouts.app')

@section('template_title')
    {{__('User')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        <h1>falta filtro</h1>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead table-dark">
                                    <tr>
                                        <th>No</th>

                                        <th>Avatar</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Rol </th>
										<th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr id="target{{ $user->id }}">
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                <img src="{{asset('storage/avatars/'.$user->avatar)}}" class="img-thumbnail" width="50" height="50" alt="Avatar">
                                            </td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->last_name }}</td>
											<td>{{ $user->usersType->name }}</td>

                                            <td>
                                                <form action="{{ route('usuarios.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{__('Show')}}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{__('Edit')}}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('check-admin')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }} </button>
                                                    @endcan
                                                </form>
                                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{__('Show')}}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{__('Edit')}}</a>
                                                    <a href="{{ route('usuarios.destroy', [$user]) }}" class="btn btn-outline-secondary"
                                v-on:click="getRoute" data-id={{ $user->id }} data-bs-toggle="modal"
                                data-bs-target="#deleteModal"><i class="fas fa-trash"></i> Eliminar</a>
--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.partials.modal   ')
@endsection
