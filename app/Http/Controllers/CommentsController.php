<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\User;
use App\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentsController extends Controller
{
    

    public function store(StoreCommentRequest $request){
        // $attributes=request()->validate([
        //     'body' => 'required|max:255'
        // ]);

        $attributes=$request->validated();

        
        $tweet->comment(auth()->user(),$attributes['cbody']);

        return back();
        
    }
}
