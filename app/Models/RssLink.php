<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RssLink extends Model
{
    protected $table = 'rss_links';
    protected $fillable = ['rss_link','status'];
}
