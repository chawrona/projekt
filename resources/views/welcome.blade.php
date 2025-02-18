<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts and Categories</title>
</head>
<body>
    <h1>Posts</h1>
    @foreach($posts as $post)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>

            <h3>Categories:</h3>
            @if($post->categories->isEmpty())
                <p>No categories assigned.</p>
            @else
                <ul>
                    @foreach($post->categories as $category)
                        <li>
                            {{ $category->name }}
                            @if($category->trashed())
                                <small>(Deleted)</small>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach
</body>
</html>
