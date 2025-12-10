@extends('layout.master')
@section('content')

<div class="container-fluid">
    <div class="row my-2">
        <div class="col">
            <h2>Latest Posts</h2>
        </div>

        <div class="col-3">
            <form method ="Get" action="{{ route('index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-primary" type="submit" id="button-search">
                    <i class="bi bi-search"></i>
                    </button>
                </div>
                
            </form>

            
        </div>
    </div>

    {{-- FIXED ROW CLASS --}}
    <div class="row mt-3">

        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ $post->img_url }}" class="img-fluid rounded" alt="">
                        </div>

                        <div class="col-8">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 70) }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">Read More</a>
                                <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->category->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="row">
        <div class="col-12 my-3">
            <nav aria-label="Page navigation">
               
               {{ $posts->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>

</div>
@endsection
