<!-- resources/views/authentification/forgot-password.blade.php -->
<h2>Mot de passe oublié</h2>
@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" required placeholder="Votre email" />
    <button type="submit">Envoyer le lien</button>
</form>
