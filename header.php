<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IISP MUN</title>

    <?php wp_head();?>
</head>
<body>

<header>
    <div class="logo-container">
        <div class="logo">
            <?php the_custom_logo();?>
        </div>
        <div class="logo-text">
            <a href="<?php echo home_url();?>">
                <div class="logo-shorttitle">
                    IISP <span>MUN</span>
                </div>
                <div class="logo-subtitle">
                    Indus International School Pune
                </div>
                <div class="logo-title">
                    Model <span>United Nations<span>
                </div>
            </a>
        </div>
    </div>

    <?php
    if ( get_field( "edition" ) ) {
        wp_nav_menu(
                array(
                    "menu" => get_field( "header_navigation_menu", get_field( "edition" ) ),
                    "depth" => 2
                )
        );
    }
    else {
        wp_nav_menu(
            array(
                "theme_location" => "header-default" ,
                "depth" => 2
            )
        );
    }
    ?>
</header>
