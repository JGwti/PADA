@component('components.main')
    @section('template_title')
        {{ __('Impact Measurement Instrument') }}
    @endsection
    @slot('title')
        <div class="card-header color-card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Impact Measurement Instrument') }}
                </span>

                <div class="float-right">
                    <a href="{{ route('create.impact.measurement', $id_referral->id) }}"
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
                        <th> Fecha de creacion</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($impactMeasurementInstruments as $impactMeasurementInstrument)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>aca va algo</td>
                            <td>
                                <form
                                        action="{{ route('destroy.impact.measurement', [$impactMeasurementInstrument->id, $id_referral->id]) }}"
                                        method="POST">
                                        <a class="btn btn-sm btn-primary "
                                            href="{{ route('show.impact.measurement', [$impactMeasurementInstrument->id, $id_referral->id]) }}"><i
                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('edit.impact.measurement', [$impactMeasurementInstrument->id, $id_referral->id]) }}"><i
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

