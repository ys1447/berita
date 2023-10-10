@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-2">
        <h1 class="bg-white my-2 p-4 text-lg font-semibold">Category: {{ $category->name }}</h1>

        @if ($posts->isEmpty())
            <p>No posts in this category.</p>
        @else
            <ul>
                @foreach ($posts as $post)
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white p-4">
                            <h1 class="font-semibold text-2xl pb-1 hover:text-blue-600"><a
                                    href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h1>
                            <h2 class="text-white font-semibold text-xs rounded my-1">
                                <a href=""
                                    class="bg-gray-700 p-1 rounded hover:bg-gray-900">{{ $post->category->name }}</a>
                            </h2>
                            <div class="flex text-xs pb-1 my-1">
                              <p class="pr-2 pt-2">
                                  {{ \Carbon\Carbon::parse($post->created_at)->formatLocalized('%d %B %Y | %H:%M') }}</p>
                          </div>
                            <p>{{ \Illuminate\Support\Str::words($post->body, 20, '...') }}</p>
                        </div>
                    </div>
                @endforeach
            </ul>
        @endif



    </div>
@endsection
