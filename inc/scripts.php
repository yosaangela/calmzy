<?php

/**
 * Enqueue scripts and styles.
 */
function rt_uno_scripts() {
    wp_enqueue_style( 'rt-uno-style', get_stylesheet_directory_uri() . '/dist/css/build.min.css', array(), '1.0.0' );
    
    wp_enqueue_script( 'rt-uno-script', get_template_directory_uri() . '/dist/js/build.min.js', array('jquery'), '1.0.0', true );

	// wp_enqueue_script( 'rt-uno-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'rt-uno-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rt_uno_scripts' );