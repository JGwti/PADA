@component('components.main')
    @section('template_title')
        {{ __('Forms') }}
    @endsection
    @slot('title')
        <div class="card-header color-card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Forms') }}
                </span>

            </div>
        </div>
        @if ($message = Session::get('primary'))
            <div class="alert alert-primary">
                <p>{{ $message }}</p>
            </div>
        @endif
    @endslot
    <br>
    <div class="card-body">
        <div class="table-responsive container justify-content-center col-sm-10">
            <table class="table ">
                <thead class="table-dark">
                    <tr>
                        <th colspan="1">No</th>
                        <th colspan="2">{{ __('Code Form') }}</th>
                        <th class="col-sm-6">{{ __('Name Form') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($id_referral->patient->age >= 18)
                        <tr>
                            {{-- Consentimiento Informado --}}
                            <td colspan="1">{{ 1 }}</td>
                            <td colspan="2">FO-BIE-16 V.2</td>
                            <td class="col-sm-6">
                                <a class="btn btn-outline-dark col-sm-12"
                                    href="{{ route('index.consent', $id_referral->id) }}"><i
                                        class="fa fa-fw fa-trash"></i>CONSENTIMIENTO INFORMADO </a>
                            </td>
                        </tr>
                    @else
                        {{-- Asentimiento Informado Representante Legal --}}
                        <tr>
                            <td colspan="1">{{ 2 }}</td>
                            <td colspan="2">FO-BIE-17 V.2</td>
                            <td class="col-sm-6">
                                <a class="btn btn-outline-dark col-sm-12"
                                    href="{{ route('index.assent', $id_referral->id) }}"><i
                                        class="fa fa-fw fa-trash"></i>ASENTIMIENTO INFORMADO</a>
                            </td>
                        </tr>
                        {{-- Consentimiento Informado Representante Legal --}}
                        <tr>
                            <td colspan="1">{{ 3 }}</td>
                            <td colspan="2">FO-BIE-18 V.2</td>
                            <td class="col-sm-6">
                                <a class="btn btn-outline-dark col-sm-12"
                                    href="{{ route('index.legal-representatives', $id_referral->id) }}"><i
                                        class="fa fa-fw fa-trash"></i>CONSENTIMIENTO INFORMADO (Representante Legal)</a>
                            </td>
                        </tr>
                    @endif
                    {{-- Disentimiento Informado --}}
                    <tr>
                        <td colspan="1">{{ 9 }}</td>
                        <td colspan="2">FO-BIE-25 V.2</td>
                        <td class="col-sm-6">
                            <a class="btn btn-outline-dark col-sm-12"
                                href="{{ route('index.informed-dissents', $id_referral->id) }}"><i
                                    class="fa fa-fw fa-trash"></i>DISENTIMIENTO INFORMADO</a>
                        </td>
                    </tr>
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
