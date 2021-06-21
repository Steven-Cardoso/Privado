<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Services\RestoService;
use App\Order;
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
    public function index(MenuService $service, RestoService $restoService)
    {
        // $menus = Menu::all();
        // $resto_ids = [1];

        $orders = Order::orderBy('isComplete')
        ->orderByDesc('created_at')
        ->paginate(20);

        $restoId = 1;

        $menus = $service->getMenuWithCategory($restoId);

        $restos = $restoService -> userRestoAndTables();

        return view('home', compact('menus','restoId', 'restos'))->with('orders', $orders);
    }

    public function index2(MenuService $service, RestoService $restoService)
    {
        // $menus = Menu::all();
        // $resto_ids = [1];

        $orders = Order::orderBy('isComplete')
        ->orderByDesc('created_at')
        ->paginate(20);

        $restoId = 1;

        $menus = $service->getMenuWithCategory($restoId);

        $restos = $restoService -> userRestoAndTables();

        return view('menu.menu-index', compact('menus','restoId', 'restos'))->with('orders', $orders);
    }
}
