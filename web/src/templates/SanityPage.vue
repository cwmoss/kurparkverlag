<template>
  <Layout>
    
    
    <h1>{{$page.post.title}}</h1>
        

      <sections :sections="$page.post.sections">
      </sections>
        


  </Layout>
</template>


<script>
import Sections from '~/components/Sections'




export default {
  components: {
    Sections
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
  post: sanityPage (id: $id) {
    title
    sections{
      title
      ref{

        ... on SanityTour{
          _type
          title
          events{
            start, city, location
          }
        }
        ... on SanityPost{
        _type
          title
          _rawBody(resolveReferences: {maxDepth: 5})
          mainImage{
            asset {
              _id
              url
            }
            caption
          }
        }
        ... on SanityAuthor{
        _type
          name
          _rawBio(resolveReferences: {maxDepth: 5})
          mainImage{
            asset {
              _id
              url
            }
            caption
          }
        }
      }
    }
  }
}
</page-query>