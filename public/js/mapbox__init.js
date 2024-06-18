import { mymap__ready__set,mymap__set } from './mapState.js';
import { d004__check_element__exist } from './d004__check_element__exist.js';

export async function mapbox__init(){

  let _ready = await d004__check_element__exist($('#mapid'));

  if(_ready == true){
    mapbox__prepare();
  }

}

async function mapbox__prepare(){


  let options = {
    container: 'mapid', // container ID
    center: [CENTER__LNG, CENTER__LAT],
    zoom: ZOOM,
    maxZoom: 22,
    minZoom: 1,
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    // style: 'mapbox://styles/mapbox/streets-v12'
    style: 'mapbox://styles/mapbox/streets-v12'

  }

  options.useWebGL2 = true;
  mapboxgl.accessToken = MAPBOXGL_KEY;
  let _mymap = new mapboxgl.Map(options);
  $('.mapboxgl-ctrl-attrib').remove(); // Remove Mapbox attribution
  mymap__set(_mymap);

  _mymap.on('load', () => {

    //   mymap.setCenter([9,45]);
    //   mymap.setZoom(12);
    mymap__ready__set(true);
    $('.mainmap__loading').toggle();

    _mymap.setCenter([
      parseFloat(localStorage.map_lng),
      parseFloat(localStorage.map_lat)
    ]);
    _mymap.setZoom(localStorage.map_zoom);

    _mymap.on('moveend', () => {
      localStorage.map_lng = _mymap.getCenter().lng;
      localStorage.map_lat = _mymap.getCenter().lat;
      localStorage.map_zoom = _mymap.getZoom();
    });

    _mymap.on('zoomend', () => {
      localStorage.map_zoom = _mymap.getZoom();
    });

  });




}