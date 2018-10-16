<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Metropolian joulukortti</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
  </head>
  <body>
    <!-- <header>
      <h1>Metropolian joulukortti</h1>
    </header> -->
    <main class="row">
      <section id="form-area" class="column-3" aria-aria-labelledby="form-heading">
        <h2 id="form-heading">Lähetä kortti ystävälle:</h2>
        <form action="finalised-card.php" method="get" target="_blank">
          <label for="fsender">Lähettäjä</label>
            <input id="fsender" type="text" name="sender" value="">
          <label for="freceiver">Vastaanottaja</label>
            <input id="freceiver" type="text" name="receiver" value="">
          <label for="fmessage">Viesti</label>
            <input id="fmessage" type="text" name="message" value="">
          <input type="submit" name="" value="Lähetä">
        </form>
      </section>
    </main>
  </body>
</html>
