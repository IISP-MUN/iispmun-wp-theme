<?php

function load_fonts()
{
    wp_enqueue_style(
        "google-fonts", "https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900,italic", false);
}

add_action("wp_enqueue_scripts", "load_fonts");
