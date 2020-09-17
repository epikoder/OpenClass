<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    /**
     * Reverse relation to chapters
     */
    public function chapters ()
    {
        return $this->belongsTo(Chapters::class);
    }
}
