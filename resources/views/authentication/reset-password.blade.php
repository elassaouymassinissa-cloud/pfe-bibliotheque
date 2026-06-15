<!-- resources/views/authentification/reset-password.blade.php -->
<h2>Réinitialiser le mot de passe</h2>
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <input type="email" name="email" required placeholder="Email" value="{{ old('email', $request->email) }}">
    <input type="password" name="password" required placeholder="Nouveau mot de passe">
    <input type="password" name="password_confirmation" required placeholder="Confirmer mot de passe">

    <button type="submit">Réinitialiser</button>
</form>
