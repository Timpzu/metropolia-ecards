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
            <source src="public/video/kortti.mp4" type="video/mp4">
          </video>
        </figure>
        <section id="form-area" class="form-centered" aria-aria-labelledby="form-heading">
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
          <section id="share-options">

          </section>
        </section>
      </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    var lasID;
      $(document).ready(function(){
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
              lastID = response.lastID;
              lastSerial = response.lastSerial;
              const origin = window.location.origin;
              let shareableURL =
              '<a href="' + origin + '/metropolia-joulukortti/card.php' + '?id=' + lastSerial + '">'
               + origin + '/metropolia-joulukortti/card.php' + '?id=' + lastSerial + '</a> <br />';
              $('#share-options').append(shareableURL);
            }
          });
        });
      });
    </script>
  </body>
</html>
