<?php
/*
Template Name: Committees
*/

$edition = get_post( get_field( "edition" ) );
get_header(null, ['title' =>  'IISP Model United Nations ' . get_the_title( $edition->ID ) . ' Committees - IISP MUN']);

global $edition;?>

<div class="title-container">
    <div>
        <img src="<?php echo get_template_directory_uri();?>/images/iisp-adminblock-2.jpeg">
    </div>
    <h1 class="title">IISP MUN Committees</h1>
</div>

<?php

get_template_part( 'template-parts/template', 'all-committees' );

$the_query = new WP_Query( array(
    'posts_per_page' => -1,
    'post_type' => 'iispmun_committees') );

if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        if ( get_field( "edition" ) == $edition->ID ) {
            ?>
            <section class="single-committee">
                <div class="image-container">
                    <img class="committee-image" src="<?php the_post_thumbnail_url();?>">
                </div>

                <div class="container">
                    <a href="<?php the_permalink();?>"><h1 class="committee-name"><?php the_field( "name" );?></h1></a>
                    <div class="committee-subheader">
                        <span class="grade committee-subtitle">
                            Grades <?php the_field( "min_grade" );?>-<?php the_field( "max_grade" );?>
                        </span>
                        <?php if ( get_field("beginner") ) {?>
                        <span class="beginner committee-subtitle">Beginner Committee</span>
                        <?php }
                        if ( get_field("crisis") ) {?>
                        <span class="crisis committee-subtitle">Crisis Committee</span>
                        <?php } ?>
                    </div>

                    <div class="committee-container">
                        <div class="committee">
                            <div>
                                <a href="<?php the_permalink();?>">
                                    <div>
                                        <img src="<?php the_field( "logo" );?>">
                                    </div>
                                    <div><h2><?php the_field( "acronym" );?></h2></div>
                                    <div class="delegates">
                                        <strong><?php the_field( "delegates" );?> Delegates</strong>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="committee-body">
                            <strong><?php the_field( "agenda" );?></strong>
                            <p class="agenda"><?php the_field( "agenda_description" );?></p>
                            <a href="<?php the_permalink();?>"><p class="read-more">Read More</p></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

get_footer();?>