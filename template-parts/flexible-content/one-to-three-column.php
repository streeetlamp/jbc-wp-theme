<?php

/**
 * Template part for displaying a content in 1-3
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package James_Branch_Cabell
 */

?>

<div class="flex-row flex-1-to-3-col">

  <div class="flex-column col-1">
    <?php the_sub_field('content'); ?>
  </div>
  <div class="flex-column col-2">
    <?php the_sub_field('content_2'); ?>
  </div>

</div>