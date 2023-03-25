<?php

function register_iispmun_people()
{
    register_post_type( "iispmun_people", array(
            "labels" => array(
                "name" => "People",
                "singular_name" => "Person"
            ),

            "description" => "All the people involved in the IISP MUN",
            "menu_icon" => "dashicons-businessperson",

            "supports" => array( "custom-fields", "title" ),
            "rewrite" => array( "slug" => "people" ),

            "public" => true,
            "has_archive" => false,
            "show_in_rest" => true,
        )
    );
}

add_action( "init", "register_iispmun_people");
