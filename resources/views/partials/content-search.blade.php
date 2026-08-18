<article @php(post_class('w-full rounded-xl border border-base-content/10 p-4 font-work'))>
  @if (has_post_thumbnail())
    <a href="{{ get_permalink() }}">
      {!! get_the_post_thumbnail(null, 'medium_large', ['class' => 'aspect-[3/2] w-full rounded-xl object-cover']) !!}
    </a>
  @else
    <a href="{{ get_permalink() }}" class="flex aspect-[3/2] w-full items-center justify-center rounded-xl bg-base-200" aria-hidden="true">
      <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-base-content/20"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="m21 15-4.35-4.35L11 19"/></svg>
    </a>
  @endif

  <div class="px-2 py-6">
    @foreach (get_the_category() as $category)
      @if ($loop->first)
        <a href="{{ esc_url(get_category_link($category)) }}" class="w-fit rounded-md bg-primary/5 px-3 py-2 text-sm font-medium capitalize text-primary transition hover:bg-primary hover:text-white">{{ $category->name }}</a>
      @endif
    @endforeach

    <h2 class="entry-title mt-2">
      <a href="{{ get_permalink() }}" class="font-semibold text-base-content transition-all duration-300 ease-in-out hover:text-primary lg:text-2xl md:text-xl text-lg">{!! $title !!}</a>
    </h2>

    @includeWhen(get_post_type() === 'post', 'partials.entry-meta')
  </div>
</article>
