<?php

namespace App\Http\Controllers\Klant;

use App\Http\Controllers\Controller;
use App\Services\GerechtService;

class MenuController extends Controller
{
    public function index(GerechtService $service)
    {
        // $topGerechten = $service->menu();
        // return view('klant.menu', compact('topGerechten'));
    }
}
