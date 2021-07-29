<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\validation\Rule;
use App\User;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{
    public function show(User $user){
        return view('profiles.show',[
            'user' => $user,
            'tweets' => $user->tweets()->paginate(5),
        ]);   
    }

    public function edit(User $user){

        // if($user->isNot(auth()->user())){
        //     abort(404);
        // }

        // $this->authorize('edit',$user);

        return view('profiles.edit',compact('user'));
    }

    public function update(UserRequest $request,User $user){

        // $attributes= request()->validate([
        //     'username'=>['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
        //     'avatar'=>['file'],
        //     'name'=>['string','required','max:255'],
        //     'email'=>['string','required','email',Rule::unique('users')->ignore($user)],
        //     'password'=>['string','required','min:8','max:255','confirmed'],
        // ]);
        
        $attributes=$request->validated();

        if(request('avatar')){
            $attributes['avatar']=request('avatar')->store('avatars', ['disk' => 'public']);

        }

        $user->update($attributes);

        return view('profiles.show',[
            'user' => $user,
            'tweets' => $user->tweets,
        ]);
    }
}
