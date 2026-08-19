<header class="banner py-5">
  <div class="container mx-auto px-5 md:px-0 font-work">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-6 xl:col-span-2">
        @include('partials.brand')
      </div>

      @if (has_nav_menu('primary_navigation'))
        {{-- overflow clip (not auto): clips an over-long menu without creating a scroll
             container, so absolutely-positioned dropdown submenus still render --}}
        <nav class="nav-primary hidden min-w-0 overflow-x-clip xl:block col-span-9" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'nav flex w-full items-center justify-center gap-6', 'echo' => false]) !!}
        </nav>
      @endif

      <div class="col-span-6 xl:col-span-1 flex items-center justify-end gap-6">
        <form method="get" action="{{ home_url('/') }}" class="hidden 2xl:flex items-center gap-4 rounded-md bg-base-200 py-2 pl-4 pr-3">
          <input type="search" name="s" placeholder="{{ __('Search', 'metablog') }}"
            class="w-28 bg-base-200 font-work text-base text-base-content outline-none placeholder:font-work" />
          <button type="submit" aria-label="{{ __('Search', 'metablog') }}" class="cursor-pointer">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#52525B" stroke-width="2" aria-hidden="true">
              <circle cx="11" cy="11" r="7"/><path d="m21 21-4.35-4.35"/>
            </svg>
          </button>
        </form>

        <button type="button" data-theme-toggle aria-label="{{ __('Toggle theme', 'metablog') }}" class="flex h-9 w-9 cursor-pointer items-center justify-center rounded-full text-base-content transition hover:bg-base-200">
          {{-- palette icon, same as metablog-free's theme switcher --}}
          <svg width="20" height="20" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true">
            <path d="M441 336.2l-.06-.05c-9.93-9.18-22.78-11.34-32.16-12.92l-.69-.12c-9.05-1.49-10.48-2.5-14.58-6.17-2.44-2.17-5.35-5.65-5.35-9.94s2.91-7.77 5.34-9.94l30.28-26.87c25.92-22.91 40.2-53.66 40.2-86.59s-14.25-63.68-40.2-86.6c-35.89-31.59-85-49-138.37-49C223.72 48 162 71.37 116 112.11c-43.87 38.77-68 90.71-68 146.24s24.16 107.47 68 146.23c21.75 19.24 47.49 34.18 76.52 44.42a266.17 266.17 0 0086.87 15h1.81c61 0 119.09-20.57 159.39-56.4 9.7-8.56 15.15-20.83 15.34-34.56.21-14.17-5.37-27.95-14.93-36.84zM112 208a32 32 0 1132 32 32 32 0 01-32-32zm40 135a32 32 0 1132-32 32 32 0 01-32 32zm40-199a32 32 0 1132 32 32 32 0 01-32-32zm64 271a48 48 0 1148-48 48 48 0 01-48 48zm72-239a32 32 0 1132-32 32 32 0 01-32 32z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</header>
