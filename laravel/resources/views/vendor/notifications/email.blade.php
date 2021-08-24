<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>
    <h1><a href="{{ url('/') }}">Сайт электронных публикаций</a></h1>
    <h2>@if (! empty($greeting)) {{ $greeting }} @endif</h2>
    @foreach ($introLines as $line)
      <p>{{ $line }}</p>
    @endforeach
    @if (isset($actionText))
      <p style="font-size: larger;">
        <a href="{{ $actionUrl }}" target="_blank">{{ $actionText }}</a>
      </p>
    @endif
    @foreach ($outroLines as $line)
      <p>{{ $line }}</p>
    @endforeach
    <p>С уважением,<br>администрация сайта.</p>
  </body>
</html>
