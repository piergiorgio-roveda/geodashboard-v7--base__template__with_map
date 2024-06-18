import { template__init } from './template__init.js';
import { mapbox__init } from './mapbox__init.js';
import { mymap__ready__set } from './mapState.js';

import { api__page } from './api__page.js';
const _api__page = new api__page();

// mymap__ready__set(false);

console.warn("Script Ready!");

mymap__ready__set(false);

function _init(){

  mapbox__init();
  template__init();

  // Load Data onStart for future use ...
  _api__page.attributes__init();

}

_init();