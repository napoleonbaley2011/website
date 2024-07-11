<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ing. Juan Daniel Rafael Torrez">
    <title>Mariela Baldivieso</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('metas')

    <!-- Theme styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link href="{{ asset('assets/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/layerslider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/01-homepage/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/01-homepage/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plyr.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />


    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    @yield('css')
</head>

<body>
    <header>
        <div class="top-menu">
            <ul class="left-area welcome-area">
                <li class="hello-blog">
                    <img src="{{ asset('assets/images/logos/Logo_CC.webp') }}" alt="Logo cc" style="width: 70px;">
                </li>
                <li class="hello-blog">
                    Hola! Bienvenid@ a mi página web
                </li>
            </ul>
            <div class="right-area">
                <div class="src-area">
                    <form action="{{ route('public.search') }}" method="POST">
                        @csrf
                        <input class="src-input" type="text" placeholder="Buscar..." name="search" required>
                        <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <ul class="social-icons">
                    <li>
                        <a href="https://www.facebook.com/MarielaBaldiviesoDiputadaNacional" target="_blank"
                            class="color-facebook">
                            <ion-icon name="logo-facebook" size="social-icons"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@marielabaldivieso" target="_blank" class="color-tiktok">
                            <ion-icon name="logo-tiktok" size="social-icons"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/diputadamarielabaldivieso/" target="_blank"
                            class="color-instagram">
                            <ion-icon name="logo-instagram" size="social-icons"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/baldmariela?s=08" target="_blank" class="color-twitter">
                            <ion-icon name="logo-twitter" size="social-icons"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@marielabaldivieso" target="_blank" class="color-youtube">
                            <ion-icon name="logo-youtube" size="social-icons"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.threads.net/@diputadamarielabaldivieso" target="_blank"
                            class="color-youtube">
                            <object data="{{ asset('assets/images/logos/threads-app-icon.svg') }}" width="25"
                                height="25"> </object>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="middle-menu center-text">
            <a href="/" class="logo">
                <img src="{{ asset('assets/images/logos/logo-nuevo.webp') }}" alt="Logo"
                    style="transform: rotate(5deg);">
            </a>
        </div>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon" style="zoom: 2"></i></div>
        <ul class="main-menu visible-on-click" id="main-menu">
            @guest
                <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                    <a href="{{ route('public.index') }}" onclick="toHref('{{ route('public.index') }}')">
                        INICIO</a>
                </li>
                <li class="{{ Request::path() == 'noticias/nacional' ? 'drop-down active' : 'drop-down' }}">
                    <a href="#!" style="color: #fcff3b; font-weight: 400">
                        <i class="fa fa-star"></i> &nbsp; ACTIVIDAD POLÍTICA<i class="ion-ios-arrow-down"></i>
                    </a>
                    <ul class="drop-down-menu">
                        <li>
                            <a href="{{ route('public.noticias', 'nacional') }}"
                                onclick="toHref('{{ route('public.noticias', 'nacional') }}')">
                                <img src="https://flagsapi.com/BO/flat/24.png" style="width: 20px;"> &nbsp;
                                NACIONAL
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('public.noticias', 'regional') }}"
                                onclick="toHref('{{ route('public.noticias', 'regional') }}')">
                                <img src="https://flagsapi.com/MC/flat/24.png" style="width: 20px;"> &nbsp;
                                REGIONAL
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('public.noticias', 'c41') }}"
                                onclick="toHref('{{ route('public.noticias', 'c41') }}')">
                                <img src="https://flagsapi.com/MC/flat/24.png" style="width: 20px;"> &nbsp;
                                CIRCUNSCRIPCION 41
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::path() == 'proyectos' ? 'active' : '' }}">
                    <a href="{{ route('proyectos.index') }}" onclick="toHref('{{ route('proyectos.index') }}')">
                        PROYECTOS DE LEY</a>
                </li>
                <li class="{{ Request::path() == 'perfil' ? 'active' : '' }}">
                    <a href="{{ route('public.perfil') }}" onclick="toHref('{{ route('public.perfil') }}')">
                        SOBRE MÍ</a>
                </li>
            @else
                <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                    <a href=" {{ route('home') }} " class="text-center" onclick="toHref('{{ route('home') }}')">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="{{ Request::path() == 'user' ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" onclick="toHref('{{ route('user.index') }}')">ADMIN</a>
                </li>
                <li class="{{ Request::path() == 'noticias' ? 'active' : '' }}">
                    <a href=" {{ route('noticias.index') }}"
                        onclick="toHref('{{ route('noticias.index') }}')">NOTICIAS</a>
                </li>
                <li class="{{ Request::path() == 'barrios' ? 'active' : '' }}">
                    <a href=" {{ route('barrios.index') }} " onclick="toHref('{{ route('barrios.index') }}')">C-41</a>
                </li>
                <li class="{{ Request::path() == 'propuestas' ? 'active' : '' }}">
                    <a href=" {{ route('propuestas.index') }} "
                        onclick="toHref('{{ route('propuestas.index') }}')">PROPUESTAS</a>
                </li>
                <li class="{{ Request::path() == 'portadas' ? 'active' : '' }}">
                    <a href=" {{ route('portadas.index') }} "
                        onclick="toHref('{{ route('portadas.index') }}')">PORTADAS</a>
                </li>
                <li class="{{ Request::path() == 'categorias' ? 'active' : '' }}">
                    <a href=" {{ route('categorias.index') }} "
                        onclick="toHref('{{ route('categorias.index') }}')">CATEGORIAS</a>
                </li>
                <li class="text-center">
                    <form action=" {{ route('logout') }} " method="POST">
                        @csrf
                        <button class="btn btn-logout btn-block">CERRAR SESIÓN
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </li>
            @endguest

        </ul>

    </header>


    @yield('content')

    <br>
    <br>
    @guest
        <div class="icon-bar">
            <a href="https://www.facebook.com/MarielaBaldiviesoDiputadaNacional" target="_blank" class="facebook">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="https://www.tiktok.com/@marielabaldivieso" target="_blank" class="tiktok">
                <ion-icon name="logo-tiktok"></ion-icon>
            </a>
            <a href="https://www.instagram.com/diputadamarielabaldivieso/" target="_blank" class="instagram">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="https://twitter.com/baldmariela?s=08" target="_blank" class="twitter">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="https://www.youtube.com/@marielabaldivieso" target="_blank" class="youtube">
                <ion-icon name="logo-youtube"></ion-icon>
            </a>
            <a href="https://www.threads.net/@diputadamarielabaldivieso" target="_blank" class="bg-white">
                <object data="{{ asset('assets/images/logos/threads-app-icon.svg') }}" width="25" height="25">
                </object>
            </a>
        </div>
    @endguest
    <footer class="footer d-none d-sm-block">

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer-section">
                        <p class="copyright">Mariela Baldivieso &copy; 2023. Todos los derechos reservados.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="footer-section">
                        <ul class="social-icons">
                            <li>
                                <a href="https://www.facebook.com/MarielaBaldiviesoDiputadaNacional" target="_blank"
                                    class="color-facebook">
                                    <ion-icon name="logo-facebook" size="social-icons"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@marielabaldivieso" target="_blank"
                                    class="color-tiktok">
                                    <ion-icon name="logo-tiktok" size="social-icons"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/diputadamarielabaldivieso/" target="_blank"
                                    class="color-instagram">
                                    <ion-icon name="logo-instagram" size="social-icons"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/baldmariela?s=08" target="_blank" class="color-twitter">
                                    <ion-icon name="logo-twitter" size="social-icons"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@marielabaldivieso" target="_blank"
                                    class="color-youtube">
                                    <ion-icon name="logo-youtube" size="social-icons"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.threads.net/@diputadamarielabaldivieso" target="_blank"
                                    class="color-youtube">
                                    <object data="{{ asset('assets/images/logos/threads-app-icon.svg') }}"
                                        width="15" height="15">
                                    </object>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src=" {{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/layerslider.js') }}"></script>
    <script src="{{ asset('assets/js/embed.videos.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/plyr.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    @yield('js')

    <script>
        function toHref(url) {
            window.location.href = url
        }

        $(document).ready(function() {

            Fancybox.bind("[data-fancybox]", {});

            const player = Plyr.setup('.plyr__video-embed');


            $('#example').DataTable({
                "orderable": false,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando del _START_ al _END_ de  _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "»",
                        "sPrevious": "«"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
</body>

</html>
