<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'title', 'slug', 'author', 'level', 'description', 'cover_url'
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
        return $this->belongsTo(User::class);
    }

}
