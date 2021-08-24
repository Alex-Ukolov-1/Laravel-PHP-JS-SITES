@extends(request()->route()->getController()->parentView)

@section("title", "Главная")
@section("main")
  <h1>СЭП: сайт электронных публикаций</h1>
  <p>На этом сайте вы можете найти статьи по различным темам.</p>
  <p>Авторы статей могут опубликовать свои материалы. По всем вопросам,
  связанным с предоставлением доступа для публикации статей, просьба
  обращаться к <a href="mailto:admin@site.ru">администратору сайта</a>.</p>
  @if (request()->route()->getController()->isMobile)
    <ul>
      @foreach ($cats as $cat)
        <li><a href="/view/{{ $cat->slug }}">{{ $cat->name}}</a></li>
      @endforeach
      <li><a href="/search">Поиск</a></li>
      <li><a href="/policy">Политика публикации статей</a></li>
      <li><a href="/about">Сведения о сайте</a></li>
    </ul>
  @endif
@endsection
