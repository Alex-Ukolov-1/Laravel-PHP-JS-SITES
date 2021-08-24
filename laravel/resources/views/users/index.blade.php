@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

@section("title", "Пользователи")
@section("main")
  <h1>Список пользователей</h1>
  <table class="list">
    <tr>
      <th>E-mail</th>
      <th>Имя</th>
      <th>Роль</th>
      <th colspan="2">&nbsp;</th>
    <tr>
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->email }}</td>
        <td>{{ $user->name }}</td>
        <td class="center">{{ $user->friendly_role }}</td>
        <td class="links">
          <a href="{{ action('UserController@input',
          ['user' => $user->id]) }}">Исправить</a>
        </td>
        <td class="links">
          <a href="{{ action('UserController@destroy',
          ['user' => $user->id]) }}" class="adel">Удалить</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
