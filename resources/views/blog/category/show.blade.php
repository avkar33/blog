@extends('layouts.app')

@section('title', $category->title)

@section('content')
    <div class="container">
        <h4>{{$category->title}}</h2>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-3">
                    <div class="card">
                        <h5 class="card-header text-center">{{ $article->title }}</h5>
                        <div class="card-body ">
                            <p class="card-text">{{$article->description_short}}</p>
                            <a href="{{ route('article', $article->slug) }}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
