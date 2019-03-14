<?php // FLEXIBLE LAYOUT
if( have_rows('contentelements') ): ?>

  <?php while ( have_rows('contentelements') ) : the_row(); $layout = get_row_layout(); ?>

    <?php
      $hide = get_sub_field('hide');
      if(!$hide):
    ?>

      <?php if( $layout == 'text' ): ?>
        <?php
          $text = get_sub_field('content');
        ?>

        <section class="text">
          <?= $text ?>
        </section>

      <?php elseif($layout == 'images'): ?>
        <?php
          $images = get_sub_field('images');
        ?>

        <section class="images">
          <div class="images__wrapper">
            <?php
              foreach($images as $image):
                $img = $image['img'];
                $src = $img['sizes']['large'];
                $srcset = wp_get_attachment_image_srcset($img['ID']);
                $alt = $img['title'];
                $size = $image['size'];
                $stretch = $image['stretch'];
            ?>
                <div class="images__image_wrapper images__image_wrapper--<?= $size ?><?php if($stretch){echo ' images__image_wrapper--stretch';} ?>" <?php if($stretch): ?> style="background-image:url(<?= $src ?>)"<?php endif ?>>
                  <img class="images__image<?php if($stretch){echo' images__image--stretch';} ?>" src="<?= $src ?>" alt="<?= $alt ?>" srcset="<?= $srcset ?>">
                </div>
            <?php
              endforeach;
            ?>
          </div>
        </section>

      <?php elseif($layout == 'image_text'): ?>
        <?php
          $layout = get_sub_field('layout');
          $img = get_sub_field('image');
          $txt = get_sub_field('content');
          $src = $img['sizes']['large'];
          $srcset = wp_get_attachment_image_srcset($img['ID']);
          $alt = $img['title'];
          $size = $image['size'];
          $stretch = $image['stretch'];
        ?>

        <section class="img_txt img_txt--<?= $layout ?>">
          <div class="img_txt__img_wrapper">
            <img class="img_txt__img<?php if($stretch){echo' images__image--stretch';} ?>" src="<?= $src ?>" alt="<?= $alt ?>" srcset="<?= $srcset ?>">
          </div>
          <div class="img_txt__txt_wrapper">
            <?= $txt ?>
          </div>
        </section>

      <?php else: ?>
        <?= $layout ?>
      <?php endif; ?>

    <?php endif; ?>

  <?php endwhile; ?>

<?php endif; ?>
