<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =
        [
          "name"
        ];
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if ($showTimes) $format = $format . "H:i:s";
        return $this->created_at->format($format);
    }
}
