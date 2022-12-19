<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'report';
    protected $fillable = [
        'post_id','user_id','message'
    ];
    public function post(){
        return $this->hasOne(Post::class,'id','post_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
