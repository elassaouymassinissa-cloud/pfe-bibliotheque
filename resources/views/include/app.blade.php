<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Bibliothèque en ligne</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user_panel/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('user_panel/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('user_panel/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('user_panel/css/responsive.css') }}" rel="stylesheet" />
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <header class="header_section shadow-sm py-3 fixed-top bg-success">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <span class="logo-icon mr-2">
                        <i class="fa fa-book-open text-primary"></i>
                    </span>
                    <span class="logo-text font-weight-bold text-dark"
                        style="font-family: 'Mulish', sans-serif; font-size: 1.6rem;">
                        Bibliothèque en ligne
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Basculer la navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto align-items-lg-center">
                        <li class="nav-item mx-2">
                            <a class="nav-link px-3 py-2 rounded d-flex flex-column align-items-center {{ Request::routeIs('home') ? 'active bg-primary text-white' : 'text-dark' }}"
                                href="{{ route('home') }}">
                                <i class="fas fa-home fa-lg mb-1"></i>
                                <span>Accueil</span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link px-3 py-2 rounded d-flex flex-column align-items-center {{ Request::routeIs('about') ? 'active bg-primary text-white' : 'text-dark' }}"
                                href="{{ route('about') }}">
                                <i class="fas fa-info-circle fa-lg mb-1"></i>
                                <span>À propos</span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link px-3 py-2 rounded d-flex flex-column align-items-center {{ Request::routeIs('contact') ? 'active bg-primary text-white' : 'text-dark' }}"
                                href="{{ route('contact') }}">
                                <i class="fas fa-envelope fa-lg mb-1"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link px-3 py-2 rounded d-flex flex-column align-items-center {{ Request::routeIs('login') ? 'active bg-primary text-white' : 'text-dark' }}"
                                href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt fa-lg mb-1"></i>
                                <span>Connexion</span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-primary px-4 py-2 rounded-pill shadow-sm d-flex flex-column align-items-center"
                                href="{{ route('authentication.register.form') }}">
                                <i class="fas fa-user-plus fa-lg mb-1"></i>
                                <span>enregistrer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <br>
    <br>

    @yield('content')


    <!-- Section Pied de page -->
    <footer class="info_section bg-dark text-light pt-5">
        <div class="container" >
            <div class="row">
                <!-- Colonne À propos -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="info_detail">
                        <h4 class="text-primary mb-3">
                            <i class="fas fa-book-open mr-2"></i>À propos de nous
                        </h4>
                        <p class="text-light opacity-75">
                            Notre système est conçu pour faciliter l'accès à une vaste collection de titres couvrant
                            différents genres, répondant à une grande diversité de goûts et d'intérêts.
                        </p>
                    </div>
                </div>

                <!-- Colonne Contact -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="info_contact">
                        <h4 class="text-primary mb-3">
                            <i class="fas fa-map-marker-alt mr-2"></i>Adresse
                        </h4>
                        <div class="contact_link_box">
                            <a href="#" class="d-flex align-items-center mb-3 text-light">
                                <i class="fas fa-globe fa-lg mr-3"></i>
                                <span>Maroc</span>
                            </a>
                            <a href="tel:03043353402" class="d-flex align-items-center mb-3 text-light">
                                <i class="fas fa-phone fa-lg mr-3"></i>
                                <span>0696533059</span>
                            </a>
                            <a href="mailto:Rachidel@gmail.com" class="d-flex align-items-center text-light">
                                <i class="fas fa-envelope fa-lg mr-3"></i>
                                <span>RachidELMYLY@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
                   <!-- Colonne Newsletter -->


            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('user_panel/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('user_panel/js/bootstrap.js') }}"></script>
    <script src="{{ asset('user_panel/js/custom.js') }}"></script>
</body>

</html>
