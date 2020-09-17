<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $fillable = [
        'name', 'chapter_num'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    /**
     * Reverse relation to Courses BelongsTO
     */
    public function courses ()
    {
        return $this->belongsTo(Courses::class);
    }

    /**
     * Relation to pages HasMany
     */
    public function pages ()
    {
        return $this->hasMany(Pages::class);
    }
}
