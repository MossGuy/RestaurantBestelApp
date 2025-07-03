<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GerechtService;

class MenuController extends Controller
{
    public function index(GerechtService $service)
    {
        $gerechten = $service->selectAll();
        return view('admin.menu_weergave', compact('gerechten'));
    }
}
