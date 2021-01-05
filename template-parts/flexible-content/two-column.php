<?php

/**
 * Template part for displaying two columns of content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package James_Branch_Cabell
 */

?>

<div class="flex-row flex-2-col">

  <div class="flex-column col-1">
    <h2 class="overview-title first-title"><?php the_sub_field('title'); ?></h2>
    <?php the_sub_field('content'); ?>
  </div>
  <div class="flex-column col-2">
    <h2 class="overview-title"><?php the_sub_field('title_2'); ?></h2>
    <?php the_sub_field('content_2'); ?>
  </div>

</div>