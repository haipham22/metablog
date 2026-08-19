<div class="e-content">
  @php(the_content())
</div>

@if ($pagination())
  <nav class="page-nav mt-8" aria-label="Page">
    {!! $pagination !!}
  </nav>
@endif
