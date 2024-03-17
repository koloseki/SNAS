
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Article</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
<div class="container mx-auto px-4 ">
    <a href="/create" class="text-3xl mt-12">Add Article</a>

    @foreach($articles as $article)
        <div class="my-8 bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-2">{{ $article->title }}</h2>
            <p class="text-gray-700">{{ $article->text }}</p>
            <p class="font-bold mt-4">Authors:</p>
            @foreach($article->authors as $author)
                <button class="border hover:bg-gray-100 font-medium py-2 px-4 rounded m-1">
                    {{ $author->name }}
                </button>
            @endforeach
        </div>
    @endforeach
</div>
<div class="mt-4">
    {{ $articles->links() }}
</div>
</body>
</html>

