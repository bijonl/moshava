<?php
/**
 * Menu Items Custom Post Type
 *
 * This custom post type adds support for menu items. This file declares
 * basic support for the post type, while the fields are managed by the
 * Advanced Custom Fields plugin.
 */

 function register_custom_post_type_menu_items() {
    $labels = apply_filters( 'menu_items_post_type_labels', array(
        'name'               => 'Menu Items',
        'singular_name'      => 'Menu Item',
        'menu_name'          => 'Menu Items',
        'add_new'            => 'Add New Menu Item',
        'add_new_item'       => 'Add Menu Item',
        'edit'               => 'Edit',
        'edit_item'          => 'Edit Menu Item',
        'new_item'           => 'New Menu Item',
        'view'               => 'View Menu Item',
        'view_item'          => 'View Menu Item',
        'search_items'       => 'Search Menu Items',
        'not_found'          => 'No Menu Item',
        'not_found_in_trash' => 'No Menu Items Found in Trash',
        'parent'             => 'Parent Menu Items',
    ));

    $args = apply_filters( 'menu_item_post_type_args', array(
        'label'               => 'menu_items',
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'capability_type'     => 'page',
        'hierarchical'        => true,
        'query_var'           => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'menu_icon'           => 'dashicons-star-filled',
        'show_in_rest'        => true,
        'supports'            => array( 'title', 'thumbnail', 'editor'),
        'labels'              => $labels,
        'map_meta_cap'        => true,
    ));

    register_post_type( 'menu_items', $args );
}
add_action( 'init', 'register_custom_post_type_menu_items' );


// Run once for user permissions

add_action( 'admin_init', 'add_menu_item_caps');
function add_menu_item_caps() {
$roles = array('administrator','editor');

foreach($roles as $the_role) {
    $role = get_role($the_role);
        $role->add_cap( 'edit_menu_item' );
        $role->add_cap( 'read_menu_item' );
        $role->add_cap( 'delete_menu_item' );
        $role->add_cap( 'edit_menu_item' );
        $role->add_cap( 'edit_others_menu_item' );
        $role->add_cap( 'publish_menu_item' );
        $role->add_cap( 'read_private_menu_item' );
    }
}