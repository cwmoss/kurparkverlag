<template>
  <div>
    <div v-if="video.id">
    
      <div v-if="provider=='youtube'">
        <youtube :video-id="video.id"></youtube>
      </div>

      <div v-if="provider=='vimeo'">
        <vimeo :video-id="video.id" :options="vimeooptions"></vimeo>
      </div>

    </div>
  </div>
</template>

<script>


/*
npm install get-video-id vue-youtube vue-vimeo-player
*/

import { vueVimeoPlayer } from 'vue-vimeo-player'
import getVideoId from 'get-video-id'

export default {
  components: {
    'vimeo': vueVimeoPlayer
  },
  props: {
    url: {
      type: String,
    }
  },
  data(){
    return {
      video: {},
      vimeoid: '240646815',
       vimeooptions: {
        background:false, // hides the controls, autoplays and loops the video 
        responsive: true, // resize according to parent element (experimental)
        controls: true,
        title: false,
        byline: false,
        portrait: false,
        color: 'lightblue'
      }
    }
  },
  computed:{
    provider() {
      var url=this.url
      return url.match(/(youtube\.com)|(youtu\.be)/i)?'youtube'
        : url.match(/vimeo\.com/i)?'vimeo'
        : 'unkown'
    }
  },
  methods:{
    cancel: function(){
      this.$emit("cancel")
    }
  },
  mounted(){
    
    this.video = getVideoId(this.url)
    console.log("mounted", this.url, this.video)
  }
}

</script>