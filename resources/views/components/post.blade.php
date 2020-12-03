@props(['post' => $post])


<div class="mb-4">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{ $post->user->username }}</a>
    <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
    <p class="mb-2">
        {{$post->body}}
    </p>
    {{-- delete post form --}}
    @can('delete', $post)

        <form method="post" action="{{route('posts.delete', $post)}}" class="mr-1 ml-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">delete post</button>
        </form> 
     
    @endcan

    

    <div class="flex items-center">
        @auth
        @if (!$post->likedBy(auth()->user()))
        <form method="post" action="{{route('posts.likes', $post)}}" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>   
        @else
        <form method="post" action="{{route('posts.likes', $post)}}" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>   
        @endif
        @endauth


       <span class="ml-4"> {{ $post->likes->count()}} {{Str::plural('like', $post->likes->count())}} </span>
    </div>

</div>