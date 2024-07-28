<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Placeholder for payment integration code (PayPal/Stripe etc.)
    // After successful payment process, display a success message

    // For demonstration purposes, we'll assume the payment is successful
    $payment_successful = true;

    if ($payment_successful) {
        // Display payment success message
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Payment Success</title>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'>
            <style>
                .success-container {
                    margin-top: 50px;
                    text-align: center;
                }
                .success-message {
                    color: green;
                    font-size: 1.5em;
                    margin-bottom: 20px;
                }
                .order-details {
                    margin-top: 30px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='success-container'>
                    <h1 class='success-message'>Payment Successful!</h1>
                    <p>Thank you for your purchase, " . htmlspecialchars($name) . ".</p>
                    <div class='order-details'>
                        <h3>Order Details</h3>
                        <table class='table table-bordered'>
                            <tr>
                                <th>Product Name:</th>
                                <td>" . htmlspecialchars($product_name) . "</td>
                            </tr>
                            <tr>
                                <th>Product Price:</th>
                                <td>Rs. " . htmlspecialchars($product_price) . " /-</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>" . htmlspecialchars($name) . "</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>" . htmlspecialchars($email) . "</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>" . htmlspecialchars($phone) . "</td>
                            </tr>
                        </table>
                    </div>
                    <a href='index.php' class='btn btn-primary'>Return to Home</a>
                </div>
            </div>
        </body>
        </html>
        ";
    } else {
        echo "<p>Payment failed. Please try again.</p>";
    }
}
?>

