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
 * /app/src/templates/page.phue.php ~ 
 */

class template_page_component extends component {
    public string $uid = "template_page---28cd75";
    public bool $is_layout = false;
    public string $name = "template_page";
    public string $tagname = "template.page";
    public bool $has_template = true;
    public bool $has_code = false;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = array (
  0 => 'layout.default',
  1 => 'kpv.article',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);
        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?php array_unshift($__s, []); ob_start(); ?>
  <h1><?= $__d->_get("page")->title ?></h1>

  <div class="sections">

    <?php if(($_loop_51ceafc2cdd23bb8 = $__d->_get("page")->sections) && ((!$_loop_51ceafc2cdd23bb8 instanceof \Generator && !$_loop_51ceafc2cdd23bb8 instanceof \Iterator) || $_loop_51ceafc2cdd23bb8->valid())) { foreach($_loop_51ceafc2cdd23bb8 as  $section){$__d->_add_block(["section"=>$section ]); ?><?php $__runner($__runner, "kpv.article", $__d->_get("phuety")->with($this->tagname, "kpv.article"), ["section"=> $__d->_get("section")] + array (
) ); ?><?php $__d->_remove_block();}}  ?>

  </div>
<?php $__runner($__runner, "layout.default", $__d->_get("phuety")->with($this->tagname, "layout.default"), ["page"=> $__d->_get("page")] + array (
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    // public function debug_info(){
    //    return /app/src/templates/page.phue.php ~ ;
    // }
}
