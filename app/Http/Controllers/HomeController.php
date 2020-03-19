<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service)
    {
        // $menus = Menu::all();
        $resto_ids = [1];


        $categories = $service->getMenuWithCategory($resto_ids);

            // return $categories;
        return view('home', compact('categories'));
    }
}
