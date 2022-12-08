<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class eftController extends Controller
{
    public function index()
    {
        $finalSubtotal = 123;
        $orderNumber = 123;
        return view('eft')->with([
            'orderNumber' => $orderNumber,
            'finalSubtotal' => $finalSubtotal,
        ]);
    }
}
