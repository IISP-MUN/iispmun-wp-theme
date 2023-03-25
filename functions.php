<?php

function load_styles_and_scripts()
{
    wp_enqueue_style( "bootstrap", get_template_directory_uri() . "/assets/css/bootstrap/bootstrap.min.css" );
    wp_enqueue_style( "main", get_template_directory_uri() . "/assets/css/main.css" );

    wp_enqueue_script("jquery");
    wp_enqueue_script("bootstrap", get_template_directory_uri() . "/assets/js/bootstrap.min.js", "jquery" );
}

function load_custom_post_types()
{
    register_post_type( "iispmun_editions", array(
            "labels" => array(
                "name" => "Editions",
                "singular_name" => "Edition"),

            "description" => "All the editions of the IISP MUN",
            "public" => true,
            "menu_icon" => "dashicons-tickets-alt",
            "supports" => array( "custom-fields", "title", "editor" ),
            "has_archive" => false,
            "rewrite" => array( "slug" => "mun" ),
		    "show_in_rest" => true,
        )
    );

    register_post_type( "iispmun_committees", array(
            "labels" => array(
                "name" => "Committees",
                "singular_name" => "Committee",
                "add_new" => "New Committee",
                "add_new_item" => "Add New Committee",
                "edit_item" => "Edit Committee",
                "new_item" => "New Committee",
                "view_item" => "View Committee",
                "view_items" => "View Committees",
                "search_items" => "Search Committees",
                "not_found" => "No committees found",
                "not_found_in_trash" => "No committees found in trash",
                "all_items" => "All Committees",
                "archives" => "Committee Archives",
                "attributes" => "Committee Attributes",
                "insert_into_item" => "\Insert into committee",
                "uploaded_to_this_item" => "Uploaded to this committee",
                "filter_items_list" => "Filter committees list",
                "items_list_navigation" => "Committees list navigation",
                "items_list" => "Committees list",
                "item_published" => "Committee published",
                "item_published_privately" => "Committee published privately",
                "item_reverted_to_draft" => "Committee reverted to draft",
                "item_scheduled" => "Committee scheduled",
                "item_updated" => "Committee updated",
                "item_link" => "Committee Link",
                "item_link_description" => "A link to an committee"),

            "description" => "All the committees of the IISP MUN",
            "public" => true,
            "menu_icon" => "dashicons-admin-site",
            "supports" => array( "custom-fields", "title", "thumbnail" ),
            "has_archive" => false,
            "rewrite" => array( "slug" => "committees" )
        )
    );

    register_post_type( "iispmun_socials", array(
            "labels" => array(
                "name" => "Social Platforms",
                "singular_name" => "Social Platform",
                "add_new" => "New Social Platform",
                "add_new_item" => "Add New Social Platform",
                "edit_item" => "Edit Social Platform",
                "new_item" => "New Social Platform",
                "view_item" => "View Social Platform",
                "view_items" => "View Social Platforms",
                "search_items" => "Search Social Platforms",
                "not_found" => "No social platforms found",
                "not_found_in_trash" => "No social platforms found in trash",
                "all_items" => "All Social Platforms",
                "archives" => "Social Platform Archives",
                "attributes" => "Social Platform Attributes",
                "insert_into_item" => "\Insert into social platform",
                "uploaded_to_this_item" => "Uploaded to this social platform",
                "filter_items_list" => "Filter social platforms list",
                "items_list_navigation" => "Social Platforms list navigation",
                "items_list" => "Social Platforms list",
                "item_published" => "Social Platform published",
                "item_published_privately" => "Social Platform published privately",
                "item_reverted_to_draft" => "Social Platform reverted to draft",
                "item_scheduled" => "Social Platform scheduled",
                "item_updated" => "Social Platform updated",
                "item_link" => "Social Platform Link",
                "item_link_description" => "A link to an social platform"),

            "description" => "All the social media platforms of the IISP MUN",
            "public" => true,
            "exclude_from_search" => true,
            "publicly_queryable" => false,
            "menu_icon" => "dashicons-share",
            "has_archive" => false,
            "supports" => array( "custom-fields", "title" ),
        )
    );

    register_post_type( "iispmun_people", array(
            "labels" => array(
                "name" => "People",
                "singular_name" => "Person",
                "add_new" => "New Person",
                "add_new_item" => "Add New Person",
                "edit_item" => "Edit Person",
                "new_item" => "New Person",
                "view_item" => "View Person",
                "view_items" => "View People",
                "search_items" => "Search People",
                "not_found" => "No people found",
                "not_found_in_trash" => "No people found in trash",
                "all_items" => "All People",
                "archives" => "Person Archives",
                "attributes" => "Person Attributes",
                "insert_into_item" => "\Insert into person",
                "uploaded_to_this_item" => "Uploaded to this person",
                "filter_items_list" => "Filter people list",
                "items_list_navigation" => "People list navigation",
                "items_list" => "People list",
                "item_published" => "Person published",
                "item_published_privately" => "Person published privately",
                "item_reverted_to_draft" => "Person reverted to draft",
                "item_scheduled" => "Person scheduled",
                "item_updated" => "Person updated",
                "item_link" => "Person Link",
                "item_link_description" => "A link to an person"),

            "description" => "All the people involved in the IISP MUN",
            "public" => true,
            "menu_icon" => "dashicons-businessperson",
            "supports" => array( "custom-fields", "title" ),
            "has_archive" => false,
            "rewrite" => array( "slug" => "people" )
        )
    );
}

function register_menus() {
    register_nav_menus(
        array(
            "header-default" => ( "Default Header Menu" ),
            "footer-default" => ( "Default Footer Menu" )
        )
    );
}

function remove_admin_bar()
{
    show_admin_bar(false);
}

add_action( "wp_enqueue_scripts", "load_styles_and_scripts" );
add_action( "init", "load_custom_post_types");
add_action( "init", "register_menus");
add_action( "after_setup_theme", "remove_admin_bar" );

function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter( 'the_content', 'filter_ptags_on_images' );

function filter_wrap_pdfs($content){
    return preg_replace('/\[pdf-embedder url="(.*)"]/', '<div class="pdf-container" onclick="window.location=\'\1\'">[pdf-embedder url="\1"]</div>', $content);
}
add_filter( 'the_content', 'filter_wrap_pdfs' );

add_theme_support( "menus" );
add_theme_support( "custom-logo" );
add_theme_support( 'post-thumbnails' );

function load_fonts() {
    wp_enqueue_style(
        'google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900,italic', false );

}
add_action( 'wp_enqueue_scripts', 'load_fonts' );

define( 'IISP_MUN_VERSION', wp_get_theme()->get( 'Version' ) );

function iisp_mun_setup() {
	add_editor_style( './assets/css/style-shared.min.css' );

	$styled_blocks = [ 'button', 'quote' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "iisp-mun-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.min.css" ),
			'path'   => get_theme_file_path( "assets/css/blocks/$block_name.min.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}
}
add_action( 'after_setup_theme', 'iisp_mun_setup' );

function iisp_mun_styles() {
	wp_enqueue_style(
		'iisp-mun-style',
		get_stylesheet_uri(),
		[],
		IISP_MUN_VERSION
	);
	wp_enqueue_style(
		'iisp-mun-shared-styles',
		get_theme_file_uri( 'assets/css/style-shared.min.css' ),
		[],
		IISP_MUN_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'iisp_mun_styles' );

require_once get_theme_file_path( 'inc/register-block-styles.php' );
require_once get_theme_file_path( 'inc/register-block-patterns.php' );
