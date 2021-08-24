@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

<?php $h = ($cat->id) ? $cat->name : "Добавление" ?>
@section("title", $h . " :: Категории")
@section("main")
  <h1>@if ($cat->id) Правка категории {{ $cat->name }}
  @else Добавление категории @endif</h1>
  <form action="{{ action('CategoryController@save') }}" method="POST">
    @if ($cat->id)
      {{ method_field('PUT') }}
      <input type="hidden" name="id" value="{{ old('id', $cat->id) }}">
    @endif
    {{ csrf_field() }}
    <label>Название</label>
    <input name="name" class="source" value="{{ old('name', $cat->name) }}" required>
    @include("common.errors", ["el" => "name"])
    <label>Слаг</label>
    <input name="slug" class="destination" value="{{ old('slug', $cat->slug) }}"
    required>
    @include("common.errors", ["el" => "slug"])
    <label>Порядок</label>
    <input type="number" name="order" value="{{ old('order', $cat->order) }}"
    required>
    @include("common.errors", ["el" => "order"])
    <input type="submit" value="Сохранить">
  </form>
  <p><a href="/categories">Список категорий</a></p>
@endsection
