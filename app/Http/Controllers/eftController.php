<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class eftController extends Controller
{
    public function index()
    {

        return view('eft');
        #if (Cart::instance('default')->count() > 0) {
        #    $subtotal = Cart::instance('default')->subtotal() ?? 0;
        #    $discount = session('coupon')['discount'] ?? 0;
        #    $newSubtotal = $subtotal - $discount > 0 ? $subtotal - $discount : 0;
        #    $tax = $newSubtotal * (config('cart.tax') / 100);
        #    $finalSubtotal = $newSubtotal - $tax;
        #    $total = $finalSubtotal + $tax;
        #    return view('eft')->with([
        #        'subtotal' => $subtotal,
        #        'discount' => $discount,
         #       'newSubtotal' => $newSubtotal,
        #        'total' => $total,
        #        'finalSubtotal' => $finalSubtotal,
        #    ]);
        #}
    }
}
