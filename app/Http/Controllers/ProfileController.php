<?php

namespace App\Http\Controllers;

use App\User; //Here we have imported the class User
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)  //here we are getting the profile through routes(Web.php)
    {
       $user = User::findorfail($user);    //Here looking for user in User Class.(In User.php), it will give all the details regarding the data and app
        return view('profiles.index', [
            'user' => $user,   //So here we are passing and array to the views, and there we are accesing the username through this array.
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user->profile()); //This is in respect with the policies file that we have created.(ProfilePolicy).
        return view('profiles.edit',compact('user'));  #The above function can be wriiten like this,doing exact same thing.
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => '',
        ]);

        auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id}");
    }

}

