<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class how_toController extends Controller
{
    public function index() {

        return view('Guide');
    }

    public function show($Guide) {
        $how_to = how_to::where('Guide', $Guide)->firstOrFail();

        return view('Guide')->with([
            'Guide' => $Guide,
            'how_to' => $how_to,
        ]);
    }
}
