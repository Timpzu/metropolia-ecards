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

  $urlPathId = trim(parse_url(curPageURL(), PHP_URL_QUERY), 'ref=');

  $sql = "SELECT * FROM cards INNER JOIN animations ON cards.anim_id = animations.anim_id WHERE ref='$urlPathId'";

  $result = $mysqli->query($sql);
  $row = mysqli_fetch_assoc($result);

  $mysqli->close();
?>
<!DOCTYPE html>
<html>
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
        <section class="card-frame">
          <figure id="card-front">
            <video width="100%" onended="revealBackside()" controls>
              <source src="public/video/<?php echo $row['filename'] ?>.mp4" type="video/mp4">
            </video>
            <figcaption><strong>Tekijä: <?php echo $row['author']; ?></strong><br />
            </figcaption>
          </figure>
          <article id="card-backside" class="card-backside fade-in is-paused">
            <div class="card-backside-content">
              <img src="public/img/loppukuva.jpg" alt="" width="100%" height="auto">
              <span class="card-message"><?php echo $row['message']; ?></span>
              <span class="card-sender"><?php echo $row['sender']; ?></span>
              <span class="card-receiver"><?php echo $row['receiver']; ?></span>
            </div>
          </article>
        </section>
      </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      var cardBackside = $('#card-backside');
      var cardFront = $('#card-front');

      var revealBackside = () => {
        cardFront.css('display', 'none');
        cardBackside.removeClass('is-paused');
      }
    </script>
  </body>
</html>
