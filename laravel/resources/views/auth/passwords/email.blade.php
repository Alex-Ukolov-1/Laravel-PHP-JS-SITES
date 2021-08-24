@extends("layouts.pc")

@section("title", "Сброс пароля")
@section("main")
  <h1>Сброс пароля</h1>
  <form method="POST" action="/password/email">
    {{ csrf_field() }}
    <label>E-mail</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    @include("common.errors", ["el" => "email"])
    <input type="submit" value="Отправить письмо">
  </form>
@endsection
