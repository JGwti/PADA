<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Proyecto de trabajo de grado </title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/65b64f93cd.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @vite(['resources/sass/app.scss'])

</head>

<body >
    <header class=" header ">
            <div class="icons-information">
                <i class="fa-brands fa-square-facebook fa-2xl"></i>
                <i class="fa-brands fa-square-twitter fa-2xl"></i>
                <i class="fa-brands fa-square-instagram fa-2xl"></i>
                <i class="fa-brands fa-linkedin fa-2xl"></i>
                <i class="fa-brands fa-square-youtube fa-2xl"></i>
            </div>
            <div class="contact-information">
                <i class="fa-solid fa-square-phone fa-2xl" style="color: #8f7700;"></i><span class=".text-contact">  +57 123456789</span>
                <i class="fa-solid fa-envelope fa-2xl" style="color: #8f7700;"></i><span class=".text-contact">  admin@admin.co   </span>
            </div>
    </header>



    <section class="content-nav">
        <div class="head-nav">
            <ul class="nav">
                <li>
                    <a href="#">La Institución </a>
                </li>
                <li>
                    <a href="#">¡Estudia en La U! </a>
                </li>
                <li>
                    <a href="#">Investigación </a>
                </li>
                <li>
                    <a href="#">Extensión </a>
                </li>
                <li>
                    <a href="#">Recursos </a>

                    <ul>
                        <li>
                            <a href="#">Consulta </a>
                        </li>
                        <li>
                            <a href="#">Campus </a>
                        </li>
                        <li>
                            <a href="#">Correo </a>
                        </li>
                        <li>
                            <a href="#">Mi U </a>
                        </li>
                        <li>
                            <a href="{{route('login')}}"> Programa de acompañamiento academico </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>

    <section class="img-u">
        <div class="backgroundImage" >
            <img class="Image" src="{{ asset('storage/img/backgroundImage.png') }}">
        </div>
    </section>

    <footer class="site-footer">
        <p>Proyecto de trabajo de grado realizado por Javier Esteban Gutierrez Luna</p>
    </footer>

</body>

</html>
