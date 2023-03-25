<?php

function register_menus() {
    register_nav_menus(
        array(
            "header-default" => ( "Default Header Menu" ),
            "footer-default" => ( "Default Footer Menu" )
        )
    );
}

add_action( "init", "register_menus");
