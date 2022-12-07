<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $fillable = [
        "user_id",
        "title",
        "post_type_id",
        "item_type_id",
        "found_address",
        "content",
        "image_1",
        "image_2",
        "image_3",
        "image_4",
        "image_5"
    ];
    public function post_type(){
        return $this->hasOne(PostType::class,'id','post_type_id');
    }
    public function item_type(){
        return $this->hasOne(ItemType::class,'id','item_type_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
