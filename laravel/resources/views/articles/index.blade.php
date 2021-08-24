@extends(request()->route()->getController()->parentView)

@push("head")
  <script src="/js/pc.js"></script>
@endpush

@section("title", $currentSubcat->name . " :: " . $currentCat->name)
@section("main")
  @if (request()->route()->getController()->isMobile)
    <p><a href="/">Главная</a>
    &lt;&lt; <a href="{{ action('CategoryController@view',
    ['category' => $currentCat->slug]) }}">{{ $currentCat->name }}</a></p>
  @endif
  <h1>{{ $currentSubcat->name }}</h1>
  @if (auth()->check())
    <p><a href="{{ route('articles.create', ['category' => $currentCat->slug,
    'subcategory' => $currentSubcat->slug, 'page' => 1]) }}">Создать статью</a></p>
  @endif
  @foreach ($articles as $article)
    <article>
      <?php
        $params = [
          "category" => $currentCat->slug,
          "subcategory" => $currentSubcat->slug,
          "article" => $article->slug,
          "page" => (request()->has("page")) ? request()->input("page") : 1,
        ];
      ?>
      <h2><a href="{{ action('ArticleController@view', $params) }}">
      {{ $article->title }}</a></h2>
      <div class="author-created">{{ $article->authorname }} ||
      {{ date_format($article->created_at, "j.m.Y G:i") }}</div>
      <div>{{ $article->description }}</div>
      @can("manipulate", $article)
        <div class="links">
          <a href=" {{ action('ArticleController@input', $params) }}">Исправить</a>
          <a href=" {{ action('ArticleController@destroy', $params) }}"
          class="adel">Удалить</a>
        </div>
      @endcan
    </article>
  @endforeach
  {{ $articles->links() }}
@endsection
