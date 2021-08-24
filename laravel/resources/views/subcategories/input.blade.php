@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

<?php $h = ($subcat->id) ? $subcat->name : "Добавление" ?>
@section("title", $h . " :: Подкатегории")
@section("main")
  <h1>@if ($subcat->id) Правка подкатегории {{ $subcat->name }}
  @else Добавление подкатегории @endif</h1>
  <form action="{{ action('SubcategoryController@save') }}" method="POST">
    @if ($subcat->id)
      {{ method_field('PUT') }}
      <input type="hidden" name="id" value="{{ old('id', $subcat->id) }}">
    @endif
    {{ csrf_field() }}
    <label>Название</label>
    <input name="name" class="source" value="{{ old('name', $subcat->name) }}" required>
    @include("common.errors", ["el" => "name"])
    <label>Слаг</label>
    <input name="slug" class="destination" value="{{ old('slug', $subcat->slug) }}"
    required>
    @include("common.errors", ["el" => "slug"])
    <label>Категория</label>
    <select name="category">
      @foreach ($cats as $cat)
        <option value="{{ $cat->id }}" @if (old('category', $subcat->category) == $cat->id)
        selected @endif>{{ $cat->name }}</option>
      @endforeach
    </select>
    @include("common.errors", ["el" => "category"])
    <label>Порядок</label>
    <input type="number" name="order" value="{{ old('order', $subcat->order) }}"
    required>
    @include("common.errors", ["el" => "order"])
    <input type="submit" value="Сохранить">
  </form>
  <p><a href="/subcategories">Список подкатегорий</a></p>
@endsection
