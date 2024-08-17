<?php
// Retrieve parameters from the query string
$subsid = isset($_GET['subsid']) ? $_GET['subsid'] : '';
$planname = isset($_GET['planname']) ? $_GET['planname'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

// Validate and sanitize inputs
$price = htmlspecialchars($price);

// Set the amount based on the plan's price
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Checkout</title>
    <style>
        /* Reset some default styles */
        body, h2, p {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #fff;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            color: #0072ff;
            margin-bottom: 20px;
        }
        p {
            color: #333;
            margin-bottom: 30px;
        }
        #paypal-button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pay with PayPal</h2>
    <p>Please complete your payment of $<?php echo htmlspecialchars($price); ?> by clicking the button below:</p>
    <!-- PayPal Button Container -->
    <div id="paypal-button-container"></div>
</div>

<!-- Load the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AXmMSqZfKmeVb2LGo0GW2jPOMz716yRBSY8i_SlIKoV6uWrISBIOv98lEY8v1td2Jh0dIvQSmqgLbIbb&currency=USD&disable-funding=card"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo htmlspecialchars($price); ?>' // The amount to be charged (in USD)
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Optionally, you can handle the transaction details or send them to your server
            });
        },
        onCancel: function (data) {
            // Show a cancel message or redirect to another page
            alert('Transaction was cancelled.');
        },
        onError: function (err) {
            // Show an error message
            console.error('Error during payment process:', err);
            alert('An error occurred during the payment process.');
        }
    }).render('#paypal-button-container');
</script>

</body>
</html>
