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

    //Buscando todos os posts
    public static function search($search){
        return Self::where('title', "like", "%{$search}%")
        ->orWhere('content', "like", "%{$search}%")
        ->with(['user', 'comments'])
        ->paginate(3); //Max 3 posts por pag
    }
}
