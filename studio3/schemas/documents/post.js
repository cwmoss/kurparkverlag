import {format} from 'date-fns'

export default {
  name: 'post',
  type: 'document',
  title: 'Blog Post',
  fields: [
    {
      name: 'title',
      type: 'string',
      title: 'Title',
      description: 'Titles should be catchy, descriptive, and not too long'
    },
    {
      name: 'slug',
      type: 'slug',
      title: 'Slug',
      description: 'Some frontends will require a slug to be set to be able to show the post',
      options: {
        source: 'title',
        maxLength: 96
      }
    },
    {
      name: 'is_page',
      type: 'boolean',
      description:
        'Does it have a its own Page?',
      title: 'No / Yes',
      initialValue: false
    },
    {
      name: 'mainImage',
      type: 'mainImage',
      title: 'Main image'
    },
    
    {
      name: 'body',
      type: 'bodyPortableText',
      title: 'Body'
    },
    {
      name: 'excerpt',
      type: 'excerptPortableText',
      title: 'Excerpt',
      description:
        'This ends up on summary pages, on Google, when people share your post in social media.'
    },
  ],
  
  preview: {
    select: {
      title: 'title',
      slug: 'slug',
      media: 'mainImage'
    },
    prepare ({title = 'No title', slug = {}, media}) {
     // const dateSegment = format(publishedAt, 'YYYY/MM')
      const path = `/p/${slug.current}/`
      return {
        title,
        media,
        subtitle: path 
      }
    }
  }
}
