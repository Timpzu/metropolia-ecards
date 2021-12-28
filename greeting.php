<?php
  require 'scripts/database.php';

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

  $urlPathId = trim(parse_url(curPageURL(), PHP_URL_QUERY), 'ref=');

  $sql = "SELECT * FROM cards INNER JOIN animations ON cards.anim_id = animations.anim_id WHERE ref='$urlPathId'";

  $result = $mysqli->query($sql);
  $row = mysqli_fetch_assoc($result);

  $mysqli->close();
?>
<!DOCTYPE html>
<html lang="fi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Joulutervehdys ystävältäsi | Metropolian joulutervehdys</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
  <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
  <link rel="stylesheet" href="public/css/styles.css" type="text/css">
</head>

<body>
  <div class="wrapper wrapper_secondary">
    <header>
      <img src="public/img/metropolia_m_gray.svg" alt="Metropolia Ammattikorkeakoulun logo" height="132">
    </header>
    <main class="content">
      <section aria-labelledby="main_heading">
        <h1 id="main_heading">Metropolian joulutervehdys</h1>
        <p>Hei <strong><?php echo $row['receiver']; ?></strong>, olet saanut joulutervehdyksen ystävältäsi! Tervehdyksen animaation on toteuttanut Metropolian
          graafisen suunnittelun opiskelija. Sinulle kirjoitettu henkilökohtainen viesti tulee näkyviin animaation
          päätyttyä.</p>
      </section>
      <section class="greeting-card flip" aria-labelledby="greeting-card-heading">
        <h2 id="greeting-card-heading" class="sr-only">Digitaalinen joulutervehdys ja animaatio</h2>
        <div id="flip-inner-1" class="flip-inner is-paused">
          <div class="flip-front">
            <video id="animation-1" width="100%" onended="revealBackside()" controls playsinline>
              <source src="public/video/<?php echo $row['filename'] ?>.mp4" type="video/mp4">
            </video>
          </div>
          <article id="greeting-card-back-1" class="greeting-card-back flip-back"
            aria-label="Henkilökohtainen joulutervehdys sinulle">
            <div id="greeting-card-back-content-1" class="greeting-card-back-content fade-in is-paused">
              <img src="public/img/endpic2611.jpg" alt="" width="100%" height="auto">
              <p class="greeting-card-receiver"><span
                  class="sr-only">Vastaanottaja:&nbsp;</span><?php echo $row['receiver']; ?></p>
              <p class="greeting-card-message" id="textfillElem">
                <span class="sr-only">Viesti:&nbsp;</span><?php echo $row['message']; ?>
              </p>
              <p class="greeting-card-sender"><span class="sr-only">Lähettäjä:&nbsp;</span><?php echo $row['sender']; ?>
              </p>
            </div>
          </article>
        </div>
      </section>
      <div class="greeting-card-additional">
        <div class="greeting-card-copyright fade-out is-paused">
          <p><strong>Tekijä: <?php echo $row['author']; ?></strong></p>
          <p>
            <?php
                if (!empty($row['copyright'])) {
                  echo 'Musiikki: ' . $row['copyright'];
                }
              ?>
          </p>
        </div>
        <!-- <p id="greeting-card-additional-link-1" class="greeting-card-additional-link">Oletko Metropolialainen? <a
            href="index.php">Luo oma tervehdys tästä linkistä.</a></p> -->
      </div>
    </main>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="public/js/jquery.textfill.js"></script>
  <script type="text/javascript">
    var revealBackside = () => {
      $('#animation-1').removeAttr('controls');
      $('.greeting-card-copyright').removeClass('is-paused');
      // $('#greeting-card-additional-link-1').delay(900)
      //   .queue(function (next) {
      //     $(this).css('display', 'block');
      //     next();
      //   });
      $('.greeting-card-copyright').attr('aria-hidden', 'true');
      $('#flip-inner-1').removeClass('is-paused');
      $('#greeting-card-back-content-1').removeClass('is-paused');
      $('#greeting-card-back-1').attr('tabindex', '-1');
      $('#greeting-card-back-1').focus();
    }
    $('#textfillElem').textfill({
      maxFontPixels: 36
    });
  </script>
</body>

</html>