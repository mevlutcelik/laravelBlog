<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentLikeRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentAdd(CommentRequest $request){
        $data = $request->validated();
        $data['likes'] = 0;
        $data['who_shared'] = Auth::user()->username;
        Comment::create($data);
        return back()->with([
            'type' => 'success',
            'msg' => 'Yorumunuz başarılı bir şekilde eklendi.'
        ]);
    }
    public function commentAnswerAdd(CommentRequest $request){
        $data = $request->validated();
        $data['answer'] = true;
        $data['likes'] = 0;
        $data['commentId'] = $request->commentId;
        $data['who_shared'] = Auth::user()->username;
        Comment::create($data);
        return back()->with([
            'type' => 'success',
            'msg' => 'Yanıtınız başarılı bir şekilde eklendi.'
        ]);
    }
}
