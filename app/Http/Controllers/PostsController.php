<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Pegando todos os posts por paginação.
    public function index(){
        $posts = Post::with(['user', 'comments'])->paginate(15);
        return view('posts', ['title' => 'Posts', 'posts' => $posts]);
        //dd($posts);
    }
}
