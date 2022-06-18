class Header {

  constructor (params) {
    this.$cache       = {};
    this.$cache.main  = params.target;

    // Trigger init functions
  	this.initCache();
  	this.initEventsConst();
    this.registerEvents();
    this.menuMobile();
  }

  initCache() {
  	this.$cache.window = $(window);
		this.$cache.html = $('html');
  	this.$cache.body = this.$cache.html.find('body');
  	this.$cache.wrap = this.$cache.body.find('.wrap');

  	this.$cache.window.height = this.$cache.window.height();
  	this.$cache.direction = 'start';
  	this.$cache.lastScrollTop = this.$cache.window.scrollTop();
  	this.$cache.opacity = false;

  	this.$cache.toggleMenu = this.$cache.main.find('.js-toggle-menu');
	}

  resize() {
  	//Event set in routes/common.js
  	//console.log('resize header');
  }

  initEventsConst() {
  	this.scrollEvent = () => this.fixedHeader();
  	this.toggleMenuEvent = () => this.toggleMenu();
  }

  registerEvents() {
		this.$cache.window.on('scroll', this.scrollEvent);
		this.$cache.toggleMenu.on('click', this.toggleMenuEvent);
	}

	//-- Fixed header
	fixedHeader() {
		let scrollTop = this.$cache.window.scrollTop();

      if(scrollTop == 0 ) {
        // initial 
        this.$cache.direction = 'up';
        this.$cache.main.removeClass('is-init is-fixed is-show');
        this.$cache.lastScrollTop = 0 ;

      }else if(scrollTop > 200){

          this.$cache.main.addClass('is-init');          

          if (scrollTop > this.$cache.lastScrollTop ) {
            // down
            this.$cache.main.removeClass('is-show');
            this.$cache.direction = 'down';
          } else if (scrollTop < this.$cache.lastScrollTop ) {
            // up
            this.$cache.main.addClass('is-fixed');
            this.$cache.main.addClass('is-show');
            this.$cache.direction = 'up';
          }

          this.$cache.lastScrollTop = scrollTop;
      }

	}

  // mobile eventClick submenu
  menuMobile(){

    $("li a").click(function (e) {
      e.preventDefault();
      $(this).parent().addClass('active');
      if($(this).parent().find('ul').length > 0){
          
          if ($(window).width() < 768) {
              $(this).click(function () {
                  window.location = this.href;
              });
          }else{
            window.location = this.href;
          }

      }else{
        window.location = this.href;
      }
           
    });
 
  }
  	// Toggle menu
	toggleMenu() {
		this.$cache.main.toggleClass('is-open');
		this.$cache.body.toggleClass('overflow-hidden');
  }

}

export default Header;