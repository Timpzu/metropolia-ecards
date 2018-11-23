<?php $url = reset(explode('/index.php',curPageURL())) . '/greeting.php?ref=' . $ref; ?>
<article class="card-preview">
  <h3><?php print $receiver; ?></h3>
  <a class="card-preview-thumbnail" href="<?php echo $url ?>" data-lity data-lity-desc="">
    <p class="gallery-thumbnail-icon">Klikkaa esikatsellaksesi</p>
    <img src="public/img/<?php echo $filename ?>.jpg" width="100%"/>
  </a>
  <input class="card-url" type="text" value="<?php echo $url; ?>" readonly>
  <div class="gallery-some-icons">
    <span>Jaa:</span>
    <a href="#">Facebook,</a>
    <a href="#">Twitter,</a>
    <a href="#">LinkedIn</a>
  </div>
</article>
