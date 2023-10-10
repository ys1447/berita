<form action="{{ route('comment.store', $post->id) }}" method="post" class="w-full max-w-lg mx-auto mt-5">
    @csrf

    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input name="name" id="name" rows="4"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Komentar:</label>
        <textarea name="body" id="body" rows="4"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
    </div>

    <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Kirim Komentar
    </button>
</form>
