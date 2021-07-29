<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use App\Http\Requests\StoreTweetRequest;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function index(){
        
    }

    public function store(StoreTweetRequest $request){

        // $arguments = request()->validate([
        //     'body' => 'required|max:255'
        // ]);
        $arguments=$request->validated();

        Tweet::create([
            'user_id'=>auth()->user()->id,
            // 'body'=>request('body')
            'body'=>$arguments['body']
        ]);

        return redirect('/home');
    }

    public function destroy($id){
        
        $tweet = Tweet::where('id',$id)->firstOrfail()->delete();
        return redirect()->back();
    }
}
