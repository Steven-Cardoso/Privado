<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Order;

class RestaurantOrderController extends Controller
{
    public function index($id)
    {
        $resto = Restaurant::find($id);

        if(!$resto) {
            abort(404, 'The Restaurant you are looking for is not present');
        }

        $orders = Order::where('resto_id', $id)
            ->orderBy('isComplete')
            ->paginate(20);

        return view('orders.order-index')
            ->with('orders', $orders)
            ->with('resto',$resto);
    }
}
 