<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RejectMessage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'reject_message';
    protected $fillable = [
        'post_id','message'
    ];
    public function post(){
        return $this->hasOne(Post::class,'id','post_id');
    }
}
