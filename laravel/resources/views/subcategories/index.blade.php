@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

@section("title", "Подкатегории")
@section("main")
  <h1>Список подкатегорий</h1>
  <p><a href="{{ route('subcategories.create') }}">Создать подкатегорию</a></p>
  <table class="list">
    <tr>
      <th>Категория</th>
      <th>Порядок</th>
      <th>Название</th>
      <th>Слаг</th>
      <th colspan="2">&nbsp;</th>
    <tr>
    @foreach ($subcats as $subcat)
      <tr>
        <td>{{ $subcat->catname }}</td>
        <td class="center">{{ $subcat->order }}</td>
        <td>{{ $subcat->name }}</td>
        <td>{{ $subcat->slug }}</td>
        <td class="links">
          <a href="{{ action('SubcategoryController@input',
          ['subcategory' => $subcat->slug]) }}">Исправить</a>
        </td>
        <td class="links">
          <a href="{{ action('SubcategoryController@destroy',
          ['subcategory' => $subcat->slug]) }}" class="adel">Удалить</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
