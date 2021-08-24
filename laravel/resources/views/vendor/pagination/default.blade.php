@if ($paginator->hasPages())
  <div class="pagination">
    @foreach ($elements as $element)
      @if (is_string($element))
        {{ $element }}&nbsp;&nbsp;
      @endif

      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            {{ $page }}&nbsp;&nbsp;
          @else
            <a href="{{ $url }}">{{ $page }}</a>&nbsp;&nbsp;
          @endif
        @endforeach
      @endif
    @endforeach
  </div>
@endif
