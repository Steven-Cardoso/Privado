<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
 public function getMenuWithCategory()
 {
    $categories = Menu::get()
    ->groupBy('category.name');

 return $categories;
 }
}
