<?php
  require 'scripts/database.php';
  require 'scripts/login.php';

  $sql = "SELECT * FROM animations";
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description"
    content="Kustomoi Metropolian graafisen suunnittelun opiskelijoiden suunnittelemat ja toteuttamat joulutervehdysanimaatiot yhteistyökumppaneillesi ja ystävillesi tällä alustalla.">
  <title>Uusi tervehdys | Metropolian joulutervehdys</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
  <link href="public/css/lity.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/styles.css" type="text/css">
</head>

<body>
  <div class="wrapper wrapper_main">
    <div class="content">
      <header>
        <a class="back_button" href="index.php"><i class="material-icons" aria-hidden="true">arrow_back</i><span>Palaa
            etusivulle</span></a>
      </header>
      <main>
        <h2>Luo uusi tervehdys</h2>
        <h3>Lähetystiedot</h3>
        <div class="grid-container">
          <div class="create_form_container">
            <form id="create_form" method="post">
              <input id="fuser" type="text" name="user" required="required" value="<?php echo phpCAS::getUser(); ?>" readonly>
              <label for="fsender">Lähettäjä (oma nimi tai yksikön nimi)</label>
              <input id="fsender" type="text" name="sender" required="required" maxlength="32">
              <label for="freceiver">Vastaanottaja</label>
              <input id="freceiver" type="text" name="receiver" required="required" maxlength="64">
              <label for="fmessage">Viesti</label>
              <textarea id="fmessage" type="text" name="message" required="required" maxlength="140"
                aria-describedby="character_count-1"></textarea>
              <span class="character_count" id="character_count-1">Salittu merkkimäärä: <strong><span
                    id="character_count">0</span>/140</strong></span>
              <fieldset class="animation_select">
                <h4 class="animation_select-heading">Valitse etupuolelle tuleva animaatio:</h4>
                <div class="grid-container">
                  <?php
                      $file = __DIR__ . '/templates/preview-template.php';

                      $output = '';

                      foreach ( $result as $row ){
                        $output.= template( $file, $row );
                      }

                      print $output;
                    ?>
                </div>
              </fieldset>
              <input type="submit" value="Tallenna ja siirry lähettämään">
            </form>
          </div>
          <div class="input-preview" aria-hidden="true">
            <div class="input-preview-container">
              <div class="input-preview-content">
                <p class="input-sender-preview" id="input-sender-preview-1"></p>
                <p class="input-receiver-preview" id="input-receiver-preview-1"></p>
                <div class="input-message-preview" id="textfillElem">
                  <p id="input-message-preview-1"></p>
                </div>
                <figure>
                  <img alt="" src="public/img/endpic2611.jpg" width="100%" />
                  <!-- <figcaption>Esikatselu</figcaption> -->
                </figure>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- MODAL -->
  <section id="share-dialog" class="modal" role="window" aria-label="Lähetä tervehdys" aria-modal="true">
    <div class="modal-container">
      <div class="grid-container">
        <div class="modal-content">
          <h2>Lähetä tervehdys</h2>
          <h3>Kopioi linkki tai jaa se somessa</h3>
          <div class="share-link-container">
            <label for="share-link" class="sr-only">Kopioitava linkki</label>
            <input id="share-link" class="link-url" type="text" value=" " readonly>
            <button class="copy-url-button" onclick="copyLink()">Kopioi</button>
          </div>
          <div id="a2a_icons" class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url=" "
            data-a2a-title="Hauskaa joulua, ystävä!">
            <span>Jaa: </span>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_email"></a>
          </div>
          <button class="button page-reload">Luo uusi joulutervehdys</button>
          <a href="index.php" class="button button_simple">Palaa aloitussivulle</a>
        </div>
      </div>
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
  <script src="public/js/jquery.textfill.js"></script>
  <script src="public/js/lity.min.js"></script>
  <script src="public/js/submit.js"></script>
  <script type="text/javascript">
    $('#fsender').keyup(function () {
      $('#input-sender-preview-1').html(this.value);
    });
    $('#freceiver').keyup(function () {
      $('#input-receiver-preview-1').html(this.value);
    });
    $('#fmessage').keyup(function () {
      $('#input-message-preview-1').html(this.value);
      $('#textfillElem').textfill({
        maxFontPixels: 22
      });
    });

    $('textarea').keyup(updateCount);
    $('textarea').keydown(updateCount);

    function updateCount() {
      var cs = $(this).val().length;
      $('#character_count').text(cs);
    }

    $('.preview input').on('change', function () {
      if ($(this).is(':checked')) {
        $(this).closest('.preview').find('.preview-img').addClass('preview-border');
      }
      $('.preview input').not(this).closest('.preview').find('.preview-img').removeClass('preview-border');
    });

    $('.page-reload').click(function () {
      location.reload(true);
    });

    function copyLink() {
      var shareableLink = document.getElementById("share-link");
      shareableLink.select();
      document.execCommand("copy");
    }
    var a2a_config = a2a_config || {};
    a2a_config.locale = "fi";
  </script>
</body>

</html>