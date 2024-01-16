<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    <link rel="icon" href="https://images.emojiterra.com/twitter/512px/1f4bb.png" type="image/png" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('js/font-awesome.min.js')}}"></script> --}}
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

    <!--
        ======
        SOCIAL
        ======
    -->
    <nav class="navbar navbar-expand container-fluid"  id="social">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item" data-aos="fade-right" data-aos-delay="110" data-aos-duration="1000">
                    <a href="mailto:cristian.guzman.contacto@gmail.com" target="_blank"><i
                            class="fas fa-envelope"></i></a>
                </li>
                <li class="nav-item" data-aos="fade-right" data-aos-delay="100" data-aos-duration="900">
                    <a href="https://github.com/CrisGuzmanS/" target="_blank"><i class="fab fa-github-square"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <!--
        ======
        HEADER
        ======
    -->
    <header class="container-fluid" id="header">
        <div class="container">
            <div class="row">

                <!--
                    ============
                    PRESENTACIÓN
                    ============
                -->

                <div id="presentacion" class="col-12">
                    <p id="nombre" class="text-center greeting" data-aos="fade-right" data-aos-delay="50">
                        <i class="fab fa-angellist" style="color: #f7c588"></i>
                        ¡Hola! soy Cris.</p>
                    <p id="descripcion" data-aos="fade-left" data-aos-delay="90">
                        🌎 Desarrollador Web. |
                        💻 Ingeniero de software.

                    </p>
                </div>
            </div>
        </div>
    </header>

    <!--
        ==================
        MENÚ DE NAVEGACIÓN
        ==================
    -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid" id="menu">
        <div class="container">
            <a class="navbar-brand" href="/"><small class="text-uppercase">Inicio</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" id="menu-boton"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.show') }}"><small class="text-uppercase">Sobre
                                mí</small><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}"><small
                                class="text-uppercase">CONTACTO</small></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!--
        ======
        FOOTER
        ======
    -->

    <footer class="container-fluid" id="footer">
        <div class="container">
            <div class="row" id="footer-social">
                <div class="col-12 col-md-4">
                    <i class="fab fa-whatsapp-square text-success"></i>
                    55 12 32 81 88
                </div>
            </div>
            <div class="row" id="copyright">
                <div class="col-12">
                    <p>Copyright (c) 2018 - 2019 Copyright CrisGuzmanS All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
          offset:400,

      });
    </script>
</body>

</html>