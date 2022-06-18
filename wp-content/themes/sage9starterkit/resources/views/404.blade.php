@extends('layouts.app')

@section('content')
	<section class="banner-page">
	  <div class="container">
	    <div class="row justify-content-center">
	      <div class="banner-page__banner">
	        <img src="@asset("images/banners/content-banner.png")" alt="" class="img-fluid">
	      </div>
	      <div class="col-lg-6">
	          <div class="banner-page__title-wrapper justify-content-center">
	            <h1 class="banner-page__title">{{ __('404 Error', 'sage') }}</h1>
	          </div>
	          <div class="row justify-content-center banner-page__texts">
	            <div class="col-md-8 col-lg-10 col-xl-8 text-center">
		            <div class="banner-page__text">{{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}</div>

		            <a href="{{ get_field('button')['url'] }}" class="action" title="" role="link">
		              <span class="icon icon-arrow"></span>
		              {{ __('Back to homepage', 'sage') }}
		            </a>
	            </div>
	          </div>
	      </div>
	    </div>
	  </div>
	</section>
@endsection
