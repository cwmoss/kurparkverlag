// This is where project configuration and plugin options are located. 
// Learn more: https://gridsome.org/docs/config

// Changes here require a server restart.
// To restart press CTRL + C in terminal and run `gridsome develop`
require('dotenv').config({
  path: `.env.${process.env.NODE_ENV || 'development'}`
})

const clientConfig = require('./client-config')

const isProd = process.env.NODE_ENV === 'production'

module.exports = {
  siteName: 'Kurpark Verlag',
  siteDescription: 'krimis, ritter vom bka, max müller, spannung, unterhaltung',
  //siteUrl: "http://localhost:8080",
  siteUrl: process.env.ROOT || "https://kurparkverlag.de",
  //pathPrefix: '/dev/ssg/robbie-wilhelm/dist',
  //siteUrl: "https://robbiewilhelm.com",
  pathPrefix: process.env.ROOT_PATH || '/t',
  
  templates: {
    SanityPost: '/p/:slug__current',
    SanityPage: '/:slug__current',
   /* SanityAuthor: [
      {
        path: '/author/:slug__current',
        component: './src/templates/Author.vue'
      }
    ]*/
  },


  plugins: [

    {
      use: 'gridsome-source-sanity',
      options: {
        ...clientConfig.sanity,
        typeName: 'Sanity',
        token: process.env.SANITY_TOKEN,
        overlayDrafts: !isProd,
        watchMode: !isProd
      }
    }
/*
  {
      use: '@gridsome/source-filesystem',
      options: {
        path: 'content/posts/ * * / *.md',
        typeName: 'Post',
        route: '/:slug'
      }
    }
*/
    ]
}
