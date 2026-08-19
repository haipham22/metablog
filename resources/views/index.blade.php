@extends('layouts.app')

@php($heroPosts = is_home() && ! is_paged() ? new WP_Query(['posts_per_page' => 5, 'meta_key' => '_thumbnail_id', 'ignore_sticky_posts' => true]) : null)

@section('content')
  @if ($heroPosts && $heroPosts->have_posts())
    <section class="container mx-auto px-5 md:px-0">
      <div class="relative rounded-xl font-work" data-hero-slider>
        <div data-hero-track class="flex snap-x snap-mandatory overflow-x-auto scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
          @while($heroPosts->have_posts()) @php($heroPosts->the_post())
            <div class="relative w-full shrink-0 snap-start">
              {!! get_the_post_thumbnail(null, 'full', ['class' => 'aspect-[1216/600] w-full rounded-xl object-cover']) !!}

              <div class="absolute bottom-4 left-4 right-4 rounded-xl bg-base-100/95 p-4 shadow-[0_12px_24px_-6px] shadow-base-content/20 backdrop-blur md:left-14 md:w-7/12 md:p-8 lg:w-6/12">
                @foreach (get_the_category() as $category)
                  @if ($loop->first)
                    <a href="{{ esc_url(get_category_link($category)) }}" class="mb-4 w-fit rounded-md bg-primary px-2.5 py-1 text-xs font-medium text-white md:text-sm">{{ $category->name }}</a>
                  @endif
                @endforeach

                <h2>
                  <a href="{{ get_permalink() }}" class="text-xl font-semibold leading-5 text-base-content transition-all hover:text-primary hover:duration-500 md:text-2xl md:leading-10 lg:text-4xl">@php(the_title())</a>
                </h2>

                @include('partials.entry-meta')
              </div>
            </div>
          @endwhile
          @php(wp_reset_postdata())
        </div>

        <button type="button" data-hero-prev aria-label="{{ __('Previous slide', 'metablog') }}" class="absolute left-4 top-1/2 z-10 hidden h-10 w-10 -translate-y-1/2 cursor-pointer items-center justify-center rounded-full bg-base-100/90 text-base-content shadow-md transition hover:bg-primary hover:text-white md:flex">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <button type="button" data-hero-next aria-label="{{ __('Next slide', 'metablog') }}" class="absolute right-4 top-1/2 z-10 hidden h-10 w-10 -translate-y-1/2 cursor-pointer items-center justify-center rounded-full bg-base-100/90 text-base-content shadow-md transition hover:bg-primary hover:text-white md:flex">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
        </button>

        <div data-hero-dots class="absolute bottom-4 right-4 z-10 flex gap-2"></div>
      </div>
    </section>
  @else
    @include('partials.page-header')
  @endif

  <section class="container mx-auto {{ $heroPosts && $heroPosts->have_posts() ? 'mt-12' : 'mt-12' }} px-5 md:px-0">
    <h3 class="mb-8 font-work text-2xl font-bold leading-8 text-base-content">{{ __('Latest Post', 'metablog') }}</h3>

    @if (! have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'metablog') !!}
      </x-alert>

      {!! get_search_form(false) !!}
    @endif

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
    </div>

    {!! get_the_posts_navigation() !!}
  </section>
@endsection
