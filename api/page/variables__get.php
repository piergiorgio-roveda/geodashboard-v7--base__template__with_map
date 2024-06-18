<?php 

function _init($ds){
  return page__variables__get($ds["map__slug"]);
}

function page__variables__get($_map__slug){

  $i=0;
  $_features=array();

  // --- Ready for Loop!
    $i++;
    $_p = array();

    // --- Ready for Columns Loop!
      $_p['aaa'] = 'BBB';
      $_p['bbb'] = 'CCC';
      $_p['ccc'] = 'DDD';
      $_p['map_version'] = '1';
      $_p['g_template'] = 'base';
      $_p['title_seo'] = 'Base Template with Map';
      $_p['g_description_short'] = 'MapBox maps with [GEO]DASHBOARD.';
      $_p['g_description'] = 'Here is the solution: Generate your MapBox maps with the power of [GEO]DASHBOARD.';
      $_p['lng__start'] = '0';
      $_p['lat__start'] = '0';
      $_p['zoom__start'] = '0';
    // --- Columns Loop --END

    $_marker = array(
      'type' => 'Feature',
      'properties' => $_p
    );
    unset($_p);

    $_features[] = $_marker;
    unset($_marker);
  // --- Loop --END

  $o = array();
  $o['type']="FeatureCollection";
  $o['records']=$i;
  $o['features']=$_features;
  unset($_features,$i);
  $o['response'] = 200;

  return $o;

}