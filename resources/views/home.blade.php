@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header color-card-header">{{ __('Programa de acompañamiento academico') }}</div>

                <div class="card-body col-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        "El Área de Desarrollo Humano promueve la formación integral de estudiantes, docentes y administrativos mediante la generación de espacios que permiten al individuo estar  en armonía  en las dimensiones académica, social,  familiar y laboral, que contribuyen al bienestar, fortalecimiento del compromiso, nivel de satisfacción  óptimo y desarrollo del sentido de pertenencia de la comunidad universitaria en general" (numeral  3.2.2).
                    </div><br>
                    <div class="content-center col-10">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{ asset('storage/img/img_uno.png') }}" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('storage/img/img_dos.png') }}" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('storage/img/img_tres.png') }}" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('storage/img/img_cuatro.png') }}" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection
