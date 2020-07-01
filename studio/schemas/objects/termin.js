export default {
  name: 'termin',
  type: 'object',
  title: 'Termin',

  fields: [
    {
      name: 'start',
      type: 'date',
      title: 'Start',
    },
    {
      name: 'city',
      type: 'string',
      title: 'Stadt',
    },
    {
      name: 'location',
      type: 'string',
      title: 'Ort',
    }
  ],
  preview: {
    select: {
      start: 'start',
      city: 'city',
      location: 'location'
    },
    prepare(selection) {
      const {start, city, location} = selection
      return {
        title: start.split('T')[0],
        subtitle: '' + city + ' - ' + location
      }
    }
  }
}
