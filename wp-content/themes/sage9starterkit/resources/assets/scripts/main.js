// import external dependencies
import $ from 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';

// Force CSS update
// https://github.com/webpack-contrib/extract-text-webpack-plugin/issues/30#issuecomment-256958209
if (process.env.NODE_ENV !== 'production') {
  if (module.hot) {
    const reporter = window.__webpack_hot_middleware_reporter__
    const success = reporter.success
    reporter.success = function () {
      document.querySelectorAll('[id*="sage"]').forEach((link) => {
        const nextStyleHref = link.href.replace(/(\?\d+)?$/, `?${Date.now()}`)
        link.href = nextStyleHref
      })
      success()
    }
  }
}


/** Populate Router instance with DOM routes */
const routes = new Router({
	// All pages
	common,
	// Home page
	home
});

// Load Events
$(document).ready(() => routes.loadEvents());
