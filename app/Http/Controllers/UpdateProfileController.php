<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class UpdateProfileController extends Controller
{
    public function update(ProfileRequest $request)
    {
        $data = $request->only([
            'name','email','password','bio','username',
            'email_on_follow','email_on_like','email_on_reply'
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->profile && $request->profile_name) {
            $data['profile'] = ImageService::uploadImageBase64(
                $request->profile, $request->profile_name, public_path('profiles/')
            );
        }

        $request->user()->update($data);

        return $request->user();
    }
}
