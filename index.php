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

  $sql = "SELECT * FROM cards INNER JOIN animations ON cards.anim_id = animations.anim_id WHERE user='$user' ORDER BY cards.id DESC";
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
  <meta name="description"
    content="Kustomoi Metropolian graafisen suunnittelun opiskelijoiden suunnittelemat ja toteuttamat joulutervehdysanimaatiot yhteistyökumppaneillesi ja ystävillesi tällä alustalla.">
  <title>Etusivu | Metropolian joulutervehdys 2018</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
  <link href="public/css/lity.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/styles.css" type="text/css">
</head>

<body>
  <div class="wrapper wrapper_main">
    <div class="content">
      <header>
        <img src="public/img/metropolia_m_orange.svg" alt="Metropolia Ammattikorkeakoulun logo" height="132">
      </header>
      <main>
        <section aria-labelledby="intro-heading" class="introduction">
          <h1 id="intro-heading">Metropolian joulutervehdys</h1>
          <p>Kustomoi Metropolian graafisen suunnittelun opiskelijoiden
            suunnittelemat ja toteuttamat joulutervehdysanimaatiot
            yhteistyökumppaneillesi ja ystävillesi tällä alustalla.</p>
          <p>Voit lisätä animaation loppukuvaan oman persoonallisen viestisi
            sekä oman nimesi allekirjoitukseksi. Voit halutessasi kohdentaa
            viestin myös jollekin ryhmälle yksilöiden sijaan.</p>
          <p>Kustomoinnin jälkeen voit kopioida yksilöllisen nettiosoitteen ja
            lähettää sen sähköpostilla tai jakaa suoraan sosiaalisen median kanaviisi.</p>
        </section>
        <section class="gallery" aria-labelledby="gallery-heading">
          <h2 id="gallery-heading">Tarkastele tekemiäsi kortteja</h2>
          <div class="grid-container">
            <div class="new-button-container">
              <div class="new-button-content">
                <a href="form.php" class="new-button">
                  <img alt="" src="public/img/icons/add_icon.svg" alt="" height="56px">
                  <span>Luo uusi kortti</span>
                </a>
              </div>
            </div>
            <?php
                $file = __DIR__ . '/templates/row-template.php';

                $output = '';

                foreach ( $result as $row ){
                  $output.= template( $file, $row );
                }

                print $output;
              ?>
          </div>
          <section>
      </main>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="public/js/lity.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      if ($('body').find('.preview').length === 0) {
        $('.new-button').css('margin-top', '0');
      }
    });
    $('.copy-url-button').click(function () {
      var x = $(this).prev('.link-url');
      console.log(x);
      x.focus();
      x.select();
      document.execCommand("copy");
    });
  </script>
</body>

</html>