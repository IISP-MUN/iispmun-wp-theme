<section id="committees">
    <p><?php global $edition; the_field( "committees_description", $edition );?></p>

    <div class="container-fluid">
        <div class="row committees-container">
            <?php
            $the_query = new WP_Query( array(
                'posts_per_page' => -1,
                'post_type' => 'iispmun_committees') );

            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    if ( get_field( "edition" ) == $edition->ID ) {
                        ?>
                        <div class="col-6 col-sm-4 col-md-3 committee">
                            <div>
                                <a href="<?php the_permalink();?>">
                                    <div>
                                        <img src="<?php the_field( "logo" );?>">
                                    </div>
                                    <div><h2><?php the_field( "acronym" );?></h2></div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
