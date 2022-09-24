<?php get_header();
global $post;
global $edition;

$edition = $post;
?>

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

        <div class="countdown-dates">
            <?php
            echo DateTime::createFromFormat('M j, Y g:i', get_field("start_date") )->format( "D, F j - " );
            the_field("end_date");?>
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

    <h1><span>IISP MUN</span> Committees</h1>
</section>

<?php
get_template_part( 'template-parts/template', 'all-committees' );
echo do_shortcode("[instagram-feed feed=1]");?>

<section id="letters">
        <?php
        $people = array();
        foreach ( get_field( "letters", $edition ) as $person ) {
            $post = $person;
            setup_postdata( $post );
            $people[] = $person;?>
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

<?php
$query = new WP_Query( array( "numberposts" => 1, "posts_per_page" => 1, "post_status" => "publish" ) );
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();

        get_template_part( 'template-parts/template', 'post-preview' );
} } ?>

<section id="countries">
    <h2>Countries Represented at Indus</h2>
    <div class="flags-container">
        <?php
        $images = acf_photo_gallery( "countries", $edition->ID );
        foreach ( $images as $image ) {?>
            <div class="flag">
                <img src="<?php echo $image['full_image_url'];?>">
            </div>
        <?php
        }
        ?>
    </div>
</section>

<?php get_footer();?>