<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

use App\Tweet;
use App\Like;
use App\Comment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    // protected $fillable = [
    //     'username','avatar','name', 'email', 'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline(){
        // return Tweet::where('user_id',$this->id)->latest()->get();

        $friends = $this->follows()->pluck('id');
        $friends=$friends->push($this->id);

        return Tweet::whereIn('user_id',$friends)->withLikes()->latest()->get();

    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->withLikes()->latest();
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatar(){
        // return "https://i.pravatar.cc/200?u=". $this->email;
        if(!isset($this->avatar)){
            return asset('/images/robot.png');
        }
         return asset('storage/'.$this->avatar);
    }

    public function follow(User $user){
        return $this->follows()->save($user);

       
    }

    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function follows(){
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function following(User $user){
        // return $this->follows->contains($user);

        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function search($name){
        return User::where('name','LIKE','%'.$name.'%')->orWhere('username','LIKE','%'.$name.'%')->get();
    }
  
    

    // public function getRouteKeyName(){
    //     return 'name';
    // }


}
