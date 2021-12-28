<div class="preview">
  <a href="public/video/<?php echo $filename ?>.mp4" data-lity data-lity-desc=""
    aria-label="Esikatsele animaatio: <?php echo $title ?> klikkaamalla.">
    <img alt="" class="preview_label" src="public/img/icons/twotone-play_circle_filled-24px.svg" alt="" height="50%">
    <img alt="" class="preview-img" src="public/img/thumbnail/<?php echo $filename ?>.jpg" width="100%" />
  </a>
  <label><input type="radio" name="animation" value="<?php echo $anim_id ?>"
      required><span><?php echo $title ?></span></label>
</div>