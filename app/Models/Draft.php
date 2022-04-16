<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'link';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
