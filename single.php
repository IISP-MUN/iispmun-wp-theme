<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="blog-header">
    <img src="<?php the_post_thumbnail_url();?>">
    <div class="text">
        <h1><?php the_title();?></h1>
        <h4><?php the_author();?></h4>
    </div>
</div>

<section id="blog">
    <div class="container">
        <div class="blog-content">
            <h1><?php the_title(); ?></h1>
            <h5><?php echo get_author_name(); ?></h5>
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