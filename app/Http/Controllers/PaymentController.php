<?php


namespace App\Http\Controllers;

use Checkout\CheckoutApi;
use Checkout\Models\Payments\Payment;
use Checkout\Models\Payments\TokenSource;


class PaymentController extends Controller
{
    private $kay;

    public function __construct()
    {
        // Set the secret key
        $secretKey = 'sk_test_key';
        $this->kay = new CheckoutApi('');
        // Initialize the Checkout API in Sandbox mode. Use new CheckoutApi($liveSecretKey, false); for production
        $checkout = new CheckoutApi($secretKey);


        // Create a payment method instance with card details
        $method = new TokenSource('tok_key_goes_here');

        // Prepare the payment parameters
        $payment = new Payment($method, 'GBP');
        $payment->amount = 1000; // = 10.00

        // Send the request and retrieve the response
        $response = $checkout->payments()->request($payment);
    }
    public function makePayment(Request $request)
    {
        $rec = $request->toArray();
        return $this->successResponse('Post deleted successfully',$rec);
    }
}
