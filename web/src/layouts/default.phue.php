<!DOCTYPE html>
<html lang="de">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  <link rel="SHORTCUT ICON" type="image/png" :href="path_asset('/gfx/favicon.png')">
  <link rel="stylesheet" :href="path_asset('/css/kpv.css')" type="text/css">
  <title>{{doc_title}}</title>
  <phuety.assets head></phuety.assets>
</head>

<body>
  <div class="layout">
    <header class="header">
      <strong>
        <a href="/" title="home" :html="doc_title"></a>
      </strong>
    </header>
    <slot.></slot.>
    <footer>
      <p class="home-links"><br>

        <span :foreach="footer as section">

          <a :href="path(section.doc)"
            :html="section?.title??section?.doc?.title">
          </a>&nbsp;&nbsp;&nbsp;
        </span>
        <br><br><br>

      </p>
    </footer>
  </div>
</body>
<script :src="path_asset('/js/app.js')"></script>

</html>

<?php
$settings = $helper->get('siteSettings');
$doc_title = $settings->title;

// $nav = $ref($settings['nav_main']);
$nav = ['items' => []];
$xfooter = function () use ($settings, $helper) {
  foreach ($settings->footer as $section) {
    $section->doc = $helper->ref($section->ref);
    yield $section;
  }
};

$footer = array_map(function ($section) use ($helper) {
  $section->doc = $helper->ref($section->ref);
  return $section;
}, $settings->footer);
