<?php

namespace App;
namespace App\Http\Controllers\backend;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $fillable = [
        "type",
        "title",
        "reply",
        "body",
        "file",
    ];
    /*
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    */
}
