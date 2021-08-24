@extends(request()->route()->getController()->parentView)

@section("title", "О сайте")
@section("main")
  @if (request()->route()->getController()->isMobile)
    <p><a href="/">Главная</a></p>
  @endif
  <h1>О сайте</h1>
  <p>Все права на сайт принадлежат команде его разработчиков.</p>
@endsection
