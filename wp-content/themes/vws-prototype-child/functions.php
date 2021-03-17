<?php
/* 	VWS Theme Prototype Child's Functions
*/

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

/**
 * Determines whether currently in a page template.
 *
 * This template tag allows you to determine if you are in a page template.
 * You can optionally provide a template filename or array of template filenames
 * and then the check will be specific to that template.
 *
 * For more information on this and similar theme functions, check out
 * the {@link https://developer.wordpress.org/themes/basics/conditional-tags/
 * Conditional Tags} article in the Theme Developer Handbook.
 *
 * @since 2.5.0
 * @since 4.2.0 The `$template` parameter was changed to also accept an array of page templates.
 * @since 4.7.0 Now works with any post type, not just pages.
 *
 * @param string|string[] $template The specific template filename or array of templates to match.
 * @return bool True on success, false on failure.
 */
function is_page_template( $template = '' ) {
    $page_template = get_page_template_slug( get_queried_object_id() );

    if ( empty( $template ) )
        return (bool) $page_template;

    if ( $template == $page_template )
        return true;

    if ( is_array( $template ) ) {
        if ( ( in_array( 'default', $template, true ) && ! $page_template )
            || in_array( $page_template, $template, true )
        ) {
            return true;
        }
    }

    return ( 'default' === $template && ! $page_template );
}

/**
 * Get the specific template filename for a given post.
 *
 * @since 3.4.0
 * @since 4.7.0 Now works with any post type, not just pages.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string|false Page template filename. Returns an empty string when the default page template
 *                      is in use. Returns false if the post does not exist.
 */
function get_page_template_slug( $post = null ) {
	$post = get_post( $post );

	if ( ! $post ) {
		return false;
	}

	$template = get_post_meta( $post->ID, '_wp_page_template', true );

	if ( ! $template || 'default' === $template ) {
		return '';
	}

	return $template;
}



/** Custom Post Type Template Selector **/
function cpt_add_meta_boxes() {
    $post_types = get_post_types();
    foreach( $post_types as $ptype ) {
        if ( $ptype !== 'page') {
            add_meta_box( 'cpt-selector', 'Attributes', 'cpt_meta_box', $ptype, 'side', 'core' );
        }
    }
}
add_action( 'add_meta_boxes', 'cpt_add_meta_boxes' );

function cpt_remove_meta_boxes() {
    $post_types = get_post_types();
    foreach( $post_types as $ptype ) {
        if ( $ptype !== 'page') {
            remove_meta_box( 'pageparentdiv', $ptype, 'normal' );
        }
    }
}
add_action( 'admin_menu' , 'cpt_remove_meta_boxes' );

function cpt_meta_box( $post ) {
    $post_meta = get_post_meta( $post->ID );
    $templates = wp_get_theme()->get_page_templates();

    $post_type_object = get_post_type_object($post->post_type);
    if ( $post_type_object->hierarchical ) {
        $dropdown_args = array(
            'post_type'        => $post->post_type,
            'exclude_tree'     => $post->ID,
            'selected'         => $post->post_parent,
            'name'             => 'parent_id',
            'show_option_none' => __('(no parent)'),
            'sort_column'      => 'menu_order, post_title',
            'echo'             => 0,
        );

        $dropdown_args = apply_filters( 'page_attributes_dropdown_pages_args', $dropdown_args, $post );
        $pages = wp_dropdown_pages( $dropdown_args );

        if ( $pages ) { 
            echo "<p><strong>Parent</strong></p>";
            echo "<label class=\"screen-reader-text\" for=\"parent_id\">Parent</label>";
            echo $pages;
        }
    }

    // Template Selector
    echo "<p><strong>Template</strong></p>";
    echo "<select id=\"cpt-selector\" name=\"_wp_page_template\"><option value=\"default\">Default Template</option>";
    foreach ( $templates as $template_filename => $template_name ) {
        if ( $post->post_type == strstr( $template_filename, '-', true) ) {
            if ( isset($post_meta['_wp_page_template'][0]) && ($post_meta['_wp_page_template'][0] == $template_filename) ) {
                echo "<option value=\"$template_filename\" selected=\"selected\">$template_name</option>";
            } else {
                echo "<option value=\"$template_filename\">$template_name</option>";
            }
        }
    }
    echo "</select>";

    // Page order
    echo "<p><strong>Order</strong></p>";
    echo "<p><label class=\"screen-reader-text\" for=\"menu_order\">Order</label><input name=\"menu_order\" type=\"text\" size=\"4\" id=\"menu_order\" value=\"". esc_attr($post->menu_order) . "\" /></p>";
}

function save_cpt_template_meta_data( $post_id ) {

    if ( isset( $_REQUEST['_wp_page_template'] ) ) {
        update_post_meta( $post_id, '_wp_page_template', $_REQUEST['_wp_page_template'] );
    }
}
add_action( 'save_post' , 'save_cpt_template_meta_data' );

function custom_single_template($template) {
    global $post;

    $post_meta = ( $post ) ? get_post_meta( $post->ID ) : null;
    if ( isset($post_meta['_wp_page_template'][0]) && ( $post_meta['_wp_page_template'][0] != 'default' ) ) {
        $template = get_template_directory() . '/' . $post_meta['_wp_page_template'][0];
    }

    return $template;
}
add_filter( 'single_template', 'custom_single_template' );
/** END Custom Post Type Template Selector **/