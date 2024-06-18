<?php

$_map__slug = MAP_SLUG;

include(FLAT_FOLDER__API."functions.php");
include(FLAT_FOLDER__API."page/variables__get.php");

echo "<!--ap5/V7-->";
$CANONICAL = FLAT_URL;

$_variables = page__variables__get($_map__slug); // ($_map__slug);

$_page_attributes = array();
foreach ($_variables["features"] as $value) {
  foreach ($value["properties"] as $key => $val) {
    $_page_attributes[$key] = $val;
    echo "<!--data-".$key.":".$val."-->\n";
  }
}

// START CUSTOMIZATION!

$_project__url = FLAT_URL;
$_img__folder = FLAT_URL__ASSETS.'images/';
$_map__label = MAP_TITLE;

?>
<!doctype html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_map__label;?></title>
    <?php
      $_meta = array(
        array("name"=>"viewport", "content"=>"width=device-width"),
        array("name"=>"apple-mobile-web-app-capable", "content"=>"yes"),
        array("name"=>"apple-mobile-web-app-status-bar-style", "content"=>"black"),
        array("name"=>"google", "content"=>"notranslate"),
        array("name"=>"msapplication-TileColor", "content"=>MAIN_COLOR),
        array("name"=>"msapplication-config", "content"=>$_img__folder."browserconfig.xml"),
        array("name"=>"theme-color", "content"=>MAIN_COLOR),
      );
      foreach ($_meta as $key => $value) {
        echo '<meta name="'.$value["name"].'" content="'.$value["content"].'">
        ';
      }
      unset($_meta, $key, $value);
    ?>
    <?php
    $manifest = FLAT_URL.'manifest.json';
    ?>
    <link rel="manifest" href="<?php echo $manifest;?>?ver=<?php echo APP_VERSION."-".$_page_attributes["map_version"];?>">
    <?php include FLAT_FOLDER__PUBLIC."index_css.php"; ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA4_MEASUREMENT_ID;?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo GA4_MEASUREMENT_ID;?>', {'codename': 'Morpheus'});
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo GA4_TAGMANAGER;?>');</script>
    <!-- End Google Tag Manager -->

  </head>
  <body>
    <!-- page_client -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GA4_TAGMANAGER;?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php include FLAT_FOLDER__PUBLIC."index_template.php"; ?>
    <?php include FLAT_FOLDER__PUBLIC."index_js_project.php"; ?>
    <?php include FLAT_FOLDER__PUBLIC."index_js_libraries.php"; ?>
    <script type="module" src="<?php echo FLAT_URL__PUBLIC;?>js/_script.js"></script>

  </body>
</html>