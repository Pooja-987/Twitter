<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Tweet;
use App\Like;
use App\User;
use App\comment;

class Profile extends Component
{

    public $tweet;
    public $data;
    public $tweetComment;
    public $user;

    public function mount(){

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

    public function profileFollow(User $user){
        if(auth()->user()->following($user))
        {
            auth()->user()->unfollow($user);
        }else{
            auth()->user()->follow($user);
        }

        $this->emit('refreshList');

        }

    public function render()
    {
        $this->data = $this->user->tweets()->latest()->get();     

        return view('livewire.profile');
    }
}
