<?php
// let's create the function for the custom type
function quotes_post_type() {
	// creating (registering) the custom type
	register_post_type(
		'quotes', /*
		(http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels'              => array(
				'name'               => __( 'Quotes', 'jbc' ), /* This is the Title of the Group */
				'singular_name'      => __( 'Quotes', 'jbc' ), /* This is the individual type */
				'all_items'          => __( 'All Quotes', 'jbc' ), /* the all items menu item */
				'add_new'            => __( 'Add New', 'jbc' ), /* The add new menu item */
				'add_new_item'       => __( 'Add New Quotes', 'jbc' ), /* Add New Display Title */
				'edit'               => __( 'Edit', 'jbc' ), /* Edit Dialog */
				'edit_item'          => __( 'Edit Quotes', 'jbc' ), /* Edit Display Title */
				'new_item'           => __( 'New Quotes', 'jbc' ), /* New Display Title */
				'view_item'          => __( 'View Quotes', 'jbc' ), /* View Display Title */
				'search_items'       => __( 'Search Quotes', 'jbc' ), /* Search Custom Type Title */
				'not_found'          => __( 'None found in the Database.', 'jbc' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'None found in the Trash', 'jbc' ), /* This displays if there is nothing in the trash */
				'parent_item_colon'  => '',
			), /* end of arrays */
			'description'         => __( 'This is for Quotes', 'jbc' ), /* Custom Type Description */
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 20, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon'           => 'dashicons-format-quote', /* the icon for the Quotes or Staff type menu */
			'rewrite'             => array(
				'slug'       => 'quotes',
				'with_front' => false,
			), /* you can specify its url slug */
			'has_archive'         => 'quotes', /* you can rename the slug here */
			'capability_type'     => 'post',
			'hierarchical'        => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports'            => array( 'title', 'editor', 'revisions' ),
		) /* end of options */
	); /* end of register post type */
}

/* this adds your post categories to your custom post type */
register_taxonomy_for_object_type( 'category', 'quotes' );

// adding the function to the WordPress init
add_action( 'init', 'quotes_post_type' );

register_taxonomy(
	'quotes_cat',
	array( 'quotes' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical'      => true,     /* if this is true, it acts like categories */
		'labels'            => array(
			'name'              => __( 'Quotes Categories', 'jbc' ), /* name of the custom taxonomy */
			'singular_name'     => __( 'Quotes Category', 'jbc' ), /* single taxonomy name */
			'search_items'      => __( 'Search Quotes Categories', 'jbc' ), /* search title for taxomony */
			'all_items'         => __( 'All Quotes Categories', 'jbc' ), /* all title for taxonomies */
			'parent_item'       => __( 'Parent Quotes Category', 'jbc' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Quotes Category:', 'jbc' ), /* parent taxonomy title */
			'edit_item'         => __( 'Edit Quotes Category', 'jbc' ), /* edit custom taxonomy title */
			'update_item'       => __( 'Update Quotes Category', 'jbc' ), /* update title for taxonomy */
			'add_new_item'      => __( 'Add New Quotes Category', 'jbc' ), /* add new title for taxonomy */
			'new_item_name'     => __( 'New Quotes Category Name', 'jbc' ), /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui'           => true,
		'query_var'         => true,
	)
);
