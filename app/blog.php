<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    // protected $table = 'table_name';

    protected $casts = [
        'design' => 'array',
    ];

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if ($showTimes) $format = $format . "H:i:s";
        return $this->created_at->format($format);
    }
}
