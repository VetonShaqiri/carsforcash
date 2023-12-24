<?php

/**
 * Template Name: Contact
 */
?>

<?php get_header(); ?>


<section class="HeroBanner" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
    <div class="container">
        <div class="HeroBanner-wrapper">
            <div class="HeroBanner-image">
                <img  src="<?php the_field('hero_banner_logo'); ?>" alt="">
            </div>
            <h1><?php the_field('hero_banner_heading'); ?></h1>
            
        </div>
    </div>
</section>

<?php get_footer(); ?>