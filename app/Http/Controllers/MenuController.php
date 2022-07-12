<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Rules\RestoCategoryValidate;
use Illuminate\Http\Request;
use App\Services\MenuService;

class MenuController extends Controller
{
    public function index()
    {
        //$restoId = $id;
        $service = new MenuService;
        $menus = $service->getMenuWithCategory();

        //return view('menu.menu-index', compact('menus'));
        //return view('menu.menu-index');
    }

    public function remove(Request $request)
    {
        $postData = $this->validate($request, [
            'item_id' => ['required','exists:menus,id'],
            'item_category' => ['required','exists:menus,category_id']
        ]);

        Menu::where('id', $postData['item_id'],Category::where('category_id', $postData['item_category']))->delete();

        return response()->json("", 201); 
    }

    public function edit(Request $request)
    {
        $postData = $this->validate($request, [
            'item_id' => ['required','exists:menus,id'],
            'item_category' => ['required','exists:menus,category_id']
        ]);

        $menu = Menu::find('id', $postData['item_id'],Category::find('category_id', $postData['item_category']));
        $menu->price = $postData['price'];
        $menu->quantity = $postData['quantity'];
        $menu->save();


        return response()->json("", 201); 
    }
    
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            //'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'item' => 'required',
            'description' => 'required|min:3',
            'category' => ['required', new RestoCategoryValidate()],
        ]);

     $category = Category::where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'quantity' => $postData['quantity'],
            'description' => $postData['description'],
            //'resto_id' => $postData['restoId'],
            'category_id' => $category->id,

        ]);


        return response()->json($menu, 201);
    }

    public function getRestoMenu(Request $request)
    {
        $postData = $this->validate($request, [
            'category_id' => ['required','exists:categories,id'],
        ]);

        $menuItems = Menu::where('category_id', $postData['category_id'])
            ->get();
        return response()->json($menuItems, 200);
    }
}
