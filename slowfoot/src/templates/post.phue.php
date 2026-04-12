<layout.default :page="page">

    <br>
    <a href="/" class="link"> &larr; Zurück</a>

    <div class="post-title">
        <h1 :html="page.title"></h1>
    </div>

    <div class="post-content">
        <sanity.text :if="page.body" :block="page.body"></sanity.text>
    </div>
</layout.default>
<?php
// TODO: intercept page write
// if ($page['is_page'] != true) return null;
