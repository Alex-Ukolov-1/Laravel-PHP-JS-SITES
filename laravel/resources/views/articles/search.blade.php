@extends(request()->route()->getController()->parentView)

@section("title", "Поиск")
@section("main")
  @if (request()->route()->getController()->isMobile)
    <p><a href="/">Главная</a></p>
  @endif
  <h1>Поиск статей</h1>
  <form action="/search" method="get">
    <input type="text" name="search" value="{{ request()->input('search') }}"
    class="wide">
    <input type="submit" value="Найти">
  </form>
  @if ($articles)
    @foreach ($articles as $article)
      <article>
        <?php
          $params = [
            "category" => $article->catslug,
            "subcategory" => $article->subcatslug,
            "article" => $article->slug,
            "search" => request()->input("search"),
            "page" => (request()->has("page")) ? request()->input("page") : 1,
          ];
        ?>
        <p>{{ $article->cat }} - {{ $article->subcat }}</p>
        <h2><a href="{{ action('ArticleController@view', $params) }}">
        {{ $article->title }}</a></h2>
        <div class="author-created">{{ $article->authorname }} ||
        {{ date_format($article->created_at, "j.m.Y G:i") }}</div>
        <div>{{ $article->description }}</div>
        @can("manipulate", $article)
          <div class="links">
            <a href="{{ action('ArticleController@input', $params) }}">Исправить</a>
            <a href="{{ action('ArticleController@destroy', $params) }}"
            class="adel">Удалить</a>
          </div>
        @endcan
      </article>
    @endforeach
    {{ $articles->links() }}
  @endif
@endsection
