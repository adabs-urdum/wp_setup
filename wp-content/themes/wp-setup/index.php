<?php get_header(); ?>

<main>

  <?php
    $pageID = get_the_ID();
    echo do_shortcode('[ninja_form id=3]');
  ?>

  <?php if (have_posts()) : while (have_posts()) :?>
    <?php
      the_post();
      get_template_part('partials/content-elements');
    ?>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
