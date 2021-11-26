@extends('web.layout')

@section('content')

<section class="blog">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 buscador">
                <div class="col-izq">
                    <div class="busq">
                        <img class="embudo" src="{{ asset('images/embudo.png') }}" alt="">
                        <button data-toggle="collapse" href="#categoriasCol" role="button" aria-expanded="false" aria-controls="categoriasCol">
                            <span>Categorías</span>
                            <img src="{{ asset('images/abajo.png') }}" alt="">
                        </button>
                        <button data-toggle="collapse" href="#tagsCol" role="button" aria-expanded="false" aria-controls="tagsCol">
                            <span>Tags</span>
                            <img src="{{ asset('images/abajo.png') }}" alt="">
                        </button>
                        <div class="collapse multi-collapse shadow" id="categoriasCol">
                            <div class="card card-body">
                                @foreach ($categories as $category)
                                <a class="btn-link" href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="collapse multi-collapse shadow" id="tagsCol">
                            <div class="card card-body">
                                @foreach ($tags as $tag)
                                <a class="btn-link" href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-der">
                    <form action="{{ route('blog') }}" method="GET">
                        <input type="text" name="name" placeholder="BUSCA LO ÚLTIMO EN INNOVACIÓN">
                        <button type="submit">
                            <img src="{{ asset('images/search.png') }}" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="row entradas">
                @if (Request::get('name'))
                <div class="col-md-12 result">
                    @php $result = ($posts->count()==1)?'Se encontró <span>1 resultado</span>':'Se encontraron <span>'.$posts->count().' resultados</span>'; @endphp
                    <p>
                        {!! htmlspecialchars_decode($result) !!} para "{{ Request::get('name') }}"
                    </p>
                </div>
                @endif
                @foreach ($posts as $post)
                <div class="col-md-4 item d-flex">
                    <div class="item_ shadow">
                        <div class="image">
                            <a href="">
                                <img src="{{ $post->image_carrousel }}" alt="">
                            </a>
                        </div>
                        <div class="title">
                            <a href="{{ route('post', $post->slug) }}">
                                <p>
                                    {{ $post->name }}
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
                                    POR <span>{{ strtoupper($post->author) }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="tags">
                            @foreach ($post->tags as $t)
                            <a class="btn btn-tag" href="{{ route('tag', $t->slug) }}">{{ strtoupper($t->name) }}</a>
                            @endforeach 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection