@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <section class="container mx-auto mt-12 px-5 md:px-0">
    @if (! have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'metablog') !!}
      </x-alert>

      {!! get_search_form(false) !!}
    @endif

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
      @while(have_posts()) @php(the_post())
        @include('partials.content-search')
      @endwhile
    </div>

    {!! get_the_posts_navigation() !!}
  </section>
@endsection
