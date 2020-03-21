<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'category' => 'required',
            'price' => 'required|numeric',
            'item' => 'required',
        ]);

        return $postData;
    }
}
