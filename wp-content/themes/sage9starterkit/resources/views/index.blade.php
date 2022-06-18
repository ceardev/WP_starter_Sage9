@extends('layouts.app')

@section('content')
    @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
    @endif
		
	
		@if(is_home())
			@include('pages.content-posts')
		@else
	    @while (have_posts()) @php(the_post())
	        @include('pages.content-page')
	    @endwhile
	  @endif
@endsection
