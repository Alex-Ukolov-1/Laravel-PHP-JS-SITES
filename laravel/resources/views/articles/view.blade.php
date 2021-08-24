@extends(request()->route()->getController()->parentView)

@section("title", $article->title . "  ::  " . $article->subcat->name . "  ::  " .
$article->subcat->cat->name)
@section("main")
  @if (request()->route()->getController()->isMobile)
    <?php
      $l = "<p><a href='/'>Главная</a>";
      if (request()->has("search")) {
        $l .= " &lt;&lt; <a href='" . action('ArticleController@search',
        ['search' => request()->input('search'),
        'page' => request()->input('page')]) . "'>Поиск</a>";
      } else {
        $l .= " &lt;&lt; <a href='" . action('CategoryController@view',
        ['category' => $article->subcat->cat->slug]) . "'>" .
        $article->subcat->cat->name . "</a>" .
        " &lt;&lt; <a href='" . action('ArticleController@index',
        ['category' => $article->subcat->cat->slug,
        'subcategory' => $article->subcat->slug,
        'page' => request()->input('page')]) . "'>" . $article->subcat->name . "</a>";
      }
      $l .= "</p>"
    ?>
    {!! $l !!}
  @else
    <p><a href="{{ $h }}">Список статей</a></p>
  @endif
  <h1>{{ $article->title }}</h1>
  <p class="author-created">{{ $article->written_by->name }} ||
  {{ date_format($article->created_at, "j.m.Y G:i") }}</p>
  {!! $article->formatted_content !!}
  <p>&nbsp;</p>
  <p>Добавить комментарий:</p>
  <form method="POST" action="{{ action('CommentController@create',
  ['search' => request()->input('search'),
  'page' => request()->input('page')]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="article"
    value="{{ old('article', $comment->article) }}">
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
  </form>
  @if (count($comments) == 0)
    <p>Комментариев пока нет.</p>
  @else
    <p>Комментарии (всего {{ count($comments) }})</p>
    @foreach ($comments as $com)
      @if ($com->hidden)
        <p>Комментарий скрыт.</p>
      @else
        <article class="comment" @if ($loop->last) id="last_comment" @endif>
          <p class="author-created">{{ $com->author }}
          ({{ $com->email }}) ||
          {{ date_format($com->created_at, "j.m.Y G:i") }}</p>
          {!! $com->formatted_content !!}
        </article>
      @endif
    @endforeach
  @endif
  @if (request()->route()->getController()->isMobile)
    {!! $l !!}
  @else
    <p><a href="{{ $h }}">Список статей</a></p>
  @endif
@endsection
