@extends("layouts.pc")

@section("title", "Вход")
@section("main")
  <h1>Вход на сайт</h1>
  <form method="POST" action="/login">
    {{ csrf_field() }}
    <label>E-mail</label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    @include("common.errors", ["el" => "email"])
    <label>Пароль</label>
    <input type="password" name="password" required>
    @include("common.errors", ["el" => "password"])
    <label>Запомнить меня</label>
    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
    <input type="submit" value="Войти">
  </form>
  <p><a href="/password/reset">Забыли пароль?</a></p>
@endsection
