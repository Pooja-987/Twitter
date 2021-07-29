<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Tweet;
use App\Like;
use App\User;
use App\comment;

class PublishTweetPanel extends Component
{

    public $tweet;
    public $newTweet;
    public $data;
    public $tweetComment;
    
    public function mount(){
    }

    public function store(){

        $this->validate(['tweet' => 'required|max:255']);
        
        sleep(1);

        $this->newTweet =Tweet::create([
            'body'=>$this->tweet,
            'user_id'=>auth()->user()->id,
        ]);

            $refresh;
        
        $this->tweet='';

        session()->flash('message','Tweet added successfully!!!');

    }

    public function likeTweet(Tweet $t){
        $t->like();
        $refresh;

    }

    public function dislikeTweet(Tweet $t){
        $t->dislike();
        $refresh;
    }

    public function addComment(Tweet $t){
        $this->validate(['tweetComment' => 'required|max:255']);

        $t->comment(auth()->user(),$this->tweetComment);

        $this->tweetComment='';
        $refresh;

    }

    public function render()
    {
        // $this->friends =auth()->user()->follows()->pluck('id');
        // $this->friends = $this->friends->push(auth()->user()->id);
        // $this->data=Tweet::whereIn('user_id',$this->friends)->withLikes()->latest()->get();

        $this->data=auth()->user()->timeline();
        return view('livewire.publish-tweet-panel');
    }
}
