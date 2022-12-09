<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;

class eftController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('created_at', 'desc')->first('id');
        $OrderNumber = substr($data, 6, -1);
        #dd($OrderNumber);
        $bill = Order::orderBy('id', 'desc')->first('billing_subtotal');
        $total =  substr($bill, 20, -1);
        return view('eft')->with([
            'OrderNumber' => $OrderNumber,
            'total' => $total,
        ]);
    }
}
