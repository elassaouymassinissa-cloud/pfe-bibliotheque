@extends('layouts.authentication')

@section('content')
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4" style="color: black;">Créer un compte</h5>
        <p class="text-center small">Entrez vos informations personnelles pour créer un compte</p>
    </div>
    @if (session('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <form class="row g-3 needs-validation" novalidate Method="POST" action="{{ route('authentication.registration') }}">
        @csrf

        <div class="col-12">
            <label for="yourName" class="form-label">Nom d'utilisateur</label>
            <input type="text" name="user_name" class="form-control" id="user_name" required>
            <div class="invalid-feedback">Veuillez saisir un nom d'utilisateur !</div>
        </div>

        <div class="col-12">
            <label for="yourName" class="form-label">Votre prénom</label>
            <input type="text" name="first_name" class="form-control" id="first_name" required>
            <div class="invalid-feedback">Veuillez saisir votre prénom !</div>
        </div>

        <form class="row g-3 needs-validation" novalidate>
            <div class="col-12">
                <label for="yourName" class="form-label">Votre nom de famille</label>
                <input type="text" name="last_name" class="form-control" id="last_name" required>
                <div class="invalid-feedback">Veuillez saisir votre nom de famille !</div>
            </div>

            <div class="col-12">
                <label for="yourEmail" class="form-label">Votre email</label>
                <input type="email" name="email" class="form-control" id="email" required>
                <div class="invalid-feedback">Veuillez saisir une adresse email valide !</div>
            </div>

            <div class="col-12">
                <label for="yourPassword" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <div class="invalid-feedback">Veuillez saisir votre mot de passe !</div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" style="background: #44b89d !important">Créer un
                    compte</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></p>
            </div>
        </form>
    @endsection
