<!DOCTYPE html>
<html>
<head>
    <title>New Article</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-red">

<h2 class="bg-red-900">Add Article</h2>

<form method="POST" class="">
    @csrf
    <div class=" mb-3">
        <input type="text" class="form-control" id="title" name="title" placeholder=" ">
        <label for="title">Title</label>
    </div>


    <div class=" mb-3">
        <textarea id="content" class="form-control" name="content" placeholder="content"></textarea>
        <label for="content">Content:</label>
    </div>

{{--    <div>--}}
{{--        <label for="author">Author:</label><br>--}}
{{--        <datalist id="authors">--}}
{{--            @foreach($authors as $author)--}}
{{--                <option value="{{ $author->name }}">--}}
{{--            @endforeach--}}
{{--        </datalist>--}}
{{--    </div>--}}

    <button class="bg-violet-400" type="submit">Submit</button>
</form>

</body>
</html>

