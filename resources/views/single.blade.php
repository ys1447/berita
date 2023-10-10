@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-2">
        <div class="flex">
            <div class="w-2/3 mr-2">
                <div class="flex flex-wrap bg-white">
                    <div class="p-4">
                        <h1 class="text-3xl font-semibold">{{ $post->title }}</h1>
                        <h2 class="text-xs pt-2">
                            {{ \Carbon\Carbon::parse($post->created_at)->formatLocalized('%d %B %Y | %H:%M') }}</h2>
                        <p class="border-t mt-4 pt-2 text-justify">{{ $post->body }}</p>
                        <p class="pt-10 italic font-semibold"><a class="hover:text-blue-600"
                                href="{{ route('posts') }}">Kembali</a></p>
                    </div>
                </div>
                <div class="bg-white p-4 mt-4">
                    @include('layouts.comment')
                </div>
                <div class="bg-white mt-4 shadow-lg rounded-lg p-4 mb-4">
                    <h1 class="text-xl mb-4">Komentar :</h1>
                    @foreach ($post->comments as $comment)
                        <div class="comment border-t border-gray-200 p-4">
                            <h2 class="text-sm font-semibold text-gray-800">Dari : {{ $comment->name }}</h2>
                            <p class="text-gray-600 text-sm">{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="w-1/3 mr-2">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
