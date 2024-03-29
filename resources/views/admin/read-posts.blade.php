@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <x-home.navbar />
    <div class="max-w-lg m-auto py-12 px-4">
        <div>
            <div>
                @if ($post->image)
                    <img class="rounded-lg" src="{{ asset('/storage/'.$post->image) }}" width="100%">
                @endif
            </div>
            <div>
                <h1>{{ $post->user->name }}</h1>
                <h2>{{ $post->title }}</h2>
                <span>{{ $post->created_at->diffForHumans() }}</span>
                <article>
                    {!! $post->content !!}
                </article>
            </div>
        </div>
    </div>

    @auth
        <div class="max-w-lg m-auto bg-gray-100 p-4 rounded shadow-md mb-2">
            <form class="space-y-4 flex items-center justify-end" action="{{ route('comments.store', $post->slug) }}"
                method="post">
                @csrf
                <textarea id="comment" name="content" rows="1" placeholder="Leave a constructive Comment..."
                    class="w-full px-3 py-2 border border-gray-300 rounded mr-2 focus:outline-none focus:border-indigo-500"
                    required></textarea>
                @error('content')
                    <x-alerts.error :$message />
                @enderror
                <button type="submit"
                    class="bg-indigo-600 text-white font-medium py-2 px-4 rounded hover:bg-indigo-700 transition duration-300">Submit</button>
            </form>
        </div>
    @endauth

    <div class="max-w-lg bg-gray-100 m-auto mt-8">
        @foreach ($post->comments as $key=>$comment)
            <div class="flex items-center justify-between bg-white p-4 rounded shadow-sm mb-2" id="{{ $comment->comment_num }}" >
                <div>
                    <p class="font-semibold">{{ $comment->user->name }}</p>
                    @if (auth()->check() && $comment->user_id === auth()->user()->id)
                        <div  x-data="{ open : false }">
                            <div x-show="!open" >
                                <p>{{ $comment->content }}</p>
                                <button  @click="open = true" class="text-red-600 underline">Edit</button>
                                
                            </div>
                            <div x-cloak  x-show="open">
                                <form class="flex" action="{{ route('comments.update', [$comment->comment_num,$post->slug]) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <textarea id="comment" rows="1" name="content" placeholder="Update your comment"
                                        class="w-full px-3 py-2 border border-gray-300 rounded mr-2 focus:outline-none focus:border-indigo-500"
                                        >{{ $comment->content }}</textarea>
                                        @error('content')
                                        <x-alerts.error :$message />
                                        @enderror
                                    <button type="submit"
                                        class="bg-indigo-600 text-white font-medium py-2 px-4 rounded hover:bg-indigo-700 transition duration-300">Update</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <p>{{ $comment->content }}</p>
                    @endif
                </div>
                <div>
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
    </div>

    @guest
        <div class="bg-gray-100 flex flex-col py-12 px-4 rounded-lg mt-6">
            <p class="text-center font-semibold">Join the community to comment!</p>
            <div class="flex items-center justify-center mt-2">
                <a class="py-2 px-4 bg-indigo-600 text-white text-center rounded-lg hover:bg-blue-600" href="/signup">Signup</a>
            </div>
        </div>
    @endguest

@endsection

