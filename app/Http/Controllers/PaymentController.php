<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;


Class PaymentController extends Controller
{
    public function index()
    {

        $OrderNumber = session()->get('orderNumber');
        $Query = Order::where('id',$OrderNumber);
        $total = [$Query=>billing_subtotal];
        return view('payment')->with([
            'orderNumber' => $orderNumber,
            'total' => $total,
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
