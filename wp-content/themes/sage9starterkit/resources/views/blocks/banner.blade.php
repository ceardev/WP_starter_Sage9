{{--
  Title: Bannière 
  Description: Affiche une bannière pleine écran
  Category: client_slug
  Icon: admin-comments
  Keywords: banner
  Mode: edit
  Align: full
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="banner-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="banner-page__banner">
        <img src="{{ get_field('bg_image') }}" alt="" class="img-fluid">
      </div>
      <div class="col-lg-6">
          <div class="banner-page__title-wrapper">
            <h1 class="banner-page__title slideUp">{!! nl2br(get_field('title')) !!}</h1>
          </div>
          <div class="row justify-content-between banner-page__texts">
            <div class="col-md-9 col-lg-12 col-xl-11">
              @if(!empty(get_field('text')))
                <div class="banner-page__text slideUp">{!! get_field('text') !!}</div>
              @endif

              @if(!empty(get_field('button')['url']))
                <a href="{{ get_field('button')['url'] }}" class="action slideUp" title="" role="link">
                  <span class="icon">
                    @include('svgs.icon-arrow')
                  </span>
                  <span class="action__text">
                   {{ get_field('button')['title'] }}
                  </span>                  
                </a>
              @endif
            </div>
          </div>
      </div>

      @if(!empty(get_field('text')))
        <div class="col-md-9 col-lg-6 col-xl-5 offset-xl-1">
          @include('partials.image-mask', [
            'image' => get_field('image'),
            'letter' => get_field('letter')
          ])
        </div>
      @endif
    </div>
  </div>
</section>