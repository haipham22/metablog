<footer class="content-info mt-24 bg-base-200 px-5 md:px-0 font-sans">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-5 py-16">
      <div class="col-span-12 lg:col-span-3">
        <p class="text-lg font-semibold">{!! $siteName !!}</p>
        <p class="mt-3 text-sm text-base-content/70">
          {{ __('A minimal blog theme ported from metablog-free.', 'metablog') }}
        </p>
      </div>

      <div class="flex justify-between gap-10 col-span-12 lg:col-span-5 lg:justify-center lg:gap-20">
        <div>
          <h3 class="mb-4 text-base font-semibold">{{ __('Quick Link', 'metablog') }}</h3>
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'space-y-3 text-sm', 'depth' => 1, 'echo' => false]) !!}
          @endif
        </div>

        <div>
          <h3 class="mb-4 text-base font-semibold">{{ __('Category', 'metablog') }}</h3>
          <ul class="space-y-3 text-sm">
            @foreach (get_categories(['orderby' => 'count', 'order' => 'DESC', 'number' => 6]) as $category)
              <li><a class="text-base-content/70 transition hover:text-primary" href="{{ esc_url(get_category_link($category)) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-span-12 lg:col-span-4">
        <div class="rounded-xl bg-base-100 px-9 py-8">
          <h3 class="text-base font-semibold">{{ __('Newsletter', 'metablog') }}</h3>
          <p class="mt-2 text-sm text-base-content/70">{{ __('Get the latest posts delivered to your inbox.', 'metablog') }}</p>
          <form method="get" action="{{ home_url('/') }}" class="mt-4 flex items-center gap-2 rounded-md border border-base-content/10 px-4 py-3">
            <svg width="18" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
            <input type="search" name="s" placeholder="{{ __('Email address', 'metablog') }}" class="w-full bg-base-100 text-base text-base-content outline-none placeholder:text-base" />
          </form>
          <button type="button" class="mt-2 w-full cursor-pointer rounded-md bg-primary py-3 text-center font-medium text-white transition hover:bg-primary-focus">
            {{ __('Subscribe', 'metablog') }}
          </button>
        </div>
      </div>
    </div>

    <div class="flex flex-col items-center justify-between gap-4 border-t border-base-content/10 py-8 md:flex-row md:gap-0">
      <p class="text-sm text-base-content/70">
        @php($copyright = get_theme_mod('metablog_footer_copyright'))
        @if ($copyright)
          {!! wp_kses($copyright, ['a' => ['href' => []], 'strong' => [], 'em' => []]) !!}
        @else
          &copy; {{ date('Y') }} {!! $siteName !!}. {{ __('All Rights Reserved.', 'metablog') }}
        @endif
      </p>
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'container' => false, 'menu_class' => 'footer-menu flex gap-6 text-sm', 'depth' => 1, 'echo' => false]) !!}
      @else
        <ul class="flex gap-6 text-sm">
          <li><a class="text-base-content/70 transition hover:text-primary" href="#">{{ __('Terms of Use', 'metablog') }}</a></li>
          <li><a class="text-base-content/70 transition hover:text-primary" href="#">{{ __('Privacy Policy', 'metablog') }}</a></li>
        </ul>
      @endif
    </div>
  </div>
</footer>
