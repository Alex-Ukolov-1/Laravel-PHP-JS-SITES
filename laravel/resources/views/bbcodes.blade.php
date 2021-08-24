@extends(request()->route()->getController()->parentView)

@section("title", "Теги BBCode")
@section("main")
  <h1>Поддерживаемые теги BBCode</h1>
  <ul>
    <li>[b]<em>&lt;текст&gt;</em>[/b] - полужирный <em>текст</em>;</li>
    <li>[i]<em>&lt;текст&gt;</em>[/i] - курсивный <em>текст</em>;</li>
    <li>[url=<em>&lt;интернет-адрес&gt;</em>]<em>&lt;текст&gt;</em>[/url] - гиперссылка
    с заданными <em>текстом</em> и <em>интернет-адресом</em>;</li>
    <li>[center]<em>&lt;текст&gt;</em>[/center] - центрированный <em>текст</em>;</li>
    <li>[right]<em>&lt;текст&gt;</em>[/right] - <em>текст</em>, выровненный
    по правому краю;</li>
    <li>[h<em>&lt;уровень&gt;</em>]<em>&lt;текст&gt;</em>[/h<em>&lt;уровень&gt;</em>] -
    заголовок заданного <em>уровня</em>;</li>
    <li>[img]<em>&lt;интернет-адрес&gt;</em>[/img] - изображение с заданным
    <em>интернет-адресом</em>;</li>
    <li>[sign]<em>&lt;текст&gt;</em>[/sign] - подпись к изображению;</li>
    <li>[code]<em>&lt;текст&gt;</em>[/code] - текст фиксированного форматирования;</li>
    <li>[audio]<em>&lt;интернет-адрес&gt;</em>[/audio] - аудиоролик;</li>
    <li>[video]<em>&lt;интернет-адрес&gt;</em>[/video] - видеоролик;</li>
    <li>[spoiler=<em>&lt;заголовок&gt;</em>]<em>&lt;содержимое&gt;</em>[/spoiler] -
    спойлер;</li>
    <li>[lightbox=<em>&lt;интернет-адрес миниатюры&gt;</em>]<em>&lt;интернет-адрес
    основного изображения&gt;</em>[/lightbox] - лайтбокс.</li>
  </ul>
@endsection
