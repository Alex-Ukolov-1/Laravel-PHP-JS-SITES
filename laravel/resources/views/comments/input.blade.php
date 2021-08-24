@extends("layouts.pc")

@section("title", "Правка :: Комментарии")
@section("main")
  <h1>Правка комментария</h1>
  <form action="{{ action('CommentController@save', $params) }}" method="POST">
    {{ method_field('PUT') }}
    <input type="hidden" name="id" value="{{ old('id', $comment->id) }}">
    {{ csrf_field() }}
    <label>Автор</label>
    <input type="text" name="author" value="{{ old('author', $comment->author) }}"
    required>
    @include("common.errors", ["el" => "author"])
    <label>E-mail автора</label>
    <input type="email" name="email" value="{{ old('email', $comment->email) }}"
    required>
    @include("common.errors", ["el" => "email"])
    <label>Содержание</label>
    <textarea name="content" class="comment-content" required>{{ old('content',
    $comment->content) }}</textarea>
    @include("common.errors", ["el" => "content"])
    <label>Скрытый комментарий</label>
    <input type="checkbox" name="hidden" value="1"
    @if (old('hidden', $comment->hidden)) checked @endif>
    <input type="submit" value="Сохранить">
  </form>
  <p><a href="{{ action('CommentController@index', $params) }}">Список
  комментариев</a></p>
@endsection
