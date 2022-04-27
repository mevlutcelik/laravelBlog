<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(){
        $authors = User::get();
        return view('author.author')->with([
            'authors' => $authors
        ]);
    }

    public function authorProfile($username){
        $author = User::whereUsername($username)->firstOrFail();
        $posts = Post::whereAuthor($username)->orderBy('id', 'DESC')->get();
        return view('author.author-profile')->with([
            'author' => $author,
            'posts' => $posts
        ]);
    }
}
