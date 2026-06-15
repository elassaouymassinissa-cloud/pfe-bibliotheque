@extends('layouts.main_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-8 col-lg-9 ms-lg-auto">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-white border-0 text-center pt-4">
                        <div class="text-danger mb-5">
                            <i class="fas fa-exclamation-triangle fa-3x"></i>
                        </div>
                        <h1 class="h2 mb-0 text-gray-800 font-weight-bold">Limite d'Emprunt Atteinte</h1>
                    </div>

                    <div class="card-body px-5 py-4 text-center">
                        <p class="lead text-muted mb-4">
                            Vous avez atteint la limite maximale de 3 livres empruntés simultanément.
                            Pour continuer à emprunter, veuillez soit retourner des livres précédents,
                            soit payer des frais d'extension pour mettre à niveau votre compte.
                        </p>

                        <div class="d-grid gap-3 d-md-flex justify-content-center mb-4">
                            <button id="checkout-button" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-credit-card me-2"></i>Payer maintenant
                            </button>
                            {{-- Optional: Enable return button
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg px-5">
                                <i class="fas fa-arrow-left me-2"></i>Retour
                            </a>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stripe & Axios Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const stripe = Stripe(
            'pk_test_51RG7eyBoHRdIW1T3zG4WlsUdy6IdL6zhcPYK3BkpFooNGdmyqNXTSb3gfUCG4k8M1e70S9XdzsIV8mcpxESHtZak00TwnyunIq'
            );

        document.getElementById('checkout-button').addEventListener('click', function() {
            axios.post('/create-checkout-session', {
                    amount: 5,
                    bookId: 123 // Replace this with dynamic bookId if needed
                })
                .then(function(response) {
                    return stripe.redirectToCheckout({
                        sessionId: response.data.id
                    });
                })
                .then(function(result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection
