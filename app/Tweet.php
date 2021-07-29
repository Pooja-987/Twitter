<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Like;
use App\Comment;

use Illuminate\Database\Eloquent\Builder;

class Tweet extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like($user=null,$liked=true){
        $this->likes()->updateOrCreate([
            'user_id'=> $user? $user->id : auth()->id(),],[
            'liked'=>$liked,
        ]);
    }

    public function isLikedBy(User $user){
       return (bool)$user->likes->where('tweet_id',$this->id)->where('liked',true)->count();
    }

    public function isDislikedBy(User $user){
        return (bool)$user->likes->where('tweet_id',$this->id)->where('liked',false)->count();
     }

    public function dislike($user=null){
        return $this->like($user,false);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes_count , sum(!liked) dislikes_count from likes group by tweet_id',
            'likes','likes.tweet_id','tweets.id'
        );
    }

    public function comment($user=null,$comment=null){
        $this->comments()->create([
            'user_id'=> $user?$user->id:auth()->id(),
            'body'=>$comment,
        ]);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function isComentedBy(User $user){
        return $user->comments()->where('tweet_id',$this->id)->get();
    }

   



    
}
