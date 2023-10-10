<section>
    <div class="container mx-auto mt-2">
        <div class="flex">
            <div class="w-2/3 mr-2">
                @if (isset($message))
                    <div class="bg-blue-100 border mt-10 mx-20 border-blue-500 text-blue-700 px-4 py-3" role="alert">
                        <p class="font-bold">Info:</p>
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 mb-2">
                        <div class="bg-white border p-4 flex flex-col">
                            <img src="" alt="" class="pb-1" width="100%">
                            <h1 class="font-semibold text-2xl pb-1 hover:text-blue-600"><a
                                    href="{{ route('single', ['slug' => $first->slug]) }}">{{ $first->title }}</a></h1>
                            <div class="flex text-xs pb-1 my-1">
                                <p class="pr-2">
                                    {{ \Carbon\Carbon::parse($first->created_at)->formatLocalized('%d %B %Y') }}</p> |
                                <p class="px-2">{{ $first->comments->count() }} comments </p>
                            </div>
                            <h2 class="text-white font-semibold text-xs rounded my-1">
                                <a href="{{ route('category.slug', $first->category->slug) }}"
                                    class="bg-gray-700 p-1 rounded hover:bg-gray-900">{{ $first->category->name }}</a>
                            </h2>
                            <p>{{ \Illuminate\Support\Str::words($first->body, 40, '...') }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-x-2 gap-y-2">
                        @foreach ($posts as $post)
                            <div class="bg-white border p-4 flex flex-col">
                                <div>
                                    <img src="" alt="" class="pb-1" width="100%">
                                    <h1 class="font-semibold text-2xl pb-1 hover:text-blue-600"><a
                                            href="{{ route('single', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </h1>
                                    <div class="flex text-xs pb-1 my-1">
                                        <p class="pr-2">
                                            {{ \Carbon\Carbon::parse($post->created_at)->formatLocalized('%d %B %Y') }}
                                        </p>
                                        |
                                        <p class="px-2">{{ $post->comments->count() }} comments </p>
                                    </div>
                                </div>
                                <h2 class="text-white font-semibold text-xs rounded my-1">
                                    <a href="{{ route('category.slug', $post->category->slug) }}"
                                        class="bg-gray-700 p-1 rounded hover:bg-gray-900">{{ $post->category->name }}</a>
                                </h2>
                                <p>{{ \Illuminate\Support\Str::words($post->body, 20, '...') }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="w-1/3">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
</section>
