<template>
  <portable-text
    :blocks="blocks"
    :serializers="serializers"
    :projectId="$static.metadata.sanityOptions.projectId"
    :dataset="$static.metadata.sanityOptions.dataset"
  />
</template>

<script>
import VideoEmbed from '~/components/VideoEmbed'
import PortableText from 'sanity-blocks-vue-component'

/*

https://github.com/rdunk/sanity-blocks-vue-component

*/
export default {
  props: {
    blocks: Array
  },
  components: {
    VideoEmbed,
    PortableText
  },
  data() {
    return {
      serializers: {
        types: {
          mainImage: ({ node }) => (
            <figure>
              <img
                src={this.$urlForImage(node, this.$static.metadata.sanityOptions)
                  .auto('format')
                  .url()}
                alt={node.alt}
              />
              <figcaption>{node.caption}</figcaption>
            </figure>
          ),
          authorReference: ({ node }) => (
            <span> AUTOR {node._ref} </span>  
          ),
          post: ({ node }) => (
            <div class="teaser">
              <h2>{node.title}</h2><a href={node.path}>read more</a>
            </div>
          ),
          videoEmbed: VideoEmbed
        },
      marks: {
          authorLink: ({mark, children}) => {
            
            const ref = mark.reference // slug.current vs path
            console.log(ref)
            const href = `${ref.path}`
            return <g-link to={href}>{children}</g-link>
          }
        }

      }
    }
  },
  mounted(){
    console.log("mounted", this.blocks)
  }
}
</script>

<static-query>
  {
    metadata{
    sanityOptions{
      projectId
      dataset
    }
  }
}
</static-query>
