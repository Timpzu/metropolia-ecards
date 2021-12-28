<?php $url = reset(explode('/index.php',curPageURL())) . '/greeting.php?ref=' . $ref; ?>
<article class="preview">
  <h3>Saaja: <?php print $receiver; ?></h3>
  <a class="preview-thumbnail" href="<?php echo $url ?>" data-lity data-lity-desc="">
    <p class="preview_label">Klikkaa esikatsellaksesi</p>
    <img src="public/img/thumbnail/<?php echo $filename ?>.jpg" width="100%" />
  </a>
  <div class="share-link-container">
    <label for="link-url-<?php echo $id ?>" class="sr-only">Kopioitava linkki</label>
    <input id="link-url-<?php echo $id ?>" class="link-url" type="text" value="<?php echo $url; ?>" readonly>
    <button class="copy-url-button">Kopioi</button>
  </div>
</article>