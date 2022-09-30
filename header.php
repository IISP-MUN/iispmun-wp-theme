<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php if ($args['title']){
            $title = $args['title'];
        }
        else {
            $title = "IISP MUN";
        }
        echo $title;?>
    </title>

    <?php if ( is_single() ) {?>
        <meta name="author" content="<?php the_author();?>">
    <?php }?>

    <meta property="og:title" content="<?php echo $title;?>">
    <meta property="og:site_name" content="IISP Model United Nations">
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?php the_post_thumbnail_url();?>">
    <meta property="og:url" content="<?php the_permalink();?>">

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
