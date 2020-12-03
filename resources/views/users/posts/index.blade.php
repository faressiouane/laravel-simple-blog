@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">

        <div class="p-6">
            <h1 class="text-2xl font-medium mb-1">
                {{ $user->name}}
            </h1>
            <p> Posted {{ $user->posts->count()}} {{Str::plural('post', $user->posts->count())}} 
            and recived {{$user->receivedLikes->count()}} {{Str::plural('like', $user->receivedLikes->count())}}</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg">

            @if ($posts->count())
            
            @foreach ($posts as $post)
            
            <x-post :post="$post" />
            
            @endforeach
            {{ $posts->links() }}
            
            @else
            <p>No posts yet</p>
            @endif
            
        </div>
    </div>
</div>

@endsection
