<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable = [
        "category_id",
        "title",
        "reply",
        "body",
        "file",
    ];

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if ($showTimes) $format = $format . "H: i: s";
        return $this->created_at->format($format);
    }
}
