<layout.default :page="page">
  <h1 :html="page.title"></h1>

  <div class="sections">

    <kpv.article :foreach="page.sections as section" :section="section"></kpv.article>

  </div>
</layout.default>