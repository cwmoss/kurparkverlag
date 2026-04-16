<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



class layout_default_component extends component {
    public string $uid = "layout_default---Hcr/e0";
    public bool $is_layout = true;
    public string $name = "layout_default";
    public string $tagname = "layout.default";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 2;
    public ?array $components = array (
  0 => 'phuety.assets',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);
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

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><!DOCTYPE html><html lang="de"><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  <?= tag::tag_open_merged_attrs("link", ["href"=> $__d->_call("path_asset")("/gfx/favicon.png")], array (
  'rel' => 'SHORTCUT ICON',
  'type' => 'image/png',
) ) ?>
  <?= tag::tag_open_merged_attrs("link", ["href"=> $__d->_call("path_asset")("/css/kpv.css")], array (
  'rel' => 'stylesheet',
  'type' => 'text/css',
) ) ?>
  <title><?= tag::h($__d->_get("doc_title")) ?></title>
  <?php $__runner($__runner, "phuety.assets", $__d->_get("phuety")->with($this->tagname, "phuety.assets"), [] + array (
  'head' => '',
) ); ?>


</head><body>
  <div class="layout">
    <header class="header">
      <strong>
        <a href="/" title="home"><?= $__d->_get("doc_title") ?></a>
      </strong>
    </header>
    <?=$slots["default"]??""?>
    <footer>
      <p class="home-links"><br>

        <?php foreach($__d->_get("footer") as  $section){$__d->_add_block(["section"=>$section ]); ?><span>

          <?= tag::tag_open_merged_attrs("a", ["href"=> $__d->_call("path")($__d->_get("section")->doc)], array (
) ) ?><?= (($__d->_get("section")?->title) ?? ($__d->_get("section")?->doc?->title)) ?></a>   
        </span><?php $__d->_remove_block();} ?>
        <br><br><br>

      </p>
    </footer>
  </div>

<?= tag::tag_open_merged_attrs("script", ["src"=> $__d->_call("path_asset")("/js/app.js")], array (
) ) ?></script>

</body></html><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/kurparkverlag/web/src/layouts/default.phue.php',
  'php' => 39,
);
    }
}
