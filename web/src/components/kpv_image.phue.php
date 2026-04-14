<?php
// $image_tag($img, 'post', ['alt' => $doc['mainImage']['caption']]
print $helper->image_tag((array) $props->image, $props->size, ["alt" => $props->alt]);
