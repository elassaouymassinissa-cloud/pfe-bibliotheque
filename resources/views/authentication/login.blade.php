@extends('layouts.authentication')

@section('content')
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4" style="color: black;">Connectez-vous à votre compte</h5>
        <p class="text-center small">Entrez vos informations personnelles pour créer un compte</p>
        @if (session('error'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
    </div>


    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('post.login') }}">
        @csrf
        <div class="col-12">
            <label for="yourUsername" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" name="email" class="form-control" id="yourUsername" required>
                <div class="invalid-feedback">Veuillez entrer votre email.</div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <label for="yourPassword" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="yourPassword" required>
            <div class="invalid-feedback">Veuillez entrer votre mot de passe !</div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit" style="background: #44b89d !important">Connexion</button>
        </div>
        <div class="col-12">
            <p class="small mb-0">Vous n'avez pas de compte ? <a href="{{ route('authentication.register.form') }}">Créer un
                    compte</a></p>
            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>

        </div>
    </form>
@endsection
