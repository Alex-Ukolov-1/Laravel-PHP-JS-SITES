@extends("layouts.pc")

@push("head")
  <script src="/js/pc.js"></script>
@endpush

@section("title", "Комментарии")
@section("main")
  <h1>Комментарии</h1>
  <form action="/comments" method="get">
    <input type="text" name="search" value="{{ request()->input('search') }}"
    class="wide">
    <label>Показывать только скрытые</label>
    <input type="checkbox" name="hdn" value="1"
    @if (request()->has('hdn')) checked @endif>
    <input type="submit" value="Найти">
  </form>
  @foreach ($comments as $comment)
    <article class="comment">
      <?php
        $params = [
          "comment" => $comment->id,
          "page" => (request()->has("page")) ? request()->input("page") : 1,
        ];
        if (request()->has("search")) {
          $params["search"] = request()->input("search");
        }
        if (request()->has("hdn")) {
          $params["hdn"] = 1;
        }
      ?>
      @if ($comment->hidden)
        <p class="comment-hidden">Комментарий скрыт</p>
      @endif
      <p class="author-created">{{ $comment->author }}
      ({{ $comment->email }}) ||
      {{ date_format($comment->created_at, "j.m.Y G:i") }}</p>
      {!! $comment->formatted_content !!}
      @if ($comment->hidden)
        <p class="comment-hidden">Комментарий скрыт</p>
      @endif
      @can("manipulate", $comment)
        <div class="links">
          <a href=" {{ action('CommentController@input', $params) }}">Исправить</a>
          <a href=" {{ action('CommentController@destroy', $params) }}"
          class="adel">Удалить</a>
        </div>
      @endcan
    </article>
  @endforeach
  {{ $comments->links() }}
@endsection
