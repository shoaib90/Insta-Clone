@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fdel1-4.fna.fbcdn.net/v/t51.2885-19/s150x150/80815426_1173594363031609_6381489256237367296_n.jpg?_nc_ht=instagram.fdel1-4.fna.fbcdn.net&_nc_ohc=JnU8-5Z1I1cAX_krTFY&oh=1bf2d679045ecb006b333da2d4898d9e&oe=5E96E875" class="rounded-circle">
        </div>
        <div class="col-9 p-5">
           <div class="d-flex justify-content-between align-items-baseline"><h1>{{ $user->Username }}</h1>
           <a href="/p/create" >Add New Post</a>
           </div> {{--Thus we are passing in data into our views through controller--}}
           <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            <div class="d-flex">
               <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
               <div class="pr-5"><strong>195</strong> followers</div>
               <div class="pr-5"><strong>280</strong> following</div>
           </div>
           <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>  {{-- pt-> padding top   --}}
           <div>{{$user->profile->description}}</div>
        </div>
    </div>
    <div class=" row pt-5 ">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div> {{--This is adding new post.(pb-4 is for adding breathing space for new post)--}}
        @endforeach

          </div>
@endsection
