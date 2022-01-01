<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopViewController extends Controller
{
    public function index(){
        return view('shop.pages.index');
    }

    public function loginRegister(){
        return view('shop.pages.login-register');
    }
}
