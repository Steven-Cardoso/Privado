<?php

namespace App\Http\Controllers;

use App\Rules\RestoCategoryValidate;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'category' => ['required', new RestoCategoryValidate(request('restoId'))],
        ]);

        return $request->all();
    }
}
