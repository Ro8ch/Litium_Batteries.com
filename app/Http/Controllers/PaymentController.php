<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Billow\Contracts\PaymentProcessor;

Class PaymentController extends Controller
{

    public function itn(Request $request, PaymentProcessor $payfast)
    {
        // Retrieve the Order from persistance. Eloquent Example.
        $order = Order::where('m_payment_id', $request->get('m_payment_id'))->firstOrFail(); // Eloquent Example

        // Verify the payment status.
        $status = $payfast->verify($request, $order->amount, $order->m_payment_id)->status();

        // Handle the result of the transaction.
        switch( $status )
        {
            case 'COMPLETE': // Things went as planned, update your order status and notify the customer/admins.
                break;
            case 'FAILED': // We've got problems, notify admin and contact Payfast Support.
                break;
            case 'PENDING': // We've got problems, notify admin and contact Payfast Support.
                break;
            default: // We've got problems, notify admin to check logs.
                break;
        }
    }

    public function confirmPayment(PaymentProcessor $payfast)
    {
        // Eloqunet example.
        $cartTotal = 9999;
        $order = Order::create([
            'm_payment_id' => '001', // A unique reference for the order.
            'amount'       => $cartTotal
        ]);

        // Build up payment Paramaters.
        $payfast->setBuyer('first name', 'last name', 'email');
        $payfast->setAmount($order->amount);
        $payfast->setItem('item-title', 'item-description');
        $payfast->setMerchantReference($order->m_payment_id);

        // Optionally send confirmation email to seller
        $payfast->setEmailConfirmation();
        $payfast->setConfirmationAddress(env('PAYFAST_CONFIRMATION_EMAIL'));

        // Return the payment form.
        return $payfast->paymentForm('Place Order');
    }

}
