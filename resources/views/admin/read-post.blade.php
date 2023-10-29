@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    @if (session('success'))
        <x-alerts.success :success="session('success')" />
    @endif
    <div class="max-w-[95%]  m-auto bg-gray-100 rounded-lg px-4 py-6">
        <table class="w-full rounded-lg overflow-hidden mb-4">
            <tr class="bg-gray-800 text-white py-4 px-4">
                <th class="text-start  p-2">Image</th>
                <th class="text-start p-2 ">User</th>
                <th class="text-start p-2">Slug</th>
                <th class="text-end p-2">Content</th>
                <th class="text-end p-2">Date</th>
                <th class="text-end p-2">Delete</th>
            </tr>
            @foreach ($posts as $item)
                <tr class="text-sm odd:bg-white relative">

                    <td class="text-start ">
                        @if ($item->image)
                            <a class="underline text-blue-500" href="{{ asset('/storage/' . $item->image) }}"
                                target="_blank">view</a>
                        @endif
                    </td>
                    <td class="text-start">{{ $item->User->name }}</td>
                    <td class="text-start">
                        <a href="{{ route('read.post',$item->slug) }}">Read</a>
                    </td>
                    <td class="text-end underline text-blue-400">
                        <a href="{{ route('view.content', $item->slug) }}">Read</a>
                    </td>
                    <td class="text-end">{{ $item->created_at->diffForHumans() }}</td>
                    <td class="relative flex items-center justify-end" x-data="{ open: false }">
                        <img class="absolute" x-on:click="open=!open"
                            src="https://api.iconify.design/mdi:dots-vertical.svg?color=%23000000" alt="">
                        <div x-cloak x-transition
                            class="absolute  right-1 z-10 top-2 -translate-x-3 rounded-lg p-3 bg-black shadow-lg"
                            x-show="open">
                            <form action="{{ route('post.delete', $item->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="w-full py-2 hover:bg-red-500 text-white bg-red-400 rounded-lg mb-1"
                                    type="submit">Delete</button>
                            </form>
                            <form action="{{ route('post.toggle', $item->slug) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button class="w-full py-2 hover:bg-blue-500 text-white bg-blue-400 rounded-lg mb-1"
                                    type="submit">{{ $item->is_active ? 'Disable' : 'Enable' }}</button>
                            </form>
                            <form class="mb-1" action="{{ route('post.feature', $item->slug) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button class="w-full py-2 px-2 hover:bg-green-500 text-white bg-green-400 rounded-lg mb-1"
                                    type="submit">{{ $item->is_featured ? 'Featured' : 'Unfeatured' }}</button>
                            </form>
                            @if ($item->user->id == auth()->user()->id)
                                <a class="w-full px-2  py-2 hover:bg-indigo-500 text-white bg-indigo-400 rounded-lg mb-1"
                                    href="{{ route('post.update', $item->slug) }}">Edit</a>
                            @else
                                <span class="w-full py-2 rounded-lg mb-1">Unedit</span>
                            @endif
                        </div>
                    </td>

                </tr>
            @endforeach
        </table>
     
    </div>
  

@endsection



