<article @php(post_class('h-entry'))>
  @foreach (get_the_category() as $category)
    @if ($loop->first)
      <a href="{{ esc_url(get_category_link($category)) }}" class="w-fit rounded-md bg-primary/5 px-3 py-2 text-sm font-medium capitalize text-primary transition hover:bg-primary hover:text-white">{{ $category->name }}</a>
    @endif
  @endforeach

  <h1 class="p-name mt-4 text-3xl font-semibold leading-tight text-base-content md:text-4xl">
    {!! $title !!}
  </h1>

  <div class="mt-3 md:mt-6">
    @include('partials.entry-meta')
  </div>

  @if (has_post_thumbnail())
    <div class="mt-8">
      {!! get_the_post_thumbnail(null, 'large', ['class' => 'aspect-[400/231] w-full rounded-xl object-cover']) !!}
    </div>
  @endif

  <div class="e-content mt-8">
    @php(the_content())
  </div>

  @if ($pagination())
    <footer class="mt-8">
      <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
      </nav>
    </footer>
  @endif

  {!! get_the_post_navigation([
    'prev_text' => '<span class="nav-subtitle">' . __('← Previous article', 'metablog') . '</span><span class="nav-title">%title</span>',
    'next_text' => '<span class="nav-subtitle">' . __('Next article →', 'metablog') . '</span><span class="nav-title">%title</span>',
  ]) !!}

  @php(comments_template())
</article>
