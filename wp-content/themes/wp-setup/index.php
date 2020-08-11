<?php get_header(); ?>

<main>

  <?php
    $pageID = get_the_ID();
  ?>

  <?php if (have_posts()) : while (have_posts()) : the_post();

    get_template_part('partials/content-elements');

  endwhile; endif; ?>
</main>

<?php get_footer(); ?>
