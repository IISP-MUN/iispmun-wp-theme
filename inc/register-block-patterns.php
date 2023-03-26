<?php

function iispmun_register_patterns()
{
    register_block_pattern(
        "iispmun/mun-theme",
        array(
            "title" => __("MUN Theme", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/mun-theme.html")),
        )
    );

    register_block_pattern(
        "iispmun/primary-accented-heading",
        array(
            "title" => __("Primary Accented Heading", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/primary-accented-heading.html")),
        )
    );

    register_block_pattern(
        "iispmun/secondary-accented-heading",
        array(
            "title" => __("Secondary Accented Heading", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/secondary-accented-heading.html")),
        )
    );

    register_block_pattern(
        "iispmun/hover-card",
        array(
            "title" => __("Hover Card", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/hover-card.html")),
        )
    );

    register_block_pattern(
        "iispmun/hover-card-with-image",
        array(
            "title" => __("Hover Card with Image", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/hover-card-with-image.html")),
        )
    );

    register_block_pattern(
        "iispmun/committee-hover-card",
        array(
            "title" => __("Committee Hover Card", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/committee-hover-card.html")),
        )
    );

    register_block_pattern(
        "iispmun/mun-committees",
        array(
            "title" => __("IISP MUN Committees", "iispmun"),
            "content" => file_get_contents(get_theme_file_path("patterns/mun-committees.html")),
        )
    );
}

add_action("init", "iispmun_register_patterns");
