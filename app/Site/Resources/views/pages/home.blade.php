@extends('site::layouts.master')


@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">

            @isset($q)
                <div class="alert alert-info">
                    <h5>Searching for: {{ $q }}</h5>
                </div>
            @endisset

            @isset($category)
                <div class="alert alert-info">
                    <h5>Showing all of category: {{ $category->name }}</h5>
                </div>
            @endisset

            <div class="col-lg-8 col-md-10 mx-auto">

                @if($articles->count())
                    @foreach($articles as $article)
                        <div class="post-preview">
                            <a href="{{ $article->getDetailsLink() }}">
                                <h2 class="post-title">
                                    {{ $article->title }}
                                </h2>
                                <h3 class="post-subtitle">

                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">{{ $article->author->name ?? ''}}</a>
                                on {{date('F j, Y', strtotime($article->posted_at))}}</p>
                        </div>
                        <hr>
                    @endforeach
                    {{ $articles->links('vendor/pagination/bootstrap-4') }}
                @else
                    <p class="tc">No articles found</p>
                @endif

                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection