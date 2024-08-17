// document schemas
import author from './documents/author'
import tour from './documents/tour'
import post from './documents/post'
import page from './documents/page'
import siteSettings from './documents/siteSettings'

// Object types
import videoEmbed from './objects/videoEmbed'
import bodyPortableText from './objects/bodyPortableText'
import bioPortableText from './objects/bioPortableText'
import excerptPortableText from './objects/excerptPortableText'
import mainImage from './objects/mainImage'
import authorReference from './objects/authorReference'
import termin from './objects/termin'
import section from './objects/section'
import sectionlink from './objects/sectionlink'

// Then we give our schema to the builder and provide the result to Sanity
export default [
  // The following are document types which will appear
  // in the studio.
  siteSettings,
  post,
  page,
  tour,
  author,
  mainImage,
  videoEmbed,
  authorReference,
  bodyPortableText,
  bioPortableText,
  excerptPortableText,
  termin,
  section,
  sectionlink,

  // When added to this list, object types can be used as
  // { type: 'typename' } in other document schemas
]
