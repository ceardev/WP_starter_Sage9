@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
		@include('pages.content-single-'.get_post_type())
	@endwhile
@endsection
