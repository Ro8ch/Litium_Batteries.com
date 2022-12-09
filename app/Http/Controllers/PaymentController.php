<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;



Class PaymentController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('created_at', 'desc')->first('id');
        $OrderNumber = substr($data, 6, -1);
        $bill = Order::orderBy('id', 'desc')->first('billing_subtotal');
        $total =  substr($bill, 20, -1);
        $PF_MERCHANT_ID='12531773';
        $PF_MERCHANT_KEY='pz929eqz1tjxg';
        $PF_RETURN_URL='https://lithium-cells.co.za/success';
        $PF_CANCEL_URL='http://lithium-cells.co.za/cancel';
        return view('payment')->with([
            'OrderNumber' => $OrderNumber,
            'total' => $total,
            'PF_MERCHANT_ID' => $PF_MERCHANT_ID,
            'PF_MERCHANT_KEY' => $PF_MERCHANT_KEY,
            'PF_RETURN_URL' => $PF_RETURN_URL,
            'PF_CANCEL_URL' => $PF_CANCEL_URL,
        ]);
        
    }

    public function success()
    {
        return view('success');
        
    }

    public function cancel()
    {
        return view('cancel');
    }

}
