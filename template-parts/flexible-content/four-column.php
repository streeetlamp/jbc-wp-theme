<?php

/**
 * Template part for displaying four column layouts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package James_Branch_Cabell
 */

?>

<div class="flex-row flex-4-col">

  <div class="flex-column col-1">
    <?php the_sub_field('content'); ?>
  </div>
  <div class="flex-column col-2">
    <?php the_sub_field('content_2'); ?>
  </div>
  <div class="flex-column col-3">
    <?php the_sub_field('content_3'); ?>
  </div>
  <div class="flex-column col-4">
    <?php the_sub_field('content_4'); ?>
  </div>

</div>