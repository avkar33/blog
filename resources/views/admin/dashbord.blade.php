@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><a href="{{route('admin.category.index')}}" class="label label-primary">Категорий {{$count_categories}}</a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><a href="{{route('admin.article.index')}}" class="label label-primary">Материалов {{$count_articles}}</a></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Посетителей 0</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Сегодня 0</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary">Создать материал</a>
                <br>
                <h4 class="text-center">Опубликованные категории:</h4>
                @foreach ($categories as $category)
                    <a href="{{ route('admin.category.edit', $category) }}" class="list-group-item list-group-item-action">
                        <h4 class="list-group-item-heading">{{ $category->title }}</h4>
                        <p class="list-group-item-text">
                            Под категории:
                            @if (count($category->children) > 0)
                                @include('admin.categories.partials.categories', [
                                'categories' => $category->children->take(2),
                                'delimiter' => ' - ' . $delimiter
                                ])

                            @endif
                        </p>
                        <span class="list-group-item-text">Кол-во материалов:
                            {{ $category->articles()->count() }}</span>
                    </a>
                    <hr>
                @endforeach
                <ul class="pagination pull-center">
                    {{ $categories->appends(['articles' => $articles->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.article.create') }}" class="btn btn-block btn-primary">Создать материал</a>
                <br>
                <h4 class="text-center">Опубликованные материалы:</h4>
                @foreach ($articles as $article)
                    <a href="{{ route('admin.article.edit', $article) }}" class="list-group-item list-group-item-action">
                        <h4 class="list-group-item-heading">{{ $article->title }}</h4>
                        <p class="list-group-item-text">
                            Категории:
                            {{ count($article->categories()->get()) > 0
                                ? $article->categories()->pluck('title')->implode(', ')
                                : 'Отсутствует' }}
                        </p>
                        <span class="list-group-item-text">Дата: {{ $article->created_at }}</span>

                    </a>
                    <hr>
                @endforeach
                <ul class="pagination pull-right">
                    {{ $articles->appends(['categories' => $categories->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
@endsection