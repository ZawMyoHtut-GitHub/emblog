@extends("layouts.app")
<style>
    .close-btn{
        display: none;
        color: red;
        text-decoration: none;
        font-size: large;
        font-weight: bold;

    }
    .ph{
        background-color: gray-light;
        border:1px solid gray;
        border-radius: 25px;
    }
    .ph:hover .close-btn{
        display: block;
        text-decoration: none;

    }

</style>
@section("content")
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle small mb-2 text-muted">
                    <b></b>
                    Category : <b>{{ $article->category->name }}</b>,
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text text-justify">
                    {{ $article->body}}
                </p>
                <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning">Delete</a>
            </div>
        </div>
        <!-- comment section -->
        <div class="container">
            <div class="card mb-2 p-2">                
                <b class="mt-2 pl-2">Comments ({{ count($article->comments) }})</b>
                <hr>
                
                @foreach($article->comments as $comment)
                    <div class="d-flex">
                    <div class="m-2 p-2 ph">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex">
                                <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">

                                <div class="small mt-2 pl-2">
                                    By <b>{{ $comment->user->name }}</b>, {{ $comment->created_at->diffForHumans()}}
                                </div>
                            </div>
                            <a href="{{ url("/comments/delete/$comment->id") }}" class=" close-btn ml-3 mr-3">&times;</a>
                        </div>
                        <hr class="m-1 pl-4 pr-3">
                        <div class="ml-4 mr-3 text-justify">
                            {{ $comment->content }}                            
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>

        @auth
            <form action="{{ url('/comments/add') }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
                <input type="submit" value="Add Comment" class="btn btn-secondary">
            </form>
        @endauth
    </div>
    
</div>

@endsection