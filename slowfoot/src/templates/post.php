<?php
if($page['is_page'] != true) return null;

layout("default");

?>
<br>
<a href="/" class="link">  &larr; Zurück</a>

<div class="post-title">
    <h1><?=$page['title']?></h1>
</div>

<div class="post-content">

    <?if($page['body']){?>
        <?=$partial('block', ['body'=>$page['body']])?>
    <?}?>  
 
</div>
