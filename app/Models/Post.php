<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
    ];
    
    public function scopeActive($query){
        return $query->where('active', true);
    }

    public function scopeSelectById($query, $id){
        return $query->where('id', $id );
    }

    

    public static function boot(){
        parent::boot();

        static::creating(function($post) {
            $post->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
        });
    }
}

