<form role="search" method="get" class="search-form flex items-center gap-4 rounded-md bg-base-200 py-2 pl-4 pr-3 font-work" action="{{ home_url('/') }}">
  <label class="flex-1">
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'metablog') }}
    </span>

    <input
      type="search"
      class="w-full bg-base-200 text-base text-base-content outline-none placeholder:font-work"
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'metablog') !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>

  <button type="submit" aria-label="{{ _x('Search', 'submit button', 'metablog') }}" class="cursor-pointer">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
      <circle cx="11" cy="11" r="7"/><path d="m21 21-4.35-4.35"/>
    </svg>
  </button>
</form>
