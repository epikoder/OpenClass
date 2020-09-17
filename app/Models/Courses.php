<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'name', 'level'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * Relation to chapters HasMany
     */
    public function chapters ()
    {
        return $this->hasMany(Chapters::class);
    }

    public function users ()
    {
        return $this->belongsToMany(User::class);
    }

}
