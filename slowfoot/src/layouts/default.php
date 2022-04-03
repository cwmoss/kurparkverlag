<?php
$settings = $get('siteSettings');

$title = $settings['title'];
$nav = $ref($settings['nav_main']);
$nav = ['items'=>[]];
debug_js('context', $_context);
debug_js('settings', $settings);
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="SHORTCUT ICON" type="image/png" href="/gfx/favicon.png">
    <link rel="stylesheet" href="<?=path_asset('/css/kpv.css', true)?>" type="text/css">
    
    
    <title><?=$title?></title>

</head>
<body>
  <div class="layout">
    <header class="header">
      <strong>
        <a href="/" title="home"><?=$title?></a>
      </strong>
      
    </header>
    <?=$content?>
    <footer>
      <p class="home-links"><br>
      <?foreach($settings['footer'] as $fsection){
        $doc = $ref($fsection['ref']);
        ?>
        <span>
          <a href="<?=$path($doc)?>"><?=$fsection['title']?:$doc['title']?></a>&nbsp;&nbsp;&nbsp;
        </span>
        <?}?>
        <br><br><br>
      
      </p>
    </footer>
  </div>
</body>
<script src="<?=path_asset('/js/app.js')?>"></script>
</html>


