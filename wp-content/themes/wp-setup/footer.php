<?php
  $address = get_field('address', 'options');
?>

<footer class="footer">
  <div class="footer__wrapper">
    <address class="footer__address">
      <?= $address ?>
    </address>
  </div>
</footer>

<?php wp_footer(); ?>
