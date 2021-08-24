<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/basic.css" type="text/css">
    <link rel="stylesheet" href="/css/pc.css" type="text/css">
    <link rel="stylesheet" href="/css/print.css" type="text/css" media="print">
		<script src="/js/main.js"></script>
		@stack("head")
    <title>@yield("title") :: СЭП</title>
  </head>
  <body>
    <div id="container"></div>
    <header>
      <div id="header_1"><h1>СЭП</h1></div>
      <div id="header_2"><h2>сайт</h2></div>
      <div id="header_3"><h2>электронных</h2></div>
      <div id="header_4"><h2>публикаций</h2></div>
    </header>
    <nav>
      <?php $p = request()->path(); ?>
      <a href="/" @if ($p == "/") class="active" @endif>Главная</a>
      @foreach ($ccats as $ccat)
        <?php $h = "view/" . $ccat->slug; ?>
        <a href="/{{ $h }}" @if ($p == $h) class="active" @endif>{{ $ccat->name}}</a>
        @if ((isset($currentCat)) && ($ccat->slug == $currentCat->slug))
          <div>
            @foreach ($subcats as $subcat)
              <?php $h = "view/" . $ccat->slug . "/" . $subcat->slug; ?>
              <a href="/{{ $h }}" @if ($p == $h) class="active"
              @endif>{{ $subcat->name}}</a>
            @endforeach
          </div>
        @endif
      @endforeach
      <a href="/search" @if ($p == "search") class="active" @endif>Поиск</a>
      <a href="/policy" @if ($p == "policy") class="active" @endif>Политика</a>
      <a href="/about" @if ($p == "about") class="active" @endif>О сайте</a>
      @can ("manipulate", "App\Category")
        <a href="/categories" @if ($p == "categories") class="active"
        @endif>Категории</a>
      @endcan
      @can ("manipulate", "App\Subcategory")
        <a href="/subcategories" @if ($p == "subcategories") class="active"
        @endif>Подкатегории</a>
      @endcan
      @can ("manipulate", "App\Comment")
        <a href="/comments" @if ($p == "comments") class="active"
        @endif>Комментарии</a>
      @endcan
      @can ("manipulate", "App\User")
        <a href="/users" @if ($p == "users") class="active" @endif>Пользователи</a>
      @endcan
      @if (auth()->check())
        <a href="/bbcodes" @if ($p == "bbcodes") class="active" @endif>BBCode</a>
        <a href="/logout">Выход</a>
      @else
        <a href="/login" @if ($p == "login") class="active" @endif>Вход</a>
        <a href="/register" @if ($p == "register") class="active" @endif>Регистрация</a>
      @endif
    </nav>
    <section>
      @if (session('status'))
        <p>{{ session('status') }}</p>
      @endif
      @yield("main")
    </section>
    <footer>
      <p>© коллектив разработчиков сайта, 2017&nbsp;г.</p>
    </footer>
  </body>
</html>
