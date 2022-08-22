<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title','url','credits','category_id','aspect_ratio'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
