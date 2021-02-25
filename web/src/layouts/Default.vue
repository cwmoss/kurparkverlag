<template>
  <div class="layout">
    <header class="header">
      <strong>
        <g-link to="/" title="home">{{ $static.metadata.siteName }}</g-link>
      </strong>
      
    </header>
    <slot/>
    <footer>
      <p class="home-links"><br>
        <span v-for="section in $static.footer.sections">
          <g-link :to="section.ref.path" :title="section.ref.title">{{section.title?section.title:section.ref.title}}</g-link>&nbsp;&nbsp;&nbsp;
        </span>
        <br><br><br>
      </p>
    </footer>
  </div>
</template>

<static-query>
query {
  metadata {
    siteName
  }

  footer: sanityPage(path:"/footer"){
      id
      title
      sections{
        _key
        title
        ref{
          ... on SanityPost{
            _type
            path
            title
          }
        }
      }
      slug{current}
   
  }
}
</static-query>

<style>
body {
  /*font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;*/
  margin:0;
  padding:0;
  line-height: 1.5;
}

.layout {
  max-width: 760px;
  margin: 0 auto;
  padding-left: 20px;
  padding-right: 20px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  height: 80px;
}

.nav__link {
  margin-left: 20px;
}
</style>
