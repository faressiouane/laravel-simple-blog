@extends('layouts.app')

@section('content')
    
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            
            <form action="{{route('login')}}" method="POST">
            @csrf

                {{-- email --}}
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" value="{{old('email')}}"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('email') border-red-500 @enderror">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm ml-5">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                {{-- password --}}
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" value=""
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('password') border-red-500 @enderror">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm ml-5">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                {{--remember me --}}
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                
                {{-- button:submit --}}
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection