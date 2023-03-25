<?php

function register_iispmun_socials()
{
    register_post_type( "iispmun_socials", array(
            "labels" => array(
                "name" => "Social Platforms",
                "singular_name" => "Social Platform"
            ),

            "description" => "All the social media platforms of the IISP MUN",
            "menu_icon" => "dashicons-share",

            "supports" => array( "custom-fields", "title" ),

            "public" => true,
            "has_archive" => false,
            "exclude_from_search" => true,
            "publicly_queryable" => false,
        )
    );
}

add_action( "init", "register_iispmun_socials");
