<div class="grid grid-cols-1 gap-y-2">
    {{-- search --}}
    <div class="bg-white">
        <form action="/search" method="GET" class="flex items-center">
            @csrf
            <input type="text" name="query" placeholder="Search..." class="flex-grow p-4">
            <button type="submit" class="ml-2 bg-gray-800 text-white p-4 hover:bg-gray-950">
                Search
            </button>
        </form>
    </div>
    {{-- posts terbaru --}}
    <div class="bg-white border-t-4 border-t-gray-800 py-4">
        <h1 class="max-w-full px-4 font-bold">POST TERBARU</h1>
        <div class="p-4 pb-0 font-semibold">
            @foreach ($posts->take(7) as $post)
                <li class="text-sm"><a href="{{ route('single', $post->slug) }}" class="text-blue-600 hover:text-black"> {{ $post->title }} </a>
                </li>
            @endforeach
        </div>
    </div>
    {{-- kategori --}}
    <div class="bg-white border-t-4 border-t-gray-800 py-4">
        <h1 class="max-w-full px-4 font-bold">KATEGORI</h1>
        <div class="p-4 pb-0">
            @foreach ($posts as $post)
                <li class="text-sm font-semibold"><a href="{{ route('category.slug', $post->category->slug) }}"
                        class="text-blue-600 hover:text-black"> {{ $post->category->name }} </a></li>
            @endforeach
        </div>
    </div>
    <div class="bg-white border-t-4 border-t-gray-800 py-4">
        <h1 class="max-w-full px-4 font-bold">ARSIP</h1>
        <div class="p-4 pb-0">
            <li class="text-sm font-semibold"><a href="" class="text-blue-600 hover:text-black">Januari</a></li>
            <li class="text-sm font-semibold"><a href="" class="text-blue-600 hover:text-black">Februari</a></li>
            <li class="text-sm font-semibold"><a href="" class="text-blue-600 hover:text-black">Maret</a></li>
            <li class="text-sm font-semibold"><a href="" class="text-blue-600 hover:text-black">April</a></li>
        </div>
    </div>


</div>
