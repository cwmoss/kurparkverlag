<template>
  <div class="sections">
    <article v-for="section in sections">

          <img v-if="section.ref.mainImage" 
            :src="$urlForImage(section.ref.mainImage, $static.metadata.sanityOptions).width(600).auto('format').url()"
            width="500" :alt="section.ref.mainImage.caption" />

          <h2>{{section.title?section.title:section.ref.title?section.ref.title:section.ref.name}}</h2>
          
          <div v-if="section.ref._type=='tour'">
            <p>{{section.ref.title}}</p>
            <table class="termine">
              <tbody>
                <tr v-for="termin in section.ref.events">
                  <td>{{termin.start}}</td>
                  <td><strong>{{termin.city}}</strong></td>
                  <td>{{termin.location}}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div v-else-if="section.ref._type=='author'">
             <block-content
                class="post__content"
                :blocks="section.ref._rawBio"
                v-if="section.ref._rawBio"
              /> 
          </div>

          <div v-else>
             <block-content
                class="post__content"
                :blocks="section.ref._rawBody"
                v-if="section.ref._rawBody"
              /> 
          </div>

    </article>
  </div>
</template>

<script>
import BlockContent from '~/components/BlockContent'

export default {
  props: {
    sections: Array
  },
  components: {
    BlockContent
  },
  data() {
    return {
    
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