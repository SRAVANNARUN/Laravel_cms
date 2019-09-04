<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Tag extends Model
{
    protected $fillable=['name'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
