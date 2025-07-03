<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessieController extends Controller
{
    public function index(Request $request) {

        return view('klant.index', $request);
    }
}
