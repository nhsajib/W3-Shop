<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class MediaLibraryController extends Controller
{
    public function store(Request $request, $height, $width){

        if($request->hasFile('w3image')){
            $orgianlFile = $request->file('w3image');
            $fileName = random_int(1000, 2000).'_'.pathinfo($orgianlFile->getClientOriginalName())['filename'];
            $ext = $orgianlFile->getClientOriginalExtension();

            return Storage::putFileAs('images', $orgianlFile, $fileName.$ext);

        }

    }

    public function index(){

    }

    public function update(){

    }

    public function delete(){

    }
}
