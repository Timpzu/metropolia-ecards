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
    <title>Hauskaa joulua! | Metropolian joulutervehdys</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link rel="stylesheet" href="public/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body class="greeting-body">
    <div class="wrapper">
      <main class="grid-container">
        <section class="card-frame flip-card">
          <div id="flip-card-1-inner" class="flip-card-inner is-paused">
            <figure id="card-front-frame" class="flip-card-front">
              <video id="animation-1" width="100%" onended="revealBackside()" controls>
                <source src="public/video/<?php echo $row['filename'] ?>.mp4" type="video/mp4">
              </video>
              <figcaption class="fade-out is-paused">
                <strong>Tekijä: <?php echo $row['author']; ?></strong><br />
                <?php
                  if (!empty($row['copyright'])) {
                    echo 'Musiikki: ' . $row['copyright'];
                  }
                 ?>
              </figcaption>
            </figure>
            <article id="card-backside" class="card-backside flip-card-back">
              <div id="card-1-backside-content" class="card-backside-content fade-in is-paused">
                <img src="public/img/endpic2611.jpg" alt="" width="100%" height="auto">
                <div class="card-message" id="textfillElem">
                  <span><?php echo $row['message']; ?></span>
                </div>
                <span class="card-sender"><?php echo $row['sender']; ?></span>
                <span class="card-receiver"><?php echo $row['receiver']; ?></span>
              </div>
            </article>
          </div>
        </section>
      </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/js/jquery.textfill.js"></script>
    <script type="text/javascript">
      var revealBackside = () => {
        $('#animation-1').removeAttr('controls');
        $('.flip-card-front figcaption').removeClass('is-paused');
        $('#flip-card-1-inner').removeClass('is-paused');
        $('#card-1-backside-content').removeClass('is-paused');
      }
      $('#textfillElem').textfill({
        maxFontPixels: 36
      });
    </script>
  </body>
</html>
