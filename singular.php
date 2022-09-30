<?php
if ( is_single() ) {
    get_header(null, ['title' => get_the_title() . ' - IISP MUN']);
}
else {
    get_header(null, ['title' => get_field( "title" ) . ' - IISP MUN']);
}?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="blog-header">
    <img src="<?php the_post_thumbnail_url();?>">
    <div class="text">
        <h1>
            <?php if ( is_single() ) {
                the_title();
            }
            else {
                the_field( "title" );
            }?>
        </h1>
        <h4>
            <?php if ( is_single() ) {
                the_author();
            }
            else {
                the_field( "subtitle" );
            }?>
        </h4>
    </div>
</div>

<section id="blog">
    <div class="container">
        <div class="blog-content">
            <h1>
                <?php if ( is_single() ) {
                    the_title();
                }
                else {
                    the_field( "title" );
                }?>
            </h1>
            <?php the_content(); ?>
        </div>
    </div>

    <div class="comments-section-container">
        <?php
        if (comments_open() or get_comments_number()) {
            comments_template();
        } ?>
    </div>
</section>

<?php endwhile; endif; ?>
<?php get_footer();?>