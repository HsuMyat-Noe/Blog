@extends("layouts.app");

@section("content")
    <div class="container" style="max-width: 600px">

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <div class="card mb-2">
            <div class="card-body">
                <h4>{{ $article->title }}</h4>
                <div class="text-success">{{ $article->created_at->diffForHumans() }},
                    {{-- Category: <b>{{ $article->category->name }}</b>, --}}
                    User Name: <b>{{ $article->user->name }}</b>
                </div>
                
                <p class="card-text">{{ $article->body }}</p>
                
                @can('delete-article', $article)
                <a class="btn btn-warning" href="{{ url("/articles/delete/$article->id") }}">
                    Delete
                </a>
                <a class="btn btn-success" href="{{ url("/articles/edit/$article->id") }}">
                    Edit
                </a>
                @endcan

            </div>

            {{-- <a href="{{ url("/articles/detail/$article->id") }}">View Detail</a> --}}
        </div>  
            
        <ul class="list-group mb-2">
            <li class="list-group-item active">                  
                <b>Comments ({{ count($article->comments) }})</b>
            </li>

            @foreach($article->comments as $comment)
            <li class="list-group-item">
                
                @can('delete-comment', $comment)
                <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end">
                </a>   
                @endcan

                <b class="text-seccess">{{ $comment->user->name }}</b>,
                {{ $comment->content }}
                <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
            </li>
            @endforeach
        </ul>

        @auth
        <form action="{{ url('/comments/add') }}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>   
        @endauth

    </div>
@endsection
