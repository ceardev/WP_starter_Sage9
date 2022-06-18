{{--
  Template Name: Demo
--}}


@extends('layouts.app')

@section('content')
 	@while (have_posts()) @php(the_post())
 		@php
 			$fields = get_fields();
		@endphp




		@include('modules.demo_module')


		@include('modules.demo_module', ['data' => 'firstDATA'])


		


 		
	@endwhile
@endsection
