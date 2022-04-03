<?php
layout("default");

?>
    
    
<h1><?=$page['title']?></h1>
    
<div class="sections">
  <?foreach($page['sections'] as $section){?>

      <?=$partial('section', ['section'=>$section])?>
  
  <?}?>
</div>

