@component('components.main')
    @section('template_title')
        {{ __('Student Referral') }}
    @endsection
    @slot('title')
        <div class="card-header color-card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Student Referral') }}
                </span>

                <div class="float-right">
                    <a href="{{ route('remision_estudiantes.create') }}" class="btn btn-primary btn-sm float-right"
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

                        <th>{{ __('Remission Date') }}</th>
                        <th>{{ __('Remission To') }}</th>

                        <th>{{ __('Patient ') }}</th>

                        <th>{{ __('Status') }}</th>
                        <th>Action</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentReferrals as $studentReferral)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $studentReferral->patient->name . ' ' . $studentReferral->patient->last_name }}</td>

                            <td>{{ $studentReferral->remission_date }}</td>
                            <td>
                                @if ($studentReferral->remission_to == 'academic_accompaniment_program')
                                    Acompañamiento academico
                                @elseif ($studentReferral->remission_to == 'psychology')
                                    Psicologia
                                @else
                                    Psicopedagogia
                                @endif
                            </td>

                            <td>

                                @if ($studentReferral->status_id == 1)
                                    Iniciado proceso
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-label="Example with label" style="width: 25%;" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><br>
                                @elseif ($studentReferral->status_id == 2)
                                    Acepto el programa
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                            style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div><br>
                                @elseif ($studentReferral->status_id == 3)
                                    En progreso
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                            style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div><br>
                                @elseif ($studentReferral->status_id == 4)
                                    Finalizado proceso
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            aria-label="Example with label" style="width: 100%;" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><br>
                                @elseif ($studentReferral->status_id == 5)
                                    Finalizado con novedad
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            aria-label="Example with label" style="width: 100%;" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                @endif


                            </td>

                            <td colspan="2">
                                <form action="{{ route('remision_estudiantes.destroy', $studentReferral->id) }}"
                                    method="POST">

                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('remision_estudiantes.show', $studentReferral->id) }}"><i
                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                    @can('check-admin')
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('remision_estudiantes.edit', $studentReferral->id) }}"><i
                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    @endcan
                                    @csrf
                                    @method('DELETE')
                                    @can('check-admin')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                            {{ __('Delete') }} </button>
                                    @endcan
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('id.forms.referral', $studentReferral->id) }}"><i
                                            class="fa fa-fw fa-edit"></i>{{ __('Forms') }}</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $studentReferrals->links() !!}
        </div>
    </div>
@endcomponent



