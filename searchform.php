<?php
$jbc_unique_id = wp_unique_id( 'search-form-' );

$jbc_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<form id="searchform" role="search" <?php echo $jbc_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $jbc_unique_id ); ?>"></label>
	<input placeholder="What are you looking for?" type="search" id="<?php echo esc_attr( $jbc_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'jbc-wp-theme' ); ?>"><span class="fa fa-search"></span></button>
</form>
