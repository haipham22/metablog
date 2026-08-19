@extends('layouts.app')

@section('content')
  <div class="container mx-auto mt-12 px-5 font-work md:w-10/12 md:px-0 lg:w-5/12">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
    @endwhile
  </div>
@endsection
