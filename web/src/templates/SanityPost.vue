<template>
  <Layout>
    <br>
    <g-link to="/" class="link">  &larr; Zurück</g-link>
    
    <div class="post-title">
      <h1>{{$page.post.title}}</h1>
    </div>
    
    <div class="post-content">  
       <block-content
        class="post__content"
        :blocks="$page.post._rawBody"
        v-if="$page.post._rawBody"
      />  
    </div>

  </Layout>
</template>


<script>
import BlockContent from '~/components/BlockContent'




export default {
  components: {
    BlockContent
  },
  data: function(){
    return {
      
    }
  },
  metaInfo() {
    return {
      title: this.$page.post.title,
      meta: [
        {
          name: 'description',
          content: this.$page.post.title
        }
      ]
    }
  }
}
</script>

<page-query>
query Post ($id: ID!) {
  metadata {
    sanityOptions {
      projectId
      dataset
    }
  }
  post: sanityPost (id: $id) {
    title
    
    _rawExcerpt
    
    _rawBody(resolveReferences: {maxDepth: 5})

    mainImage {
      asset {
        _id
        url
      }
      caption
      alt
      hotspot {
        x
        y
        height
        width
      }
      crop {
        top
        bottom
        left
        right
      }
    }
  }
}
</page-query>