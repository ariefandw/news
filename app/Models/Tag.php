<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['tag_title','tag_slug','tag_lang'];

    public function news()
    {
        return $this->belongsToMany('App\Models\News');
    }
}
