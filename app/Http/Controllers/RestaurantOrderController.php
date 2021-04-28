<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RestaurantOrderController extends Controller
{
    public function index()
    {
        //$resto = Restaurant::find();

        /*if(!$resto) {
            abort(404, 'The Restaurant you are looking for is not present');
        }
*/
        $orders = Order::orderBy('isComplete')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('orders.order-index')
            ->with('orders', $orders);
            //->with('resto',$resto);
    }

    public function add() 
    {
        //$resto = Restaurant::findOrFail($id);


        return view('orders.order-add');
    }

    public function store(Request $request)
    {
      $postData = $this->validate($request, [
         // 'resto_id' => 'required|exists:restaurants,id',
          'order_data' => 'required|array',
      ]);

        $itemIds = $postData['order_data']['orderDetails'];
        $itemIds[] = 99;

        try { 
            DB::beginTransaction();
            $orderTotal = 0;

            foreach ($itemIds as $id) {
                $menu = Menu::query()
                //->where('resto_id', $postData['resto_id'])
                ->where('id', $id)
                ->first();

                if ($menu) {
                    $orderTotal += $menu->price;
                }
            }

            $order = Order::create([
                //'resto_id' => $postData['resto_id'],
                'user_id' => Auth::user()->id,
                'amount' => $orderTotal,
                'isComplete' => 0,
                'isPaid' => 0,
                'name' => Auth::user()->name,
                'pratos' => $postData['order_data']['pratos'],
                'order_details' => [
                    'items' => $postData['order_data']['orderDetails'],
                    'customer_name' => $postData['order_data']['costumerDetails']['name'],
                    'customer_phone' => $postData['order_data']['costumerDetails']['phone'],
                    'customer_address' => $postData['order_data']['costumerDetails']['address'],
                ]
            ]);

            DB::commit();
        } catch(\Exception $e) {
            logger($e->getMessage());
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }

      return response()->json($order, 201);
    }

    public function complete(Request $request)
    {
        $postData = $this->validate($request, [
            'order_id' => ['required','exists:orders,id'],
        ]);

        $order = Order::find($postData['order_id']);
        $order->isComplete = 1;
        $order->save();

        return response()->json($order, 201); 
    }

    public function remove(Request $request)
    {
        $postData = $this->validate($request, [
            'order_id' => ['required','exists:orders,id'],
        ]);

        Order::where('id', $postData['order_id'])->delete();

        return response()->json("", 201); 
    }

    public function paid(Request $request)
    {
        $postData = $this->validate($request, [
            'order_id' => ['required','exists:orders,id'],
        ]);

        $order = Order::find($postData['order_id']);
        $order->isPaid= 1;
        $order->save();

        return response()->json($order, 201); 
    }
}
 