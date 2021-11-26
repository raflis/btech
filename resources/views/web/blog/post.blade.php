@extends('web.layout')

@section('content')

<section class="entrada">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 main-post">
                <div class="titulo">
                    <h3>
                        {{ $post->name }}
                    </h3>
                    <p>
                        POR
                        <span>
                            {{ strtoupper($post->author) }}
                        </span>
                        - {!! strtoupper(\Carbon\Carbon::parse($post->created_at)->format('M d')) !!}
                    </p>
                    <a href="http://www.facebook.com/sharer.php?u={{ route('post', $post->slug) }}&t={{ $post->name }}" target="_blank">
                        <img src="{{ asset('images/facebook.png') }}" alt="">
                    </a>
                    <a href="http://www.linkedin.com/shareArticle?url={{ route('post', $post->slug) }}" target="_blank">
                        <img src="{{ asset('images/linkedin.png') }}" alt="">
                    </a>
                </div>
                <div class="content">
                    {!! htmlspecialchars_decode($post->body) !!}
                </div>
                <div class="image">
                    <img src="{{ $post->image_post }}" alt="">
                </div>
            </div>
            <div class="col-md-12 relacionados">
                <h4>
                    Articulos relacionados
                </h4>
            </div>
            @foreach ($posts as $item)
            <div class="col-md-6 item_relacionado">
                <div class="item_ shadow">
                    <div class="image">
                        <a href="">
                            <img src="{{ asset('images/entrada-blog.png') }}" alt="">
                        </a>
                    </div>
                    <div class="title">
                        <a href="{{ route('post', $item->slug) }}">
                            <p>
                                {{ $item->name }}
                            </p>
                        </a>
                        <p>
                            {!! \Carbon\Carbon::parse($post->created_at)->format('M d, Y') !!}
                        </p>
                    </div>
                    <div class="detail">
                        <div class="logo">
                            <img src="{{ asset('images/b.png') }}" alt="">
                        </div>
                        <div class="author">
                            <p>
                                POR <span>{{ strtoupper($item->author) }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="tags">
                        @foreach ($item->tags as $t)
                        <a class="btn btn-tag" href="{{ route('tag', $t->slug) }}">{{ strtoupper($t->name) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
