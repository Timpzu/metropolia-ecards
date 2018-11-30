<?php
  require 'scripts/database.php';
  require 'scripts/login.php';

  function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
  }

  $user = phpCAS::getUser();

  $sql = "SELECT * FROM cards INNER JOIN animations ON cards.anim_id = animations.anim_id WHERE user='$user'";
  $result = $mysqli->query($sql);

  function template( $file, $args ){
    // ensure the file exists
    if ( !file_exists( $file ) ) {
      return '';
    }
    // Make values in the associative array easier to access by extracting them
    if ( is_array( $args ) ){
      extract( $args );
    }
    // buffer the output (including the file is "output")
    ob_start();
    include $file;
    return ob_get_clean();
  }

  $mysqli->close();
?>
<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Kustomoi Metropolian graafisen suunnittelun opiskelijoiden suunnittelemat ja toteuttamat joulutervehdysanimaatiot yhteistyökumppaneillesi ja ystävillesi tällä alustalla.">
    <title>Etusivu | Metropolian joulutervehdys 2018</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
    <link href="public/css/lity.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <main class="grid-container">
        <section class="introductory-text-block">
          <h1>Metropolian joulutervehdys 2018</h1>
          <p>Kustomoi Metropolian graafisen suunnittelun opiskelijoiden
            suunnittelemat ja toteuttamat joulutervehdysanimaatiot
            yhteistyökumppaneillesi ja ystävillesi tällä alustalla.</p>
          <p>Voit lisätä animaation loppukuvaan oman persoonallisen viestisi
            sekä oman nimesi allekirjoitukseksi. Voit halutessasi kohdentaa
            viestin myös jollekin ryhmälle yksilöiden sijaan.</p>
          <p>Kustomoinnin jälkeen voit kopioida yksilöllisen nettiosoitteen ja
            lähettää sen sähköpostilla tai jakaa suoraan sosiaalisen median kanaviisi.</p>
        </section>
        <div class="grid-placeholder"></div>
        <h2 class="gallery-heading">Tarkastele tekemiäsi kortteja</h2>
        <div class="gallery-button-container">
          <a href="form.php" class="gallery-button">
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
    <script type="text/javascript">
      $(document).ready(function() {
        if($('body').find('.card-preview').length === 0) {
          $('.gallery-button').css('margin-top', '0');
        }
      });
      $('.card-url-copy').click(function() {
        var x = $(this).prev('.card-url');
        console.log(x);
        x.focus();
        x.select();
        document.execCommand("copy");
      });
    </script>
  </body>
</html>
