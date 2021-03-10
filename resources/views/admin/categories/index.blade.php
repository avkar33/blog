@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Спипок категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категория @endslot

        @endcomponent

        <hr>

        <a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right"><i
                class="fafa-plus-square-0">Создать категорию</i></a>
        <table class="table table-striped">
            <thead>
                <th>Наименование</th>
                <th>Публикация</th>
                <th class="text-right">Действие</th>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->published }}</td>
                        <td class="text-right">
                            <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                                action="{{ route('admin.category.destroy', $category) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a class ="btn btn-default" href="{{ route('admin.category.edit', $category) }}"><i class="fa fa-edit"></i></a>

                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan=3 class="text-center">
                            <h2>Данные отсутствуют</h2>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=3>
                        <ul class="pagination pull-right">
                            {{ $categories->links('vendor.pagination.bootstrap-4') }}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
