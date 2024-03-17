<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Article</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col  items-center justify-center bg-gray-50">
<div class="p-3 mt-12 sm:w-4/5 h-auto">
    <h2 class="text-3xl">Edit Article</h2>

    <form method="POST" action="{{ route('edit.update', $article->id) }}" class="space-y-5" >
        @csrf
        @method('PUT')
        <div class="flex flex-col mb-3">
            <label for="title">Title:</label>
            <input type="text" class="form-input" id="title" name="title" value="{{ $article->title }}">
        </div>

        <div class="flex flex-col mb-3">
            <label for="content">Content:</label>
            <textarea id="content" class="form-textarea h-64 resize-none" name="content">{{ $article->text }}</textarea>
        </div>

        <button class="bg-blue-500 px-2 py-1 text-white rounded hover:bg-blue-600 active:bg-blue-700 transition" type="submit">Update</button>
    </form>

</div>
</body>
</html>

