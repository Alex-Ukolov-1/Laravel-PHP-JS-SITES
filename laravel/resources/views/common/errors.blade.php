@if ($errors->has($el))
  <div class="errors">{{ $errors->first($el) }}</div>
@endif
