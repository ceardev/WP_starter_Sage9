//components
import Header from '../components/header';



const components = {
	'header' : Header,
};

class Components {

	constructor(params) {
		// Init variables
		if(params !== undefined) this.params = params; 
		this.$cache = {};
		this.instances = [];

		// Trigger init functions
		this.initCache();
		this.init();
	}

	/******************************/
	/* Init functions             */
	/******************************/
	initCache() {
		this.$cache.body = $('body');
		this.$cache.components = this.$cache.body.find('[data-component]');
	}

	resize() {
		$.each(this.instances, function() {
			let comp = this;
			let cond = (typeof comp.resize === 'function');
			if(cond) comp.resize();
		});
	}

	init(){
		this.$cache.components.each((index, element) => {
			let $el = $(element);
			let comp = $el.data('component');
          
			//Check if component exist
			if(typeof components[comp] !== 'function') return;
          
			// Component instantiation
			let obj = new components[comp]({target : $el});

			// Store instance in data
			$el.data('comp', obj);
			this.instances.push(obj);
        });
	}
}

export default Components;