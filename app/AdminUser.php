<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if ($showTimes) $format = $format . "H: i: s";
        return $this->created_at->format($format);
    }

    protected $fillable = [
        "sidebar",
        "copyright",
        "logo",
    ];
}
