<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Tweet;
use App\Like;
use App\User;
use App\comment;

class Response extends Component
{
    public $count;
    public $data;
    public $tweetComment;
    public $d;
    public $tweet;
    public $likes,$dislikes;

    public function likeTweet(Tweet $t){
        $t->like();
        // $this->count=$t->likes->where('liked','1')->count();
        // $this->tweet=$t;

        $refresh;

    }

    public function dislikeTweet(Tweet $t){
        $t->dislike();
        // $this->count=$t->likes->where('liked','0')->count();
        // $this->tweet=$t;
        $this->emit('postLiked');

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
        return view('livewire.response');
    }
}
