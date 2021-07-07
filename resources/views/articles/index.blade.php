@extends("layouts.app")

@section("content")

<div class="container">
    @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    {{ $articles->links() }}
    @foreach($articles as $article)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"><b>{{ $article->title }}</b></h5>
                <div class="card-subtitle mb-2 text-muted small">
                    By <b>{{ $article->user->name }}</b>, Category : <b>{{ $article->category->name }}</b>, 
                    {{ $article->created_at->diffForHumans()}}
                </div>
                <p class="card-text text-justify">{{ $article->body }}</p>
                <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">
                    View Detail &raquo;
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection