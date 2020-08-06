<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        "caption",
        "fb",
        "phone",
        "email",
        "location"
    ];

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if ($showTimes) $format = $format . "H:i:s";
        return $this->created_at->format($format);
    }
}
