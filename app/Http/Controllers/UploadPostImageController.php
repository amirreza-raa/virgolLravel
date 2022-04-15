<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\ImageService;
use Illuminate\Http\Request;

class UploadPostImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image']
        ]);


        $image_name = ImageService::uploadImageFile(
            $request->file('file'),
            Post::getPublicDirectory()
        );

        return response([
            'data' => Post::getImageDirectory() . $image_name
        ]);
    }
}
