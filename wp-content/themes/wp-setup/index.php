<?php get_header(); ?>

<main>

  <?php
  $pageID = get_the_ID();
  ?>

  <?php if (!post_password_required()) : ?>

    <?php if (have_posts()) : while (have_posts()) : ?>
        <?php
        the_post();
        get_template_part('partials/content-elements');
        ?>
    <?php endwhile;
    endif; ?>

    <?php
    if (has_blocks($post->post_content)) {
      $blocks = parse_blocks($post->post_content);
      foreach ($blocks as $block) {
        $blockHtml = render_block($block);
        echo $blockHtml;
      }
    }
    ?>
  <?php else : ?>

    <section class="text text--<?= $bgColor ?>">
      <div class="text__content">
        <?= get_the_password_form(); ?>
      </div>
    </section>

  <?php endif; ?>
</main>

<?php get_footer(); ?>
