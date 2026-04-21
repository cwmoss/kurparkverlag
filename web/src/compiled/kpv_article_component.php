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
 * /Users/rw/dev/kurparkverlag/web/src/components/kpv_article.phue.php ~ 26
 */

class kpv_article_component extends component {
    public string $uid = "kpv_article---dd67e0";
    public bool $is_layout = false;
    public string $name = "kpv_article";
    public string $tagname = "kpv.article";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = array (
  0 => 'kpv.image',
  1 => 'sanity.text',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): ?array{
        // dbg("++ props for component", $this->name, $props);
$doc = $helper->ref($props->section->ref);
$title = $props->section->title ?? ($doc->title ?? $doc->name);
$img = null;
if ($doc->mainImage->asset ?? null) $img = $helper->ref($doc->mainImage->asset);
$fmt_date = function ($t) {
  return date('d.m.Y', strtotime($t));
};

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?= tag::tag_open_merged_attrs("article", [], array (
) , $__d->_get("props")) ?>

  <?php if($__d->_get("img")){ ?><?php $__runner($__runner, "kpv.image", $__d->_get("phuety")->with($this->tagname, "kpv.image"), ["image"=> $__d->_get("img"), "alt"=> (($__d->_get("doc")->mainImage->caption) ?? (""))] + array (
  'size' => 'post',
) ); ?><?php } ?>
  <h2><?= $__d->_get("title") ?></h2>

  <div>
    <?php if(($__d->_get("doc")->_type == "tour")){ ?>
      <p><?= $__d->_get("doc")->title ?></p>
      <table class="termine">
        <tbody>
          <?php if(($_loop_516b51f35cf4d592 = $__d->_get("doc")->events) && ((!$_loop_516b51f35cf4d592 instanceof \Generator && !$_loop_516b51f35cf4d592 instanceof \Iterator) || $_loop_516b51f35cf4d592->valid())) { foreach($_loop_516b51f35cf4d592 as  $termin){$__d->_add_block(["termin"=>$termin ]); ?><tr>
            <td><?= tag::h($__d->_call("fmt_date")($__d->_get("termin")->start)) ?></td>
            <td><strong><?= tag::h($__d->_get("termin")->city) ?></strong></td>
            <td><?= tag::h($__d->_get("termin")->location) ?></td>
          </tr><?php $__d->_remove_block();}}  ?>
        </tbody>
      </table>
    <?php } ?>
    <?php if(($__d->_get("doc")->_type == "author")){ ?>
      <?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("doc")->bio] + array (
) ); ?>
    <?php } ?>
    <?php if(($__d->_get("doc")->_type == "post")){ ?>
      <?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("doc")->body] + array (
) ); ?>
    <?php } ?>

</div></article><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    // public function debug_info(){
    //    return /Users/rw/dev/kurparkverlag/web/src/components/kpv_article.phue.php ~ 26;
    // }
}
