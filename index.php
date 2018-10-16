<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Metropolian joulukortti</title>
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <!-- <header>
      <h1>Metropolian joulukortti</h1>
    </header> -->
    <main class="row">
      <section id="form-area" class="column-3" aria-aria-labelledby="form-heading">
        <h2 id="form-heading">Lähetä kortti ystävälle:</h2>
        <form id="sending-info-form" method="post">
          <label for="fsender">Lähettäjä</label>
            <input id="fsender" type="text" name="sender" required="required">
          <label for="freceiver">Vastaanottaja</label>
            <input id="freceiver" type="text" name="receiver" required="required">
          <label for="fmessage">Viesti</label>
            <input id="fmessage" type="text" name="message" required="required">
          <input type="submit" name="" value="Lähetä">
        </form>
      </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
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
          });
        });
      });
    </script>
  </body>
</html>
