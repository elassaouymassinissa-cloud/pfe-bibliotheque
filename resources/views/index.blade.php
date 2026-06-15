@extends('include.app')

@section('content')
    <!-- fin de la section en-tête -->
    <!-- section du carrousel -->
    <section class="slider_section">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h5>
                                        Bibliothèque en ligne
                                    </h5>
                                    <h1>
                                        Pour tous vos <br>
                                        besoins de lecture
                                    </h1>
                                    <p>
                                        Les bibliothèques sont des trésors de connaissances, offrant une vaste gamme de
                                        livres
                                        pour tous les goûts et centres d’intérêt. Que vous soyez attiré par la littérature
                                        classique,
                                        les derniers best-sellers, les ouvrages informatifs ou les genres spécialisés, les
                                        bibliothèques
                                        offrent une expérience enrichissante à tous les lecteurs.
                                    </p>
                                    <a href="">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('user_panel/images/slider-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Répétition des éléments du carrousel -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h5>
                                        Bibliothèque en ligne
                                    </h5>
                                    <h1>
                                        Pour tous vos <br>
                                        besoins de lecture
                                    </h1>
                                    <p>
                                        Les bibliothèques sont des trésors de connaissances, offrant une vaste gamme de
                                        livres
                                        pour tous les goûts et centres d’intérêt. Que vous soyez attiré par la littérature
                                        classique,
                                        les derniers best-sellers, les ouvrages informatifs ou les genres spécialisés, les
                                        bibliothèques
                                        offrent une expérience enrichissante à tous les lecteurs.
                                    </p>
                                    <a href="">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('user_panel/images/slider-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h5>
                                        Bibliothèque en ligne
                                    </h5>
                                    <h1>
                                        Pour tous vos <br>
                                        besoins de lecture
                                    </h1>
                                    <p>
                                        Les bibliothèques sont des trésors de connaissances, offrant une vaste gamme de
                                        livres
                                        pour tous les goûts et centres d’intérêt. Que vous soyez attiré par la littérature
                                        classique,
                                        les derniers best-sellers, les ouvrages informatifs ou les genres spécialisés, les
                                        bibliothèques
                                        offrent une expérience enrichissante à tous les lecteurs.
                                    </p>
                                    <a href="">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('user_panel/images/slider-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn_box">
                <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </section>
    <!-- fin de la section carrousel -->

    <!-- section des catégories -->

    <section class="catagory_section layout_padding">
        <div class="catagory_container">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Catégories de livres
                    </h2>
                    <p>
                        De nombreux livres sont disponibles dans notre bibliothèque.
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user_panel/images/cat1.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Manuels scolaires
                                </h5>
                                <p>
                                    Ce manuel vise à vous fournir une compréhension approfondie des fondamentaux de
                                    l'informatique.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user_panel/images/cat2.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Science
                                </h5>
                                <p>
                                    Bienvenue dans le monde fascinant de la science, où la curiosité mène à la découverte
                                    et à la compréhension des mystères de notre univers dans un voyage passionnant.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user_panel/images/cat3.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Histoire
                                </h5>
                                <p>
                                    Partez à la découverte du berceau des civilisations, explorez l’héritage riche de la
                                    Mésopotamie, de l’Égypte, de la Grèce et de Rome, fondations du progrès humain.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user_panel/images/cat4.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Biographie
                                </h5>
                                <p>
                                    Partez à la découverte du monde microscopique, explorez l’incroyable complexité des
                                    cellules,
                                    unités fondamentales de la vie.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user_panel/images/cat5.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Aventure
                                </h5>
                                <p>
                                    Partez en expédition vers des terres inconnues, à la découverte de trésors cachés, de
                                    ruines
                                    anciennes et de civilisations mystérieuses disparues avec le temps.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user_panel/images/cat6.png') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Programmation
                                </h5>
                                <p>
                                    Commencez votre aventure de codage en découvrant les concepts fondamentaux, la syntaxe
                                    et la logique
                                    qui forment la base des langages de programmation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- fin de la section des catégories -->

    <!-- section à propos -->
    <section class="py-5">
        <style>
            .book-img {
                width: 100%;
                /* full width of the card */
                height: 250px;
                /* fixed height */
                object-fit: cover;
                /* crop and keep aspect ratio */
            }
        </style>

        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="mb-4 text-center">Tous les livres</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($books as $book)
                    <div class="col mb-5">
                        <div class="card h-100">

                            {{-- Book image --}}
                            <img src="{{ $book->book_picture_url ?? asset('default-book.png') }}"
                                class="card-img-top book-img" alt="{{ $book->title }}">

                            {{-- Book details --}}
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $book->title }}</h5>
                                    <p>Auteur: {{ $book->auther }}</p>
                                    <p>Année: {{ \Carbon\Carbon::parse($book->publish_year)->year }}</p>
                                    <p>Disponible: {{ $book->available_books }}</p>

                                    {{-- Optional rating placeholder --}}
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < 5; $i++)
                                            <div class="bi-star"></div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a href="{{ route('login') }}" class="btn btn-outline-dark mt-auto ">emprunter</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

        
            </div>
        </div>
    </section>
    
@endsection
