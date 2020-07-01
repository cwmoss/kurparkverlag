<template>
  <Layout>
    <br>
    <g-link to="/" class="link">  &larr; Zurück</g-link>
    
    <div class="post-title">
      <h1>{{$page.post.title}}</h1>
        
    </div>
    
    <div class="post-content">
      <p v-html="$page.post.content" />
    </div>
  </Layout>
</template>


<page-query>
query Post ($path: String!) {
   post: post (path: $path) {
    id
    title
    content
  }
}
</page-query>
