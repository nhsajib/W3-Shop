<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FormDependencyController extends Controller
{
    public function categories(){
        return Category::latest()->get();
    }
}
