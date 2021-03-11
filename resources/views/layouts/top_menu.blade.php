@foreach ($categories as $category)

    @if ($category->children->where('published', 1)->count())
        <li class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="{{ url("/blog/category/$category->slug") }}"
                role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $category->title }}
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @include('layouts.top_menu', ['categories' => $category->children])
            </ul>
        @else
            <a class="btn btn-secondary dropdown-toggle" href="{{ url("/blog/category/$category->slug") }}"
                role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $category->title }}
            </a>
        </li>

    @endif

@endforeach
