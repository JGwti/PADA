@extends('layouts.app')

@section('template_title')
    {{ $patient->name }} {{__('Show Patient')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header color-card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Show Patient')}}</span>
                        </div>
                    </div>
                    <div class="d-flex aling-items-start">
                        <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="active nav-link btn btn-dark" id="v-pills-customer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customer"
                                type="button" role="tab" aria-controls="v-pills-customer" aria-selected="true">Principal</button>
                            <button class="nav-link btn btn-dark" id="v-pills-device-tab" data-bs-toggle="pill" data-bs-target="#v-pills-device"
                                type="button" role="tab" aria-controls="v-pills-device" aria-selected="false">Personal</button>
                            <button class="nav-link btn btn-dark" id="v-pills-technician-tab" data-bs-toggle="pill" data-bs-target="#v-pills-technician"
                                type="button" role="tab" aria-controls="v-pills-technician" aria-selected="false">Académica</button>
                        </div>
                        <div class="tab-content col-10" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-customer" role="tabpanel"
                                aria-labelledby="v-pills-customer-tab" tabindex="0">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $patient->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Apellido</th>
                                            <td>{{ $patient->last_name }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Tipo de identificación</th>
                                            <td>{{ $patient->documentType->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Número de identificación</th>
                                            <td>{{ $patient->document_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Correo electronico</th>
                                            <td>{{ $patient->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Dirección</th>
                                            <td>{{ $patient->address }} </td>
                                        </tr>
                                        <tr>
                                            <th>Teléfono</th>
                                            <td>{{ $patient->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Edad</th>
                                            <td>{{$patient->age}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="v-pills-device" role="tabpanel" aria-labelledby="v-pills-device-tab"
                                tabindex="0">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Fecha de nacimiento</th>
                                            <td>{{$patient->date_birth}}</td>
                                        </tr>
                                        <tr>
                                            <th>País</th>
                                            <td>{{$patient->country->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Departamento </th>
                                            <td>{{$patient->state->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Ciudad </th>
                                            <td>{{$patient->city->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Género</th>
                                            <td>{{$patient->genderType->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>EPS</th>
                                            <td>{{$patient->ep->name}}</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="v-pills-technician" role="tabpanel" aria-labelledby="v-pills-technician-tab"
                                tabindex="0">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Rol</th>
                                            <td>{{$patient->patientType->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Programa académico</th>
                                            <td>{{$patient->academicProgram->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Semestre</th>
                                            <td>{{$patient->semester->name}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="card-body d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-undo"></i> {{__('Back')}}
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection


