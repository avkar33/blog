@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-4">
                    <div class="card">
                        <h5 class="card-header text-center">{{ $category->title }}</h5>
                        <div class="card-body ">
                            <a href="{{route('category', $category->slug)}}" class="btn btn-primary">Статьи</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
