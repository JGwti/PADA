@extends('layouts.app')

@section('template_title')
    Type Form
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Type Form') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('type-forms.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Name Form</th>
										<th>Code Form</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typeForms as $typeForm)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $typeForm->name_form }}</td>
											<td>{{ $typeForm->code_form }}</td>

                                            <td>
                                                <form action="{{ route('type-forms.destroy',$typeForm->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('type-forms.show',$typeForm->id) }}"><i class="fa fa-fw fa-eye"></i> {{__('Show')}}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('type-forms.edit',$typeForm->id) }}"><i class="fa fa-fw fa-edit"></i> {{__('Edit')}}</a>
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
                {!! $typeForms->links() !!}
            </div>
        </div>
    </div>
@endsection
