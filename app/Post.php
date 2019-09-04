<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Prophecy\Doubler\Generator\TypeHintReference;

class Post extends Model
{
    use softDeletes;
    protected  $fillable=[
        'title',
        'description',
        'content',
        'image',
        'published_at',
        'category_id'
    ];
    public function deleteImage(){
        Storage::delete($this->image);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    //check if a post has tag
    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
