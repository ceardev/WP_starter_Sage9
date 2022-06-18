//Globals
// import ScrollReveal from 'scrollreveal';
import env from '../libs/env';
import Breakpoint from '../libs/breakpoint';
require('../libs/select2.min');

//Modules
import Components from '../modules/Components';

export default {
    init() {
    		window.ajax_obj = {"ajax_url":"/wp-admin/admin-ajax.php"};

        //Add globals to window
        window.env = env;

        // JavaScript to be fired on all pages
        this.breakpoint = new Breakpoint();
        window.bp = this.breakpoint;

        this.components = new Components();

        // Custom Select
        $('.js-select').select2({
            minimumResultsForSearch: -1
        });

        // Scroll Reveal
        let slideUp = {
            distance: '8%',
            origin: 'bottom',
            duration: 1000,
            interval: 100,
            viewFactor: 0.3,
            mobile: false
        };

        let fadeIn = {
            opacity: 0,
            duration: 1000,
            interval: 100,
            viewFactor: 0.3,
            mobile: false
        };

        ScrollReveal().reveal('.slideUp', slideUp);
        ScrollReveal().reveal('.fadeIn', fadeIn);
        ScrollReveal().reveal('.scaleRight', {
            opacity: 1,
            viewFactor: 0,
            beforeReveal: function (el) {
                $('.scaleRight').addClass('is-visible');
            }
        });

        if($(window).outerWidth() < 992) {
            ScrollReveal().destroy();
        }

        // Newsletter
        $('.js-form-newsletter').submit(function(){
					$.post({
						url: window.ajax_obj.ajax_url,
				    type: 'POST',
				    data: {
				    	action: 'newsletter',
				    	email: $('#newsletter-email').val(),
				    	lang: $('body').attr('lang')
				    }
				  })
					.done(function(data) {
						$('.js-form-newsletter')[0].reset();
						$('.p-success').show();
				  })
				  .fail(function(err) {
				  	console.log('-- Error', err);
				  });

					return false;
				});
    },
    finalize(fired) {
        // Auto-resize all init route
        $(window).on('resize', () => this.resize(fired));
        //Trigger first resize
        $(window).trigger('resize');
    },
    resize(fired) {
        //Resize Breakpoint
        this.breakpoint.resize();
        //Resize current page js
        fired.forEach(function(value) {
            let cond = (typeof value.resize === 'function');
            if(cond) value.resize();
        });
        //Resize Components
        this.components.resize();
    },
};
