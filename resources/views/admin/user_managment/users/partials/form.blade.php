@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="">Имя</label>
<input type="text" class="form-control" name="name" value="
@if (old('name')) {{ old('name') }}
@else {{ $user->name ?? '' }} 
@endif 
" required>
<label for="">Email</label>
<input class="form-control" type="text" name="email" value="
@if(old('email')) {{old('email')}}
@else{{ $user->email ?? '' }} 
@endif
" required>
<label for="">Пароль</label>
<input class="form-control" type="password" name="password">

<label for="">Подтверждение пароля</label>
<input class="form-control" type="password" name="password_confirmation">

<hr>

<input class="btn btn-primary" type="submit" value="Сохранить">
