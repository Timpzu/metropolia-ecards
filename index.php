<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Metropolian joulukortti</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC|Playfair+Display:400,700" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <main class="row">
      <div class="column-half">
        <section id="main-header" class="main-header" aria-labelledby="main-header-heading">
          <h1 id="main-header-heading">Metropolian joulu</h1>
          <p>Joulukortit ovat jouluisin lähetettäviä tervehdyksiä,
            joissa toivotetaan hyvää joulua. Useasti joulukorteissa toivotetaan
            myös hyvää uutta vuotta. Vuonna 2010 joulupukille
            lähetettiin noin 600 000 kirjettä ympäri maailmaa.</p>
        </section>
        <figure>
          <figcaption>Esikatselu:</figcaption>
          <video width="100%" controls>
            <source src="public/video/lapsuuden-haave.mp4" type="video/mp4">
          </video>
        </figure>
        <section id="form-area" class="form-centered" aria-aria-labelledby="form-area-heading">
          <h2 id="form-area-heading">Lähetä tervehdys:</h2>
          <!-- <h2 id="form-heading">Lähetä kortti ystävälle:</h2> -->
          <form id="sending-info-form" method="post">
            <!-- <label for="fsender">Lähettäjä</label> -->
              <input id="fsender" type="text" name="sender" required="required" placeholder="Lähettäjä">
            <!-- <label for="freceiver">Vastaanottaja</label> -->
              <input id="freceiver" type="text" name="receiver" required="required" placeholder="Vastaanottaja">
            <!-- <label for="fmessage">Viesti</label> -->
              <input id="fmessage" type="text" name="message" required="required" placeholder="Viesti">
            <input type="submit" name="" value="Jaettava linkki">
          </form>
        </section>
      </div>
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
          <button onclick="copyLink()">Kopioi osoite</button>
        </section>
      </div>
    </main>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $(this).scrollTop(0);

        $('#sending-info-form').on('submit', function(e){
          e.preventDefault();
          let sender = $('#fsender').val();
          let receiver = $('#freceiver').val();
          let message = $('#fmessage').val();
          $.ajax({
            type: "POST",
            url: 'scripts/submit.php',
            data: {sender: sender, receiver: receiver, message: message},
            dataType: 'json',
            success: function(response) {
              const lastSerial = response.lastSerial;
              const url = window.location.href;
              let shareURL = url + 'tervehdys.php?ref=' + lastSerial;
              attachAddress(shareURL);
              $('#share-options').css('display','block');
            }
          });
        });
        const attachAddress = function(url) {
          $('#a2a_icons').attr('data-a2a-url', url);
          $('#shareable-link').attr('value', url);
        }

        $('.page-reload').click(function() {
            location.reload(true);
        });
      });
      function copyLink() {
        const shareableLink = document.getElementById("shareable-link");
        shareableLink.select();
        document.execCommand("copy");
        alert("Linkki kopioitu leikepöydälle.");
      }
    </script>
  </body>
</html>
