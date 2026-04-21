<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



/**
 * /Users/rw/dev/kurparkverlag/web/src/templates/post.phue.php ~ 13
 */

class template_post_component extends component {
    public string $uid = "template_post---bff6da";
    public bool $is_layout = false;
    public string $name = "template_post";
    public string $tagname = "template.post";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = array (
  0 => 'layout.default',
  1 => 'sanity.text',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): ?array{
        // dbg("++ props for component", $this->name, $props);
// if ($props->page->is_page != true) return null;

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?php array_unshift($__s, []); ob_start(); ?>

    <br>
    <a href="/" class="link"> ← Zurück</a>

    <div class="post-title">
        <h1><?= $__d->_get("page")->title ?></h1>
    </div>

    <div class="post-content">
        <?php if($__d->_get("page")->body){ ?><?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("page")->body] + array (
) ); ?><?php } ?>
    </div>
<?php $__runner($__runner, "layout.default", $__d->_get("phuety")->with($this->tagname, "layout.default"), ["page"=> $__d->_get("page")] + array (
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    // public function debug_info(){
    //    return /Users/rw/dev/kurparkverlag/web/src/templates/post.phue.php ~ 13;
    // }
}
