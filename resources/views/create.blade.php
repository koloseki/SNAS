<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Article</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col  items-center justify-center bg-gray-50">
<div class="p-3 mt-12 sm:w-4/5 h-auto">
    <h2 class="text-3xl">Add Article</h2>

    <form method="POST" action="{{ route('create.store') }}" class="space-y-5" >
        @csrf
        <div class="flex flex-col mb-3">
            <label for="title">Title:</label>
            <input type="text" class="form-input" id="title" name="title" placeholder=" ">
        </div>


        <div class="flex flex-col mb-3">
            <label for="content">Content:</label>
            <textarea id="content" class="form-textarea h-64 resize-none" name="content" placeholder="content"></textarea>
        </div>

        <div>
            <label for="authors">Authors:</label><br>
            <select id="authors" name="authors[]" multiple="multiple" class=" w-full select2">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="bg-blue-500 px-2 py-1 text-white rounded hover:bg-blue-600 active:bg-blue-700 transition" type="submit">Submit</button>
    </form>
</div>
</body>
</html>

