/* eslint-disable */
class Breakpoint {

    constructor() {
        // Init variables
        this._value = null;
        this._lastValue = null;
        this.messages = {
            noCSS: 'BREAKPOINT: Warning no breakpoint set with CSS inside body:before',
        };

        this.init();
    }

  /******************************/
  /* Getters                    */
  /******************************/
    get value() {
        if (this._value === null) {
            console.info(this.messages.noCSS);
            return false;
        } else {
            return this._value;
        }
    }

    get lastValue() {
        if (this._lastValue === null) {
            return false;
        } else {
            return this._lastValue;
        }
    }

  /******************************/
  /* Setters                    */
  /******************************/
    set value(val) {
        this._value = val;
    }

    set lastValue(val) {
        this._lastValue = val;
    }

  /******************************/
  /* Functions                  */
  /******************************/
    init() {    
        //Initial resize
        this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');

        // Check if values has been set inside CSS
        this.value;
    }

    resize() {
        // Save last breakpoint value
        this.lastValue = this.value;

        // Refresh breakpoint active value
        this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');
    }
}

export default Breakpoint;