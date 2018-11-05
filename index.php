<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Uusi joulutervehdys - Metropolian joulutervehdys</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC|Playfair+Display:400,700" rel="stylesheet">
    <link rel="stylesheet" href="public/css/foundation.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <main class="grid-container">
      <div class="grid-x grid-margin-x">
        <section class="cell medium-6">
          <article id="main_header" aria-labelledby="main-header-heading">
            <h1 id="main_header--heading">Metropolian joulu</h1>
            <p>
              Joulukortit ovat jouluisin lähetettäviä tervehdyksiä,
              joissa toivotetaan hyvää joulua. Useasti joulukorteissa toivotetaan
              myös hyvää uutta vuotta. Vuonna 2010 joulupukille
              lähetettiin noin 600 000 kirjettä ympäri maailmaa.
            </p>
          </article>
          <article id="form-area" aria-aria-labelledby="form-area-heading">
            <form id="sending-info-form" method="post">
              <input id="fuser" type="text" name="user" required="required" placeholder="Käyttäjä">
              <input id="fsender" type="text" name="sender" required="required" placeholder="Lähettäjä">
              <input id="freceiver" type="text" name="receiver" required="required" placeholder="Vastaanottaja">
              <input id="fmessage" type="text" name="message" required="required" placeholder="Viesti">
              <input type="submit" value="Jaettava linkki">
            </form>
          </article>
        </section>
        <section class="cell medium-6">
          <figure>
            <figcaption>Esikatselu:</figcaption>
            <video width="100%" controls>
              <source src="public/video/lapsuuden-haave.mp4" type="video/mp4">
            </video>
          </figure>
        </section>
      </div>
      <!-- SOCIAL MEDIA MODAL -->
      <div id="share-options" class="modal">
        <section id="share-options-content" class="modal-content" aria-labelledby="share-options-content-heading">
          <span class="close page-reload">&times;</span>
          <h2 id="share-options-content-heading">Jaa linkki</h2>
            <div id="a2a_icons" class="a2a_kit a2a_kit_size_40 a2a_default_style" data-a2a-url=" " data-a2a-title="Hauskaa joulua, ystävä!">
              <a class="a2a_button_facebook"></a>
              <a class="a2a_button_twitter"></a>
              <a class="a2a_button_linkedin"></a>
              <a class="a2a_button_email"></a>
            </div>
          <input id="shareable-link" class="shareable-link-container" type="textarea" value=" " readonly>
          <button class="button" onclick="copyLink()">Kopioi osoite</button>
        </section>
      </div>
    </main>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/js/foundation.min.js"></script>
    <script src="public/js/functions.js"></script>
  </body>
</html>
