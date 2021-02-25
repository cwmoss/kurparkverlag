// This is the main.js file. Import global CSS and scripts here.
// The Client API can be used here. Learn more: gridsome.org/docs/client-api
import '~/kpv.scss'

import DefaultLayout from '~/layouts/Default.vue'

// Import image url builder
import urlForImage from './utils/urlForImage'

import VueYoutube from 'vue-youtube'

export default function (Vue, { router, head, isClient }) {
  // Set default layout as a global component
  Vue.component('Layout', DefaultLayout)
    // Inject global image URL builder
  Vue.prototype.$urlForImage = urlForImage

  Vue.use(VueYoutube)
}

