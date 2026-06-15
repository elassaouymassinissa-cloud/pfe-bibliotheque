@extends('include.app')

@section('content')
    <!-- section à propos -->

    <section class="about_section layout_padding">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('user_panel/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                À propos de notre bibliothèque en ligne
                            </h2>
                        </div>
                        <p>
                            Notre système de gestion de bibliothèque en ligne est bien plus qu’une simple plateforme ; c’est
                            une passerelle vers un monde de connaissances et d’exploration littéraire. Nous nous engageons à
                            révolutionner la manière dont les lecteurs découvrent et interagissent avec les livres.
                            Notre système est conçu pour faciliter l’accès à une vaste collection de titres, couvrant
                            différents genres et répondant à des goûts et intérêts variés.
                            Grâce à des fonctionnalités intuitives et une navigation conviviale, nous visons à offrir une
                            expérience fluide aux utilisateurs, leur permettant de plonger dans des histoires captivantes et
                            d’enrichir leur parcours de lecture.
                            Rejoignez-nous pour vivre la magie de la littérature et bâtir ensemble une communauté
                            florissante de lecteurs passionnés.
                        </p>
                        <a href="">
                            Lire la suite
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
