<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Um post pertence a 1 usuario.
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Um post tem muitos comentarios.
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
