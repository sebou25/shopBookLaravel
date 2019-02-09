<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;
use \Cart;
class HeaderComposer
{
    public function compose (View $view) {

        $catnav = ['is_online'=>1, 'parent_id'=>null];
        $view->with('categories',Category::where($catnav )->get())
             ->with('total',Cart::getTotalQuantity());

    }
}