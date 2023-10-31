export default {
  name: 'tour',
  title: 'Tour',
  type: 'document',
  fields: [
    {
      name: 'title',
      title: 'Title',
      type: 'string'
    },
    {
      name: 'slug',
      title: 'Slug',
      type: 'slug',
      options: {
        source: 'title',
        maxLength: 96
      }
    },
    {
      name: 'mainImage',
      title: 'Main image',
      type: 'image',
      options: {
        hotspot: true
      }
    },
    {
      title: "Termine",
      name: "events",
      type: 'array',
      of: [
        {
          type: "termin",
        }
      ],
      options:{
        // sortable: false,
         //editModal: 'popover'
        // layout: 'grid'
      }
    }
  ]
}