<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="p-4 border container mx-auto mt-8 rounded-md">
        <h1 class="font-bold text-2xl mb-7">Create Posts</h1>

        <form action="{{ route('create') }}" method="post">
            @csrf

            {{-- title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" placeholder="Enter the title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($errors->has('title'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('title') }}</span>
                @endif
            </div>

            {{-- Category --}}
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                @if ($categories->isEmpty())
                    <p class="text-red-600 mb-2">Tidak ada kategori tersedia. Silahkan buat kategori baru terlebih
                        dahulu.</p>
                @else
                    <select name="category_id" id="category"
                        class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                @endif
                <a href="{{ route('category.index') }}"
                    class="bg-green-600 p-1 rounded text-xs text-white hover:bg-green-800">Create New Category</a>
            </div>


            <div class="mb-4">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                <input type="text" name="slug" id="slug" placeholder="Enter the title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($errors->has('slug'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('slug') }}</span>
                @endif
            </div>

            <!-- Body -->
            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                <textarea name="body" id="body" rows="5" placeholder="Enter the body content"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @if ($errors->has('body'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('body') }}</span>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const titleInput = document.getElementById("title");
            const slugInput = document.getElementById("slug");

            titleInput.addEventListener("input", function() {
                const titleValue = titleInput.value.trim().toLowerCase();
                const slugValue = titleValue
                    .replace(/[^a-z0-9]+/g, "-")
                    .replace(/^-+|-+$/g, "");
                slugInput.value = slugValue;
            });

            const postForm = document.getElementById("postForm");

            postForm.addEventListener("submit", function(e) {
                e.preventDefault();
                // Lakukan sesuatu dengan data yang di-submit.
            });
        });
    </script>
</body>

</html>
