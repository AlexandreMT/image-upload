<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(ImageRequest $request){
        /*if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public', $imageName);
        }*/

        $request->user()->update(['avatar' => $request->image]);

        return response(null, 202);
    }

    public function saveImage(ImageRequest $request){
        if($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public', $imageName);
            $request->user()->update(['image' => $imageName]);
            return response(null, 202);
        }
    }
}
