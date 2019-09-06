@extends('site::layouts.master')


@section('content')

    <header class="masthead" style="background-image: url('{{ $article->feature_image }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $article->title_long ?? $article->title}}</h1>

                        <span class="meta">Posted by
              <a href="#">{{ $article->author->name ?? ''}}</a>
              on {{date('F j, Y', strtotime($article->posted_at))}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection