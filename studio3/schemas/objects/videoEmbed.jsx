import React from 'react'
import getVideoId from 'get-video-id';

const VideoEmbedPreview = (props) => {
    // console.log("+++ preview props", props)
    // return (<div></div>)

    const url = props.url
    const responsiveVideoContainer = {
        padding: "56.25% 0 0 0",
        position: "relative"
    }

    const responsiveVideoPlayer = {
        position: "absolute",
        top: 0, 
        left: 0,
        width: "100%",
        height: "100%"
    }

    if (url) {

        // install https://www.npmjs.com/package/get-video-id, to get Vimeo or YouTube IDs
        // const getVideoId = require('get-video-id')

        const id = getVideoId(url).id
        const service = getVideoId(url).service
    
        //const id = '5uN3n-NjLHc&list=RD5uN3n-NjLHc' // getVideoId(url).id
        //const service = 'youtube' // getVideoId(url).service

        const vimeoEmbedUrl = 'https://player.vimeo.com/video/' + id
        const youtubeEmbedUrl = 'https://www.youtube.com/embed/' + id
    
    
        if (!id) {
            return <div>Missing YouTube or Vimeo URL</div>
        }
    
        if (service === 'vimeo') {
            return (
                <div style={responsiveVideoContainer}>
                <iframe src={vimeoEmbedUrl} style={responsiveVideoPlayer} frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
            )
        }
    
        if (service === 'youtube') {
            return (
                <div style={responsiveVideoContainer}>
                <iframe src={youtubeEmbedUrl} style={responsiveVideoPlayer} frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            )
        }
    } 

    return <div></div>
    
}

export default {
    name: 'videoEmbed',
    type: 'object',
    title: 'Video Embed',
    fields: [
        {
            name: 'url',
            type: 'url',
            title: 'URL'
        }
    ],
    preview: {
        select: {
            url: 'url'
        },
    },
    components: {
        preview: VideoEmbedPreview
    }
}