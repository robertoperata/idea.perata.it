<?php


function theme_enqueue_styles() {

    $parent_style = 'twentysixteen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/*

function add_position_columns($columns) {

    return array_merge($columns,
          array('posizione' => 'Posizione'));
}

add_filter('manage_posts_columns' , 'add_position_columns');

function position_custom_columns( $column, $post_id ) {
    switch ( $column ) {

    case 'posizione' :
        echo get_post_meta($post_id, 'posizione', true);
        break;
    }
}

add_action('manage_post_custom_column' , 'position_custom_columns', 10, 2 );
*/

function my_post_columns($columns)
{
	$columns = array(
		'cb'	 	=> '<input type="checkbox" />',

		'title' 	=> 'Title',
		'posizione' 	=> 'Posizione',
		'author'	=>	'Author',
		'date'		=>	'Date',
	);
	return $columns;
}

function my_custom_columns($column)
{
	global $post;
if($column == 'posizione')
	{
	echo get_post_meta($post_id, 'posizione', true);
	}
}

add_action("manage_post_custom_column", "my_custom_columns");

add_filter("manage_edit-post_columns", "my_post_columns");


?>
