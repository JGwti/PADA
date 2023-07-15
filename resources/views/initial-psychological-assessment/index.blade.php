@component('components.main')
    @section('template_title')
        {{ __('Initial Psychological Assessment') }}
    @endsection
    @slot('title')
        <div class="card-header color-card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Initial Psychological Assessment') }}
                </span>

                <div class="float-right">
                    <a href="{{ route('create.initial.psychological', $id_referral->id) }}"
                        class="btn btn-primary btn-sm float-right" data-placement="left">
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
                        <th>{{ __('') }}</th>
                        <th>{{ __('Creation Date') }}</th>
                        <th>{{ __('') }}</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($initialPsychologicalAssessments as $initialPsychologicalAssessment)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $initialPsychologicalAssessment->name . ' ' . $initialPsychologicalAssessment->last_name }}
                            </td>
                            <td>{{ $initialPsychologicalAssessment->creation_date }}
                            </td>

                            <td>
                                <form
                                    action="{{ route('destroy.initial.psychological', [$initialPsychologicalAssessment->id, $id_referral->id]) }}"
                                    method="POST">
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('show.initial.psychological', [$initialPsychologicalAssessment->id, $id_referral->id]) }}"><i
                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('edit.initial.psychological', [$initialPsychologicalAssessment->id, $id_referral->id]) }}"><i
                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    @can('check-admin')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }} </button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endcomponent
