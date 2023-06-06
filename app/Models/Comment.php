<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    //O Comentario pertence a um usuário
    public function user(){
        return  $this->belongsTo(User::class);
    }

    //Um comentário pertence a um post.
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
