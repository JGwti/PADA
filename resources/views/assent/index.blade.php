@component('components.main')
    @section('template_title')
        {{ __('Assent') }}
    @endsection
    @slot('title')
        <div class="card-header color-card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Assent') }}
                </span>

                <div class="float-right">
                    <a href="{{ route('create.assent', $id_referral->id) }}" class="btn btn-primary btn-sm float-right"
                        data-placement="left">
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
    @endslot
    <br>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>No</th>

                        <th>Nombres</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('City') }}</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assents as $assent)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $assent->name . ' ' . $assent->last_name }}</td>
                            <td>{{ $assent->day . ' / ' . $assent->mont . ' / ' . $assent->year }}</td>
                            <td>{{ $assent->city }}</td>
                            <td>
                                <form action="{{ route('destroy.assent', [$assent->id, $id_referral->id]) }}" method="POST">
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('show.assent', [$assent->id, $id_referral->id]) }}"><i
                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                    @can('check-admin')
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('edit.assent', [$assent->id, $id_referral->id]) }}"><i
                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    @endcan
                                    @csrf
                                    @method('DELETE')
                                    @can('check-admin')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                            {{ __('Delete') }} </button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="{{ route('remision_estudiantes.index') }}"class="btn btn-secondary">
                <i class="fas fa-undo"></i> Regresar
            </a>
        </div>
    </div>
@endcomponent
