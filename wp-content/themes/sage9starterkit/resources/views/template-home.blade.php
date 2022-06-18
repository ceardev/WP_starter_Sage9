{{--
  Template Name: Home
--}}

<!-- @extends('layouts.app') -->

@section('content')
 	@while (have_posts()) @php(the_post())
		@include('pages.content')
	@endwhile
@endsection
