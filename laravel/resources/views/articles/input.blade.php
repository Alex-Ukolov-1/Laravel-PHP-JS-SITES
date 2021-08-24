@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

@section("title", ($article->id) ? $article->title : "Добавление" . " :: Статьи")
@section("main")
  <h1>@if ($article->id) Правка статьи {{ $article->name }}
  @else Добавление статьи @endif</h1>
  <form action="{{ action('ArticleController@save', $params) }}" method="POST">
    <div id="saveLoadButtons">
      <input type="button" id="btnLoad" value="Загрузить">&nbsp;&nbsp;&nbsp;
      <input type="button" id="btnSave" value="Сохранить локально">
    </div>
    @if ($article->id)
      {{ method_field('PUT') }}
      <input type="hidden" name="id" value="{{ old('id', $article->id) }}">
    @endif
    {{ csrf_field() }}
    <label>Заголовок</label>
    <input name="title" class="source" value="{{ old('title', $article->title) }}"
    class="wide" required>
    @include("common.errors", ["el" => "title"])
    <label>Слаг</label>
    <input name="slug" class="destination" value="{{ old('slug', $article->slug) }}"
    class="wide" required>
    @include("common.errors", ["el" => "slug"])
    <label>Анонс</label>
    <textarea name="description">{{ old('description',
    $article->description) }}</textarea>
    @include("common.errors", ["el" => "description"])
    <label>Содержание</label>
    <textarea name="content" class="article-content" required>{{ old('content',
    $article->content) }}</textarea>
    @include("common.errors", ["el" => "content"])
    <label>Подкатегория</label>
    <select name="subcategory">
      @foreach ($subcats as $subcat)
        <option value="{{ $subcat->id }}"
        @if (old('subcategory', $article->subcategory) == $subcat->id)
        selected @endif>{{ $subcat->cat }} - {{ $subcat->subcat }}</option>
      @endforeach
    </select>
    @include("common.errors", ["el" => "subcategory"])
    <input type="submit" value="Сохранить">
  </form>
  <div class="tab-header">
    <a href="#" id="tab1_header1" class="active">Изображения</a>
    <a href="#" id="tab1_header2">Аудио</a>
    <a href="#" id="tab1_header3">Видео</a>
    <a href="#" id="tab1_header4">Прочие файлы</a>
  </div>
  <div class="tab-content">
    <div id="tab1_content1" class="tab tab-visible">
      <div id="fileList_0" class="filelist"></div>
      <form action="/files" method="post" enctype="multipart/form-data"
      target="fileFrame_0">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="0">
        <label>Изображение</label>
        <input type="file" name="imagefile" accept="image/*" required>
        <label>Описание</label>
        <input type="text" name="description" required class="wide">
        <input type="submit" value="Выгрузить">
      </form>
      <iframe name="fileFrame_0"></iframe>
    </div>
    <div id="tab1_content2" class="tab">
      <div id="fileList_1" class="filelist"></div>
      <form action="/files" method="post" enctype="multipart/form-data"
      target="fileFrame_1">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="1">
        <label>Аудиофайл</label>
        <input type="file" name="audiofile" accept="audio/*" required>
        <label>Описание</label>
        <input type="text" name="description" required class="wide">
        <input type="submit" value="Выгрузить">
      </form>
      <iframe name="fileFrame_1"></iframe>
    </div>
    <div id="tab1_content3" class="tab">
      <div id="fileList_2" class="filelist"></div>
      <form action="/files" method="post" enctype="multipart/form-data"
      target="fileFrame_2">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="2">
        <label>Видеофайл</label>
        <input type="file" name="videofile" accept="video/*" required>
        <label>Описание</label>
        <input type="text" name="description" required class="wide">
        <input type="submit" value="Выгрузить">
      </form>
      <iframe name="fileFrame_2"></iframe>
    </div>
    <div id="tab1_content4" class="tab">
      <div id="fileList_3" class="filelist"></div>
      <form action="/files" method="post" enctype="multipart/form-data"
      target="fileFrame_3">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="3">
        <label>Файл</label>
        <input type="file" name="otherfile" required>
        <label>Описание</label>
        <input type="text" name="description" required class="wide">
        <input type="submit" value="Выгрузить">
      </form>
      <iframe name="fileFrame_3"></iframe>
    </div>
    </div>
  </div>
  <p><a href="{{ action($c, $params) }}">Список статей</a></p>
@endsection
