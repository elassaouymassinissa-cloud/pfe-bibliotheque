
@extends('layouts.main_layout')

@section('content')
<main id="main" class="main">
<div class="container mt-5">
    <h3>Générer le rapport utilisateur</h3>
    {{-- ✅ Affichage du message d'erreur --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <form method="POST" action="{{ route('report.generate') }}">
        @csrf
        <div class="form-group">
            <label>Nom d'utilisateur :</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2"> Générer PDF</button>
    </form>
</div>
</main>
@endsection
