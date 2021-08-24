@extends("layouts.pc")

@section("title", "Регистрация")
@section("main")
  <h1>Регистрация нового пользователя</h1>
  <form method="POST" action="/register">
    {{ csrf_field() }}
    <label>Имя</label>
    <input type="text" name="name" value="{{ old('name') }}" required autofocus>
    @include("common.errors", ["el" => "name"])
    <label>E-mail</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    @include("common.errors", ["el" => "email"])
    <label>Пароль</label>
    <input type="password" name="password" required>
    @include("common.errors", ["el" => "password"])
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirmation" required>
    <label>Введите символы с изображения</label>
    <input type="submit" value="Зарегистрировать">
  </form>
@endsection
