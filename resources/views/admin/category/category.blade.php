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
        <h1 class="font-bold text-2xl mb-7">Create Category</h1>
        <form action="{{ route('category.store') }}" method="post">
            @csrf

            {{-- title --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori:</label>
                <input type="text" name="name" id="name" placeholder="Enter the name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($errors->has('name'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                <input type="text" name="slug" id="slug" placeholder="Enter the title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($errors->has('slug'))
                    <span class="text-red-500 text-xs italic">{{ $errors->first('slug') }}</span>
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
            const titleInput = document.getElementById("name");
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
