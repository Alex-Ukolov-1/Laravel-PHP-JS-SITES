@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

@section("title", "Категории")
@section("main")
  <h1>Список категорий</h1>
  <p><a href="{{ route('categories.create') }}">Создать категорию</a></p>
  <table class="list">
    <tr>
      <th>Порядок</th>
      <th>Название</th>
      <th>Слаг</th>
      <th colspan="2">&nbsp;</th>
    <tr>
    @foreach ($cats as $cat)
      <tr>
        <td class="center">{{ $cat->order }}</td>
        <td>{{ $cat->name }}</td>
        <td>{{ $cat->slug }}</td>
        <td class="links">
          <a href="{{ action('CategoryController@input',
          ['category' => $cat->slug]) }}">Исправить</a>
        </td>
        <td class="links">
          <a href="{{ action('CategoryController@destroy',
          ['category' => $cat->slug]) }}" class="adel">Удалить</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection