<div class="mt-3 flex items-center gap-3 text-base-content/60 md:mt-6">
  {!! get_avatar(get_the_author_meta('ID'), 36, 'retro', '', ['class' => 'h-9 w-9 rounded-full']) !!}
  <div class="flex flex-col">
    <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="p-author h-card text-xs font-medium transition hover:text-primary hover:duration-300 md:text-sm">
      {{ get_the_author() }}
    </a>
    <time class="dt-published text-xs md:text-sm" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
  </div>
</div>
