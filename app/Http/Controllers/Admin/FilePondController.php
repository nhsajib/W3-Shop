<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class FilePondController extends Controller
{
    public function storeImage(Request $request, $height, $width){
        if($request->hasFile('w3image')){

            $orgianlFile = $request->file('w3image');
            $fileName = random_int(1000, 2000).'_'.pathinfo($orgianlFile->getClientOriginalName())['filename'];
            $ext = $orgianlFile->getClientOriginalExtension();
            Image::make($request->file('w3image'))->resize($height, $width)->save(public_path('temp/').$fileName.'.'.$ext);

            return $fileName.'.'.$ext;
        }
    }

    public function storeFile(Request $request){
        
        $orgianlFile = $request->file('w3file');
        $fileName = random_int(1000, 2000).'_'.pathinfo($orgianlFile->getClientOriginalName())['filename'];
        $ext = $orgianlFile->getClientOriginalExtension();

        $orgianlFile->move(public_path('temp'), $fileName.'.'.$ext);

        return $fileName.'.'.$ext;   
    }

    public function destroy(Request $request){

        $image_path = public_path('temp/').$request->path;

        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
}
