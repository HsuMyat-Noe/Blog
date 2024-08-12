@extends("layouts.app");

@section("content")
    <div class="container" style="max-width: 600px">
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        {{ $articles->links() }}

        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h4>{{ $article->title }}</h4>
                    <div class="text-muted mb-2">
                        {{-- <b>Category:</b> {{ $article->category->name}}, --}}
                        <b>Comment:</b> ({{ count($article->comments)}}),
                        <b>User Name:</b> {{ $article->user->name}}

                    </div>
                    <div class="text-success">{{ $article->created_at->diffForHumans() }}</div>
                    <div class="">{{ $article->body }}</div>
                </div>

                <a href="{{ url("/articles/detail/$article->id") }}" class="mx-3">View Detail</a>
            </div>           
        @endforeach
    </div>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Article View</h1>
    <ul>
        @foreach ($articles as $article )
        <li>{{ $article['title']}}</li>     
        @endforeach
    </ul>
</body>
</html> --}}
