<?php

function register_iispmun_editions()
{
    register_post_type("iispmun_editions", array(
            "labels" => array(
                "name" => "Editions",
                "singular_name" => "Edition"
            ),

            "description" => "All the editions of the IISP MUN",
            "menu_icon" => "dashicons-tickets-alt",

            "supports" => array("custom-fields", "title", "editor"),
            "rewrite" => array("slug" => "mun"),

            "public" => true,
            "has_archive" => false,
            "show_in_rest" => true,
        )
    );
}

add_action( "init", "register_iispmun_editions");
