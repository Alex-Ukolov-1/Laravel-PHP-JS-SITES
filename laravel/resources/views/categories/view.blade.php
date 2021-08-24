@extends(request()->route()->getController()->parentView)

@section("title", $currentCat->name)
@section("main")
  @if (request()->route()->getController()->isMobile)
    <p><a href="/">Главная</a></p>
  @endif
  <h1>{{ $currentCat->name }}</h1>
  @if (request()->route()->getController()->isMobile)
    <ul>
      @foreach ($subcats as $subcat)
        <li><a href="/view/{{ $currentCat->slug }}/{{ $subcat->slug}}">
        {{ $subcat->name}}</a></li>
      @endforeach
    </ul>
  @else
    @foreach ($articles as $article)
      <article>
        <p>{{ $article->cat }} - {{ $article->subcat }}</p>
        <h2><a href="{{ action('ArticleController@view',
        ['category' => $article->catslug, 'subcategory' => $article->subcatslug,
        'article' => $article->slug]) }}">
        {{ $article->title }}</a></h2>
        <div class="author-created">{{ $article->authorname}} ||
        {{ date_format($article->created_at, "j.m.Y G:i") }}</div>
        <div>{{ $article->description}}</div>
      </article>
    @endforeach
  @endif
@endsection
