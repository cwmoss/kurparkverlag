<template>
  <portable-text
    :blocks="blocks"
    :serializers="serializers"
    :projectId="$static.metadata.sanityOptions.projectId"
    :dataset="$static.metadata.sanityOptions.dataset"
  />
</template>

<script>
import PortableText from 'sanity-blocks-vue-component'

export default {
  props: {
    blocks: Array
  },
  components: {
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
          )
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
