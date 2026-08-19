@extends('layouts.app')

@section('content')
  <div class="container mx-auto mt-12 px-5 font-work md:w-10/12 md:px-0 lg:w-6/12">
    @include('partials.page-header')
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
  </div>
@endsection
