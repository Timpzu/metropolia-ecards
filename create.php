<?php require 'scripts/login.php';?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Uusi tervehdys | Metropolian joulutervehdys</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <main class="container">
      <div class="row">
        <section class="col-md-6">
          <article>
            <h1>Metropolian joulu</h1>
            <p>
              Joulukortit ovat jouluisin lähetettäviä tervehdyksiä,
              joissa toivotetaan hyvää joulua. Useasti joulukorteissa toivotetaan
              myös hyvää uutta vuotta. Vuonna 2010 joulupukille
              lähetettiin noin 600 000 kirjettä ympäri maailmaa.
            </p>
          </article>
          <article id="form-area">
            <form id="sending-info-form" method="post">
              <fieldset>
                <label>
                  <input type="radio" name="animation" value="A" checked>
                  <img src="http://placehold.it/64x64/0ab/fff&text=A">
                </label>
                <label>
                  <input type="radio" name="animation" value="B">
                  <img src="http://placehold.it/64x64/0bf/fff&text=B">
                </label>
                <label>
                  <input type="radio" name="animation" value="C">
                  <img src="http://placehold.it/64x64/0dc/fff&text=C">
                </label>
              </fieldset>
              <input id="fuser" type="text" name="user" required="required" value="<?php echo phpCAS::getUser(); ?>" readonly>
              <input id="fsender" type="text" name="sender" required="required" placeholder="Lähettäjä">
              <input id="freceiver" type="text" name="receiver" required="required" placeholder="Vastaanottaja">
              <input id="fmessage" type="text" name="message" required="required" placeholder="Viesti">
              <input type="submit" value="Jaettava linkki">
            </form>
          </article>
        </section>
        <section class="col-md-6">
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
        <section id="share-options-content" class="modal-content">
          <span class="close page-reload">&times;</span>
          <h2>Jaa linkki</h2>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="public/js/functions.js"></script>
  </body>
</html>
