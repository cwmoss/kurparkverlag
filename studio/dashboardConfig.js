export default {
  widgets: [

    {name: 'structure-menu'},

    {
      name: 'project-info',
      options: {
        __experimental_before: [
         /* 
          {
            name: 'netlify',
            options: {
              description:
                'NOTE: Because these sites are static builds, they need to be re-deployed to see the changes when documents are published.',
              sites: [
                {
                  buildHookId: '5dfbb5bb9339f3d662932a63',
                  title: 'Sanity Studio',
                  name: 'kurparkverlag-gs-studio',
                  apiId: '6886f25c-79b8-48db-a924-5d0ac3e15057'
                },
                {
                  buildHookId: '5dfbb5bb11853bfb6646c868',
                  title: 'Blog Website',
                  name: 'kurparkverlag-gs',
                  apiId: '7b07a7d4-b202-4459-88f6-133b493e7207'
                }
              ]
            }
          },
          */
          {name: 'deploybutton', layout: {height: 'auto'}, options: {site: {name:'kpv', key:'555-xDGEw'}}}
        ],
        data: [
          {
            title: 'GitHub repo',
            value: 'https://github.com/cwmoss/kurparkverlag-gs',
            category: 'Code'
          },
       //   {title: 'Frontend', value: 'https://kurparkverlag-gs.netlify.com', category: 'apps'}
          {title: 'Frontend', value: 'https://kurparkverlag.de', category: 'apps'}
        ]
      }
    },
    {name: 'project-users', layout: {height: 'auto'}},
    {
      name: 'document-list',
      options: {title: 'Neueste Inhalte', order: '_createdAt desc', types: ['post']},
      layout: {width: 'medium'}
    }
  ]
}
