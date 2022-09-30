<?php get_header( null, ['title' => get_field( "name" ) . ' - IISP MUN'] );?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="blog-header" id="header">
    <img src="<?php the_post_thumbnail_url();?>">
    <div class="text">
        <h1><?php the_field( "name" );?></h1>
        <h4><?php the_field( "acronym" );?>, IISP MUN <?php echo get_the_title( get_field( "edition" ) );?></h4>
    </div>
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

    <div class="committee-container single-committee">
        <div class="committee">
            <div>
                <a href="#header">
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
        </div>
    </div>
</div>

<?php  if ( get_field( "background_guide" ) ) {?>
    <section id="background-guide">
        <div class="container">
            <div class="blog-content">
                <h1>Resources</h1>
                <div class="row">
                    <div class="col-sm-6 pdf-container" onclick="window.location='<?php the_field( "background_guide" );?>';">
                        <?php echo do_shortcode( '[pdf-embedder url="' . get_field( 'background_guide' ) . '"]' );?>
                    </div>
                    <div class="col-sm-6 pdf-container" onclick="window.location='<?php the_field( "country_matrix" );?>';">
                        <?php echo do_shortcode( '[pdf-embedder url="' . get_field( 'country_matrix' ) . '"]' );?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }?>

<?php  if ( get_field( "letter" ) ) {?>
    <section id="blog">
        <div class="container">
            <div class="blog-content">
                <div class="letter">
                    <h1>Letter from Secretariat</h1>
                    <?php the_field("letter"); ?>
                </div>
            </div>
        </div>
    </section>
<?php }?>

<?php endwhile; endif; ?>
<?php get_footer();?>