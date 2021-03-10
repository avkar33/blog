<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($article->id))
        <option value="0" @if ($article->published == 0) selected="" @endif>
            Не опубликовано
        </option>
        <option value="1" @if ($article->published == 1) selected="" @endif>
            Опубликовано
        </option>
    @else
        <option value="0">
            Не опубликовано
        </option>
        <option value="1">
            Опубликовано
        </option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{ $article->title ?? '' }}"
    required>

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placegolder="Slug" value="{{ $article->slug ?? "" }}"
    readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea clas="form-control" id="description_short" name="description_short" required>{{$article->description_short ?? ""}}</textarea>

<label for="">Полное описание</label>
<textarea clas="form-control" id="description" name="description" required>{{$article->description ?? ""}}</textarea>

<hr>

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{ $article->meta_title ?? '' }}">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{ $article->meta_description ?? '' }}">

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="{{ $article->meta_keyword ?? '' }}">

<hr>

<input class="btn btn-primary" type="submit" value="Сохранить">
