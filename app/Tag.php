<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'description'
    ];
    public $timestamps=false;
    public function tags()
    {
        return $this->belongsToMany('App\post');
    }


}
