<?php

    function load_css_js() {
        wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/assets/css/foundation.css', false, NULL, 'all' );
        wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', false, NULL, 'all' );
        wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css', false, NULL, 'all' );
        wp_enqueue_script('app-js', get_template_directory_uri().'/assets/js/app.js', array(), '1.0.0');
        // wp_register_script( 'gdgt-base', get_template_directory_uri() . '/js/gdgt-base.js', array( 'jquery' ), NULL, false );
        // wp_enqueue_script( 'gdgt-base' );
    }

    add_action( 'wp_enqueue_scripts', 'load_css_js' );

///////////// Shortcode for post title/////////////////////////////////
    function title_shortcode() {
        return get_the_title();
    }
    add_shortcode( 'title', 'title_shortcode' );

/////////// Shortcode for headings in post/////////////////////////////////
    function heading_shortcode($atts) {
        $heading_number = (int)$atts['heading'];
        global $post;
        $content = get_the_content();
        $content = explode("\n", $content);
        $heading = array();
        $counter = 0;
        foreach ($content as $line) {
            if (substr($line, 0, 4) == '<h1>') {
                $counter++;
                if ($counter == $heading_number) {
                    $heading[] = $line;
                }
            }
        }

        if ($counter < $heading_number) {
            return "";
        }
        return implode("\n", $heading); 
    }
    add_shortcode( 'heading', 'heading_shortcode' );

///////////// Shortcode for paragraphs in post/////////////////////////////////
    function content_shortcode($atts) {
        global $post;
        $content = get_the_content();
        $content = explode("\n", $content);
        
        $paragraph = (int)$atts['paragraph'];

        return $content[$paragraph - 1];
    }
    add_shortcode( 'content', 'content_shortcode' );

/////////////// Shortcode for a specific image in post////////////////////////
    function image_shortcode($atts) {
        $image_number = (int)$atts['image'];
        global $post;
        $content = get_the_content();
        $images = get_posts(array(
            'numberposts' => -1,
            'post_parent' => $post->ID,
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => 'ASC',
            'orderby' => 'menu_order'
        ));
        if (empty($images)) {
            return "";
        }
        return wp_get_attachment_image($images[$image_number - 1]->ID, 'full');
    }
    add_shortcode( 'image', 'image_shortcode' );

/////////////// Shortcode for lists in post////////////////////////////////////
    function list_shortcode($atts) {
        $list_number = (int)$atts['list'];
        global $post;
        $content = get_the_content();
        $content = explode("\n", $content);
        $list = array();
        $counter = 0;
        foreach ($content as $line) {
            if (substr($line, 0, 3) == '<li>') {
                $counter++;
                if ($counter == $list_number) {
                    $list[] = $line;
                }
            }
        }

        if ($counter < $list_number) {
            return "";
        }

        return '<ul>' . implode("\n", $list) . '</ul>';
    }
    add_shortcode( 'list', 'list_shortcode' );

///////////// Shortcode for quotes in post/////////////////////////////////
    function quote_shortcode($atts) {
        $quote_number = (int)$atts['quote'];
        global $post;
        $content = get_the_content();
        $content = explode("\n", $content);
        $quote = array();
        $counter = 0;
        foreach ($content as $line) {
            if (substr($line, 0, 4) == '<p>') {
                if (substr($line, 3, 7) == '<block') {
                    $counter++;
                    if ($counter == $quote_number) {
                        $quote[] = $line;
                    }
                }
            }
        }

        if ($counter < $quote_number) {
            return "";
        }
        return implode("\n", $quote);
    }
    add_shortcode( 'quote', 'quote_shortcode' );

    // Acf - Options Page
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page();
    }

    function theme_setup() {
        //require get_template_directory() . '/inc/customiser.php';
        /* Language Support */
        load_theme_textdomain( 'wild', get_template_directory() . '/languages' );
        
        /* Supports */
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        remove_theme_support('core-block-patterns');
        /* Menus */
        register_nav_menus(
            array(
                'main' => esc_html__( 'Main Menu', 'wild' ),
                'footer' => esc_html__( 'Footer Menu', 'wild' ),
            )
        );

        if ( function_exists('register_sidebar') )
            register_sidebar(array(
                'id' => 'main-sidebar',
                'name' => 'Main Sidebar',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
                )
        );

    }
add_action( 'after_setup_theme', 'theme_setup' );


function makeUppercase( $str ) {
    return str_replace( ['Ά', 'Έ', 'Ή', 'Ί', 'Ό', 'Ύ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω'], mb_strtoupper($str));
}


?>