<?php

function load_styles()
{
    wp_enqueue_style("bootstrap", get_template_directory_uri() . "/assets/css/bootstrap/bootstrap.min.css");
    wp_enqueue_style("main", get_template_directory_uri() . "/assets/css/main.css");
}

add_action( "wp_enqueue_scripts", "load_styles" );
