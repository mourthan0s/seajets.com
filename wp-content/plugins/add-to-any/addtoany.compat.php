<?php

/**
 * Strips out disallowed HTML using wp_kses_post() while temporarily allowing 
 * some additional HTML attributes and CSS in a style attribute.
 */
function addtoany_kses( $string ) {
	/**
	 * Temporarily allow specific CSS properties in a `style` attribute.
	 * @since WordPress 2.8.1
	 */
	add_filter( 'safe_style_css', 'addtoany_kses_allow_css_properties' );

	/**
	 * Temporarily allow specific CSS declarations in a `style` attribute.
	 * @since WordPress 5.5.0
	 */
	add_filter( 'safecss_filter_attr_allow_css', 'addtoany_kses_allow_css_declarations', 10, 2 );

	// Strip out any disallowed HTML.
	$string = wp_kses( $string, addtoany_expanded_allowed_html() );
	
	// Revert kses filters to originals.
	remove_filter( 'safe_style_css', 'addtoany_kses_allow_css_properties' );
	remove_filter( 'safecss_filter_attr_allow_css', 'addtoany_kses_allow_css_declarations', 10, 2 );

	return $string;
}

/**
 * Returns `wp_kses_allowed_html( 'post' )` with additional allowed HTML.
 */
function addtoany_expanded_allowed_html() {
	$allowed = wp_kses_allowed_html( 'post' );
	// Add AMP attributes.
	$allowed['a']['on'] = true;
	return $allowed;
}

/**
 * Allows some additional CSS properties in a `style` attribute.
 */
function addtoany_kses_allow_css_properties( $props ) {
	$props[] = 'bottom';
	$props[] = 'left';
	$props[] = 'right';
	$props[] = 'top';
	$props[] = 'transform';
	return $props;
}

/**
 * Allows additional CSS declarations for specific properties in a `style` attribute.
 */
function addtoany_kses_allow_css_declarations( $allow_css, $css_test_string ) {
	$parts = explode( ':', $css_test_string, 2 );
	if ( 'transform' === $parts[0] ) {
		// Allow translateX or translateY with a percentage value.
		return ! ! preg_match( '/^translate[X|Y]\(-?\d{1,6}%\)$/', trim( $parts[1] ) );
	}
	return $allow_css;
}
	
/**
 * Load theme compatibility functions.
 */
function addtoany_load_theme_compat() {
	add_action( 'loop_start', 'addtoany_excerpt_remove' );
}

add_action( 'after_setup_theme', 'addtoany_load_theme_compat', -1 );

/**
 * Remove from excerpts where buttons could be redundant or awkward.
 */
function addtoany_excerpt_remove() {
	// If Twenty Sixteen theme
	if ( 'twentysixteen' == get_stylesheet() || 'twentysixteen' == get_template() ) {
		// If blog index, single, or archive page, where excerpts are used as "intros".
		if ( is_single() || is_archive() || is_home() ) {
			remove_filter( 'the_excerpt', 'A2A_SHARE_SAVE_add_to_content', 98 );
		}	
	}
}

/**
 * Change the priority of standard buttons in content to work around a
 * Jetpack ~v7.8 Related Posts bug that removes content added to AMP posts 
 * if the content's filter has a priority number greater than 40.
 */
add_action( 'wp_loaded', 'addtoany_priority_for_amp_jetpack' );

function addtoany_priority_for_amp_jetpack() {
	// If the AMP plugin is enabled, the Jetpack plugin is enabled,
	// and Jetpack's Related Posts module is enabled.
	if ( class_exists( 'AMP_Autoloader' ) && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'related-posts' ) ) {
		// Change priority to 20.
		add_filter( 'addtoany_content_priority', function() { return 20; } );
	}
}

/**
 * Move buttons from WooCommerce product description to WooCommerce's sharing block.
 */
add_action( 'woocommerce_share', 'addtoany_woocommerce_share', 10 );

function addtoany_woocommerce_share() {
	remove_filter( 'the_content', 'A2A_SHARE_SAVE_add_to_content', 98 );
	remove_filter( 'the_excerpt', 'A2A_SHARE_SAVE_add_to_content', 98 );
	
	$options = get_option( 'addtoany_options', array() );
	$sharing_disabled = get_post_meta( get_the_ID(), 'sharing_disabled', true );
	$sharing_disabled = apply_filters( 'addtoany_sharing_disabled', $sharing_disabled );
	$post_type = get_post_type( get_the_ID() );
	
	if ( 
		// Private post.
		get_post_status( get_the_ID() ) == 'private' ||
		// Sharing disabled on post.
		! empty( $sharing_disabled ) ||
		// Custom post type (usually "product") disabled.
		( $post_type && isset( $options['display_in_cpt_' . $post_type] ) && $options['display_in_cpt_' . $post_type] == '-1' )
	) {
		return;
	} else {
		// If a Sharing Header is set.
		if ( ! empty( $options['header'] ) ) {
			echo wp_kses_post( '<div class="addtoany_header">' . stripslashes( $options['header'] ) . '</div>' );
		} else {
			$html_header = '';
		}
		
		// Display share buttons.
		ADDTOANY_SHARE_SAVE_KIT();
	}
}

/**
 * Exclude AddToAny assets domain from WP Rocket.
 */
add_filter( 'rocket_minify_excluded_external_js', 'addtoany_wp_rocket_exclusion' );

function addtoany_wp_rocket_exclusion( $excluded ) {
	$excluded[] = 'static.addtoany.com';
	return $excluded;
}