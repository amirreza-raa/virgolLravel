<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function getImageDirectory()
    {
        return '/images/posts/';
    }

    public static function getPublicDirectory()
    {
        return public_path() . static::getImageDirectory();
    }
}
