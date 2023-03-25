<?php get_header(null, ['title' => 'Articles & Press - IISP MUN']);?>
// test
<div class="title-container">
    <div>
        <img src="<?php echo get_template_directory_uri();?>/images/iisp-adminblock-2.jpeg">
    </div>
    <h1 class="title">Articles & Press</h1>
</div>

<?php if ( have_posts() ) {
    while (have_posts()) {
        the_post();
        get_template_part('template-parts/template', 'post-preview');
    }
}

echo do_shortcode("[instagram-feed feed=1]");

get_footer();?>
