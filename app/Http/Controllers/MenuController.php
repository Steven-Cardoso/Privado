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

        return view('menu.menu-index', compact('menus'));
    }
    
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            //'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required|min:3',
            'category' => ['required', new RestoCategoryValidate()],
        ]);

     $category = Category::where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            //'resto_id' => $postData['restoId'],
            'category_id' => $category->id,

        ]);


        return response()->json($menu, 201);
    }

    public function getRestoMenu(Request $request)
    {
        
        $menuItems = Menu::orderBy('category_id')
            ->get();
        return response()->json($menuItems, 200);
    }
}
