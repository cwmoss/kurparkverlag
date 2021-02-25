<template>
  <Layout>

    <h1>Krimis für Genießer</h1>

    <article>

     <g-image src="~/cover-ritter-2.jpg" width="500" alt="cover ritter vom bka #2" />

     <h3>Ritter vom BKA #2</h3>

    <p>
      Kommissar Max Ritter arbeitet für das BKA und soll ungeklärte Mordfälle bearbeiten. Sein zweiter Fall führt ihn ausgerechnet in seine Heimat, den Schwarzwald. In Bad Wildbad wurde ein Polizist bei einer Verkehrskontrolle erschossen. Nach den ersten Recherchen wird schnell klar, dass jeder im Polizeirevier in den Mord verwickelt sein könnte, selbst der Polizeichef von  Wildbad hat möglicherweise ein Motiv. Die Beamten vor Ort mauern. Wie in   einem Wespennest stochern die Berliner Beamten im schwäbischen Polizeiapparat herum, stoßen dabei noch auf einen Waffennarr und dubiose Drogengeschäfte. Eine wahnsinnige Anspannung liegt auf dem Ermittler-Team.
    </p>

    </article>

   <article>

     <h2>Buchbestellung</h2>

    <p>Bitte senden Sie eine E-Mail an: <a href="mailto:kurparkverlag@gmail.com">kurparkverlag@gmail.com</a></p>
    <p>Ein Exemplar kostet 13,90 Euro zzgl. 2,70 Euro Versand</p>
     

    </article>
    
    <article>
      <figure>
        <g-image src="~/max-mueller-by-ivo-casagranda.jpg" width="500" alt="autorenportrait max müller, fotograf: ivo casagranda" />
        <figcaption>&copy; Ivo Casagranda</figcaption>
      </figure>
     <h2>Über den Autor</h2>

    <p>
     Max Müller wurde 1964 in Pforzheim geboren und lebte in Barcelona, Leipzig und mehr als zwanzig Jahre in Berlin. Müller legte 30 Jahre als DJ Mad Max in Techno-Clubs rund um den Globus auf. Jetzt schreibt er Kriminalromane. 2018 erschien sein erstes Buch „Ritter vom BKA #1"
    </p>

    </article>

 

    <article>

     <h2>Ritter ON TOUR</h2>

    <p>Lesung Ritter vom BKA #2<br><br>
      16.02.2020 <strong>Pforzheim</strong> - Roland<br>

26.02.2020 <strong>Bad Wildbad</strong> - Bellevue<br>

28.02.2020 <strong>Karlsruhe</strong> - Coffee in<br>

05.03.2020 <strong>Berlin</strong> – L.U.X.<br>

10.03.2020 <strong>Leipzig</strong> – Pension Alte Messe<br>

27.03.2020 <strong>Schwann</strong> - Zauberberg<br>
    </p>
     

    </article>
  </Layout>
</template>

<static-query>
query {
  metadata {
    siteUrl
  }
}
</static-query>

<script>
export default {
  metaInfo() {

    var res = require('!!assets-loader?width=500!~/cover-ritter-2.jpg')
    // console.log("res:", res)

    var img = "" + this.$static.metadata.siteUrl + res.src

    return {
      title: 'Kurpark Verlag',
      meta: [
          { property: 'og:title', content: 'Ritter vom BKA #2' },
          { property: 'og:description', 
              content: 'Kommissar Max Ritter arbeitet für das BKA und soll ungeklärte Mordfälle bearbeiten. Sein zweiter Fall führt ihn ausgerechnet in seine Heimat, den Schwarzwald.' },

          { property: 'og:image', content: img}
        ]
    }
  }
}
</script>

<style>
.home-links a {
  margin-right: 1rem;
}
</style>
