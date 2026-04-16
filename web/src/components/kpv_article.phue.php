<article>

  <kpv.image :if="img" :image="img" size="post" :alt="doc.mainImage.caption??''"></kpv.image>
  <h2 :html="title"></h2>

  <div>
    <template. :if="doc._type == 'tour'">
      <p :html="doc.title"></p>
      <table class="termine">
        <tbody>
          <tr :foreach="doc.events as termin">
            <td>{{fmt_date(termin.start)}}</td>
            <td><strong>{{termin.city}}</strong></td>
            <td>{{termin.location}}</td>
          </tr>
        </tbody>
      </table>
    </template.>
    <template. :if="doc._type == 'author'">
      <sanity.text :block="doc.bio"></sanity.text>
    </template.>
    <template. :if="doc._type == 'post'">
      <sanity.text :block="doc.body"></sanity.text>
    </template.>

</article>
<?php
$doc = $helper->ref($props->section->ref);
$title = $props->section->title ?? ($doc->title ?? $doc->name);
$img = null;
if ($doc->mainImage->asset ?? null) $img = $helper->ref($doc->mainImage->asset);
$fmt_date = function ($t) {
  return date('d.m.Y', strtotime($t));
};
