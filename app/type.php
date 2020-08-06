<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $fillable = [
        "category_id"
    ];

    public function category(){
        return $this->belongsTo("App\Category","category_id");
    }
    public function admin(){
        return $this->belongsTo("App\Category","category_id");
    }

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
