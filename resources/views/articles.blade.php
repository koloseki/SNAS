
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>New Article</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
<div class="container mx-auto px-4 pt-6 ">
    <a href="/create" class="text-3xl py-1 px-2 mt-12 border-2 border-gray-50 hover:border-black transition-colors duration-300 ease-in-out">Add Article</a>

    @foreach($articles as $article)
        <div class="my-8 bg-white p-6 rounded shadow">
            <div class="flex space-x-3">
                <h2 class="text-2xl font-bold mb-2">{{ $article->title }}</h2>
                <a href="/edit/{{ $article->id }}" class="flex-grow-0 border px-4 text-gray-600 inline-block text-center rounded flex items-center transform hover:bg-gray-100">Edit</a>
            </div>
            <p class="text-gray-700">{{ $article->text }}</p>
            <p class="font-bold my-4">Authors:</p>
            @foreach($article->authors as $author)
                <a href="/api/author/{{$author->id}}/articles" class="border hover:bg-gray-100 font-medium py-2 px-4 rounded m-1 ">
                    {{ $author->name }}
                </a>
            @endforeach
        </div>
    @endforeach
</div>
<div class="mt-4">
    {{ $articles->links() }}
</div>
</body>
</html>

