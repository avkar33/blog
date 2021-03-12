@extends('layouts.app')
@section('title', $article->title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_desctiption', $article->meta_desctiption)
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h4 class="text-center">{{ $article->title }}</h4>
                <p class="text-center">{{ $article->description }}</p>
            </div>
            <footer>
                <p>Создатель: {{ $article->created_by }}</p>
                <br>
                <div class="pull-left">
                    <h5>Категории: </h5>
                    <ul>
                        @foreach ($categories as $category)
                            <a href="{{route('category', $category->slug)}}">{{ $category->title }}</a>
                        @endforeach
                    </ul>
                </div>
            </footer>
        </div>
    </div>
@endsection
