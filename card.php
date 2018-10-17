<?php include 'scripts/retrieve.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Metropolian joulukortti</title>
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
  </head>
  <body>
    <main class="frame frame-bg">
      <div class="frame-window flip-card">
        <div id="frame-inner-flip-card" class="flip-card-inner is-paused">
          <video id="animation" class="flip-card-front" width="640" height="480" onended="revealPostcard()" autoplay muted>
            <source src="public/video/kortti.mp4" type="video/mp4">
          </video>
          <article id="postcard-template" class="postcard flip-card-back">
            <div id="input-placeholder" class="fade-in is-paused">
              <span id="message-input-placeholder" class="message"><?php echo $row['message']; ?></span>
              <span id="sender-input-placeholder" class="sender"><?php echo $row['sender']; ?></span>
              <span id="receiver-input-placeholder" class="receiver"><?php echo $row['receiver']; ?></span>
            </div>
          </article>
        </div>
      </div>
    </main>
    <script type="text/javascript">
      const postcardTemplate = document.getElementById('postcard-template');
      const inputPlaceholder = document.getElementById('input-placeholder');
      const frameInnerFlipCard = document.getElementById('frame-inner-flip-card');
      const animation = document.getElementById('animation');

      const revealPostcard = () => {
        // postcardTemplate.style.display='block';
        // animation.style.display='none';
        frameInnerFlipCard.classList.remove('is-paused');
        inputPlaceholder.classList.remove('is-paused');
      }
    </script>
  </body>
</html>
