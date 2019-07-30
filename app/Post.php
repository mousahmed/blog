<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $dates =['published_at'];
    protected $fillable = ['title','description','content','image','category_id','user_id','published_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function deleteImage(){
        return Storage::delete($this->image);
    }
    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
    public function scopeSearched($query){
        $search = request()->query('search');
        if(!$search){
            return $query->published();
        }
        return $query->published()->where("title","LIKE","%{$search}%");

    }

    public function scopePublished($query){
        return $query->where('published_at', '<=', now());
    }
}
