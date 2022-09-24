<section id="press">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 thumbnail-container">
                <a href="<?php the_permalink();?>">
                    <div class="thumbnail">
                        <?php the_post_thumbnail();?>
                    </div>
                </a>
            </div>
            <div class="col-lg-7 text">
                <a href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
                </a>
                <span class="author"><?php the_author();?></span>
                <span class="date"><?php the_date();?></span>

                <?php the_excerpt();?>
                <a href="<?php the_permalink();?>"><p class="read-more">Read More</p></a>
            </div>
        </div>
    </div>
</section>
