<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/basic.css" type="text/css">
    <link rel="stylesheet" href="/css/mobile.css" type="text/css">
    <link rel="stylesheet" href="/css/print.css" type="text/css" media="print">
		<script src="/js/main.js"></script>
    <title>@yield("title") :: СЭП</title>
  </head>
  <body>
    <header>
      <h1>СЭП: сайт электронных публикаций</h1>
    </header>
    <section>
      @yield("main")
    </section>
    <footer>
      <p>© коллектив разработчиков сайта, 2021&nbsp;г.</p>
    </footer>
  </body>
</html>
