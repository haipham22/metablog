<div class="py-4 text-center font-work">
  <h1 class="text-3xl font-semibold text-base-content">{!! $title !!}</h1>
  <div class="mt-2 flex items-center justify-center text-base text-base-content/80">
    <a href="{{ home_url('/') }}" class="transition hover:text-primary">{{ __('Home', 'metablog') }}</a>
    <span class="mx-2" aria-hidden="true">&rsaquo;</span>
    <span>{!! $title !!}</span>
  </div>
</div>
