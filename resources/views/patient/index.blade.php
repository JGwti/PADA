@extends('layouts.app')

@section('template_title')
    Patient principal
@endsection
<div class="container row justify-content-center">
    <div class="col-10">

    </div>
</div>
@section('content')
    <div class="container-fluid">
        <div class="container justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header color-card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Patient') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body ">
                        @include('patient.componets.filter_patient')
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead table-success p-6 table-dark">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombres</th>
                                        <th>{{ __('Last Name') }}</th>
                                        <th>{{ __('Document Number') }}</th>
                                        <th>{{ __('Phone') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Actions') }}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $patient->name }}</td>
                                            <td>{{ $patient->last_name }}</td>
                                            <td>{{ $patient->document_number }}</td>
                                            <td>{{ $patient->phone }}</td>
                                            <td>{{ $patient->email }}</td>
                                            <td>
                                                <form action="{{ route('pacientes.destroy',$patient->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pacientes.show',$patient->id) }}"><i class="fa fa-fw fa-eye"></i> {{__('Show')}}</a></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pacientes.edit',$patient->id) }}"><i class="fa fa-fw fa-edit"></i> {{__('Edit')}}</a></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('check-admin')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }} </button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $patients->links() !!}
            </div>
        </div>
    </div>


@endsection
