<?php

function load_scripts()
{
    wp_enqueue_script("jquery");
    wp_enqueue_script("bootstrap", get_template_directory_uri() . "/assets/js/bootstrap.min.js", "jquery" );
}

add_action( "wp_enqueue_scripts", "load_scripts" );
