@extends('layouts.app')

@section('content')
 <div class="container">
    @if($errors->any())
        <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
        </div>
    @endif
    
    <form method="post">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $article->title }}">
        </div>
        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control">{{ $article->body }}</textarea>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select class="form-select" name="category_id" >

                @foreach($categories as $category)
                <option value="{{ $category['id'] }}" 
                    @selected($category->id == $article->category_id)> 
                    {{ $category['name'] }} 
                </option>
                @endforeach

            </select>
        </div>
        <input type="submit" value="Update Article" 
        class="btn btn-primary">
    </form>
 </div>
@endsection