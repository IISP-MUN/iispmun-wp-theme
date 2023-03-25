<?php

add_theme_support( "menus" );
add_theme_support( "custom-logo" );
add_theme_support( "post-thumbnails" );

require_once get_theme_file_path( "inc/remove-admin-bar.php" );

require_once get_theme_file_path( "inc/load-styles.php" );
require_once get_theme_file_path( "inc/load-scripts.php" );
require_once get_theme_file_path( "inc/load-fonts.php" );

require_once get_theme_file_path( "inc/register-iispmun_editions.php" );
//require_once get_theme_file_path( "inc/register-iispmun_committees.php" );
//require_once get_theme_file_path( "inc/register-iispmun_people.php" );
//require_once get_theme_file_path( "inc/register-iispmun_socials.php" );
//require_once get_theme_file_path( "inc/register-menus.php" );

//require_once get_theme_file_path( "inc/add-content-filters.php" );

require_once get_theme_file_path( "inc/register-block-styles.php" );
require_once get_theme_file_path( "inc/register-block-patterns.php" );

require_once get_theme_file_path( "inc/remove-core-block-patterns.php" );
