<?php get_header();
$this_post = $post->ID;?>

<section id="countdown">
    <img src="<?php echo get_template_directory_uri();?>/images/iisp-adminblock-1.jpeg">
    <div class="countdown-container">
        <div class="countdown-title">IISP MUN Countdown!</div>

        <div id="countdown-timer">
            <div class="timer">
                <div class="timer-number">
                    <div id="days0"><?php the_field("start_date");?></div>
                    <div id="days1"></div>
                    <div id="days2"></div>
                </div>
                <div class="timer-subtitle">Days</div>
            </div>

            <div class="colon">
                <div></div>
                <div></div>
            </div>

            <div class="timer">
                <div class="timer-number">
                    <div id="hours0"></div>
                    <div id="hours1"></div>
                </div>
                <div class="timer-subtitle">Hours</div>
            </div>

            <div class="colon">
                <div></div>
                <div></div>
            </div>

            <div class="timer">
                <div class="timer-number">
                    <div id="minutes0"></div>
                    <div id="minutes1"></div>
                </div>
                <div class="timer-subtitle">Minutes</div>
            </div>
        </div>

        <div class="countdown-text"><?php the_field("short_description");?></div>

        <script>
            const countDownDate = new Date(document.getElementById("days0").innerHTML).getTime();

            function updateCountdown() {
                let now = new Date().getTime();
                let distance = countDownDate - now;

                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                days = String(days).padStart(3, '0');
                hours = String(hours).padStart(2, '0');
                minutes = String(minutes).padStart(2, '0');

                if (days.at(0) === "0") {
                    document.getElementById("days0").hidden = true;
                }
                document.getElementById("days0").innerHTML = days.at(0)
                document.getElementById("days1").innerHTML = days.at(1)
                document.getElementById("days2").innerHTML = days.at(2)

                document.getElementById("hours0").innerHTML = hours.at(0)
                document.getElementById("hours1").innerHTML = hours.at(1)

                document.getElementById("minutes0").innerHTML = minutes.at(0)
                document.getElementById("minutes1").innerHTML = minutes.at(1)

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }

            updateCountdown()
            const x = setInterval(updateCountdown, 60000);

        </script>
    </div>
</section>

<section id="theme">
    <h1>
        <?php
        $theme = explode( " ", get_field( "theme" ) );
        foreach ( $theme as $word ) {
            echo "<span>" . $word . " </span>";
        }?>
    </h1>
    <div class="theme-container">
        <div class="logo">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            if ( $custom_logo_id ) {
                echo wp_get_attachment_image( $custom_logo_id, 'full', false, array( 'loading' => false ) );
            }?>
        </div>
        <div class="theme-description"><p><?php the_field( "theme_description" );?></p></div>
    </div>
    <div><p><?php the_field( "long_description" );?></p></div>
</section>

<section id="committees">
    <h1><span>IISP MUN</span> Committees</h1>
    <p><?php the_field( "committees_description" );?></p>

    <div class="container-fluid">
        <div class="row committees-container">
            <?php
            $the_query = new WP_Query( array(
                'posts_per_page' => -1,
                'post_type' => 'iispmun_committees') );

            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    if ( get_field( "edition" ) == $this_post ) {
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

<?php echo do_shortcode("[instagram-feed feed=1]");?>

<section id="letters">

        <?php
        $the_query = new WP_Query( array(
            'posts_per_page' => -1,
            'post_type' => 'iispmun_people') );
        $people = array();

        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                if ( get_field( "edition" ) == $this_post and get_field( "has_letter" ) ) {
                    array_push( $people, $post->ID )
                    ?>
                    <div class="letter-container" style="display: none">
                        <div class="letter-dp">
                            <a href="<?php the_permalink();?>">
                                <img src="<?php the_field( "profile_picture" );?>">
                            </a>
                        </div>

                        <div class="letter-text">
                            <a href="<?php the_permalink();?>">
                                <span class="name"><?php the_title();?></span>
                            </a>
                            <span class="position"><?php the_field( "position" );?></span>
                            <p class="letter"><?php the_field( "letter" );?></p>
                        </div>
                    </div>
                    <?php
                }
            }
        } ?>

    <div class="people-list">
        <?php
        $i = 0;
        foreach ( $people as $post ) {
            ?>
            <a class="dp-container">
                <div>
                    <img src="<?php the_field( "profile_picture", $post );?>" onclick="showLetter(<?php echo $i;?>)">
                </div>
            </a>
            <?php
            $i++;
        } ?>
    </div>

    <script>
        const letters = document.getElementsByClassName("letter-container")

        function showLetter(n) {
            for (let i = 0; i < letters.length; i++) {
                if (i === n) {
                    letters[i].style.display = "flex";
                }
                else {
                    letters[i].style.display = "none";
                }
            }
        }
        showLetter(0)
    </script>
</section>

<section id="press">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 thumbnail-container">
                <a href="<?php the_permalink();?>">
                    <div class="thumbnail">
                        <?php
                        global $post;
                        $post = wp_get_recent_posts( array( "numberposts" => 1 ) )[0];
                        setup_postdata( $post );
                        the_post_thumbnail( $post["ID"], "full" );
                        ?>
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

<section id="countries">
    <h2>Countries Represented at Indus</h2>
    <div class="flags-container">
        <?php
        $images = acf_photo_gallery( 'countries', $this_post );
        foreach ($images as $image) {?>
            <div class="flag">
                <img src="<?php echo $image['full_image_url'];?>">
            </div>
        <?php
        }
        ?>
    </div>
</section>

<?php get_footer();?>