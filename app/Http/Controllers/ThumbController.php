<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ThumbController extends Controller
{
    function thumb(Request $request, $width, $height, $crop, $src)
    {
        $validator = Validator::make(compact('width', 'height', 'crop', 'src'), [
            'width' => 'required|integer',
            'height' => 'required|integer',
            'crop' => 'required|integer',
        ]);


        if ($validator->fails() || !is_file(public_path($src))) {
            return response($validator->errors(), Response::HTTP_NOT_FOUND);
        }
        try {
            $path = $request->path();
            $validated = $validator->validated();

            $cropMethod = $crop % 2;

            $quality = 85;

            $img = Image::make(public_path($src));
            if ($cropMethod) {
                $img = $img->fit($width, $height);
            } else {
                $img = $img->resize($width, $height, function($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas($width, $height);
            }
            Storage::disk('public')->put($path, $img->encode('',$quality));
            return $img->response();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
