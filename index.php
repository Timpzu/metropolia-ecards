<?php include 'scripts/collect.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Etusivu | Metropolian joulutervehdys</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
    <link href="public/css/lity.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles0.css" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <main class="grid-container">
        <section class="introductory-text-block">
          <h1>Joulutervehdys</h1>
          <h2>Tarkastele tekemiäsi kortteja</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.</p>
        </section>
        <div class="grid-placeholder"></div>
        <div class="gallery-button-container">
          <a href="form.html" class="gallery-button">
            <span>Luo uusi kortti</span>
          </a>
        </div>
        <?php
          $file = __DIR__ . '/templates/row-template.php';

          $output = '';

          foreach ( $result as $row ){
            $output.= template( $file, $row );
          }

          print $output;
        ?>
      </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/js/lity.min.js"></script>
  </body>
</html>
