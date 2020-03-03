<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');   #contructor called to provide the authorization.
    }


    #But till now we can access this, even if we are not signed in, thus we use auth middleware above for authorization every time.
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required','image'],   #for passing in multiple validation, or can be done like required|image(this means it should be image)
        ]);

        $imagePath = request('image')->store('uploads', 'public'); //This will store into Storage-> app -> public -> uploads.

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]); #Basically, here looking for authenticated user,then in user model accessing that relationship and passing the array, laravel will automatically set the user_id using the relationship.

        #dd(request()->all()); #printing out the data that we are passing from the request, that way we know we have recieved the proper data.
        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post')); //It is equal to passing an array, this compact function.
    }
}
