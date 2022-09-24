<?php
global $post;
$post = get_post( get_field( "edition" ) );
setup_postdata( get_field( "edition" ) );

get_template_part( 'single', 'iispmun_editions' );
