<?php

/**
 * Template part for displaying 1-2 columns
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package James_Branch_Cabell
 */

?>

<div class="flex-row flex-3-to-1-col <?php echo $divider_below; ?>">

  <div class="flex-column col-1">
    <?php the_sub_field('content'); ?>
  </div>
  <div class="flex-column col-2">
    <?php the_sub_field('content_2'); ?>
  </div>

</div>