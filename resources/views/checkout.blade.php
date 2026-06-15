<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
</head>

<body>
    <button id="checkout-button">Pay Now</button>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var stripe = Stripe(
            'pk_test_51RG7eyBoHRdIW1T3zG4WlsUdy6IdL6zhcPYK3BkpFooNGdmyqNXTSb3gfUCG4k8M1e70S9XdzsIV8mcpxESHtZak00TwnyunIq'
            );

        document.getElementById('checkout-button').addEventListener('click', function() {
            axios.post('/create-checkout-session')
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
</body>

</html>
