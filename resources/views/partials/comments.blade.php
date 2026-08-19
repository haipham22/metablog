@if (! post_password_required())
  <section id="comments" class="comments mt-16 border-t border-zinc-200 pt-10">
    @if ($responses())
      <h2 class="mb-8 text-2xl font-semibold tracking-tight text-zinc-900">
        {!! $title !!}
      </h2>

      <ol class="comment-list">
        {!! $responses !!}
      </ol>

      @if ($paginated())
        <nav aria-label="Comment">
          <ul class="pager mt-8 flex justify-between gap-4 text-sm">
            @if ($previous())
              <li class="previous">
                {!! $previous !!}
              </li>
            @endif

            @if ($next())
              <li class="next">
                {!! $next !!}
              </li>
            @endif
          </ul>
        </nav>
      @endif
    @endif

    @if ($closed())
      <x-alert type="warning">
        {!! __('Comments are closed.', 'metablog') !!}
      </x-alert>
    @endif

    @php(comment_form())
  </section>
@endif
