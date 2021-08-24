@extends(request()->route()->getController()->parentView)

@section("title", "Политика публикации")
@section("main")
  @if (request()->route()->getController()->isMobile)
    <p><a href="/">Главная</a></p>
  @endif
  <h1>Политика публикации</h1>
  <p>Все статьи, опубликованные на этом сайте, являются собственностью
  их авторов.</p>
@endsection
