<?php

/**
 * Template Name: Home
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
            <div class="subheading">
                <?php the_field('hero_banner_subheading'); ?>
            </div>
            <div class="HeroBanner-button">
                <a class="buttonhover" href="<?php the_field('hero_banner_button_url'); ?>"><?php the_field('hero_banner_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="TwoDifferetSection-wrapper">
    <section class="CtaModule" style="background-image: url(<?php the_field('cta_background'); ?>);">
        <div class="CtaModule-wrapper">
            <h3><?php the_field('cta_title'); ?></h3>
            <div class="CtaModule-content">
            <p><?php the_field('cta_content'); ?></p> 
            </div>
            <div class="CtaModule-button">
                <a class="buttonhover" href="<?php the_field('cta_button_link'); ?>"><?php the_field('cta_button_text'); ?></a>
            </div>
        </div>
    </section>
    <section class="Caffe">
        <?php $featured_product = get_field('featured_product'); ?>
        <div class="feature-container row">
            <?php
            $product_features = get_the_terms($featured_product, 'features'); ?>
            <div class="left-feature col-xl-3 col-lg-4 col-12">
                <?php if ($product_features) : ?>
                    <?php foreach ($product_features as $feature) : ?>
                        <?php if (get_field('left_align', 'features_' . $feature->term_id)) : ?>
                            <div class="feature-content">
                                <div class="feature-text">
                                    <div class="feature-title">
                                        <h6><?php echo esc_html($feature->name); ?></h6>
                                    </div>
                                    <div class="feature-content">
                                        <p><?php echo esc_html($feature->description); ?></p>
                                    </div>
                                </div>
                                <div class="feature-img">
                                    <img  src="<?php echo get_field('thumbnail', 'features_' . $feature->term_id); ?>" alt="<?php echo esc_html($feature->name); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="middle-img col-xl-6 col-lg-4 col-12">
                <img src="<?php echo get_the_post_thumbnail_url($featured_product); ?>" alt="Post Thumbnail">
            </div>
            <div class="right-feature col-xl-3 col-lg-4 col-12 ">
                <?php if ($product_features) : ?>
                    <?php foreach ($product_features as $feature) : ?>
                        <?php if (!get_field('left_align', 'features_' . $feature->term_id)) : ?>
                            <div class="feature-content">
                            <div class="feature-img">
                                    <img src="<?php echo get_field('thumbnail', 'features_' . $feature->term_id); ?>" alt="<?php echo esc_html($feature->name); ?>">
                                </div>
                                <div class="feature-text">
                                    <div class="feature-title">
                                        <h6><?php echo esc_html($feature->name); ?></h6>
                                    </div>
                                    <div class="feature-content">
                                        <p><?php echo esc_html($feature->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</section>


<section class="BestSelling">
    <div class="BestSelling-wrapper">
        <div class="BestSelling-Heading">
            <h3><?php the_field('bestselling_heading'); ?></h3>
            <div class="heading">
                <p><?php the_field('bestselling_content'); ?></p> 
            </div>
        </div>

        <div class="row bestselling_col">
            <div class="col-lg-6 left_bestselling">
                <div class="left_wrapper wrapper">
                    <div class="left_bestselling_content content">
                        <h5><?php the_field('left_title'); ?></h5>
                        <div class="content">
                          <p><?php the_field('left_content'); ?></p>  
                        </div>
                    </div>
                    <img src="<?php the_field('left_image'); ?>" alt="<?php the_field('left_title'); ?>">
                </div>
            </div>
            <div class="col-lg-6 right_bestselling">
                <div class="right_wrapper wrapper">
                    <img src="<?php the_field('right_image'); ?>" alt="<?php the_field('right_title'); ?>">
                    <div class="right_bestselling_content content">
                        <h5><?php the_field('right_title'); ?></h5>
                        <div class="content">
                           <p><?php the_field('right_content'); ?></p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="Testimonial">
    <div class="Testimonial-wrapper">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php

                $args = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1,
                );
                $testimonial_query = new WP_Query($args);

                $slide_counter = 0;

                while ($testimonial_query->have_posts()) {
                    $testimonial_query->the_post();
                    $active_class = ($slide_counter === 0) ? 'active' : '';


                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $slide_counter . '" class="' . $active_class . '"></li>';

                    $slide_counter++;
                }


                wp_reset_postdata();
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $testimonial_query = new WP_Query($args);

                $slide_counter = 0;

                while ($testimonial_query->have_posts()) {
                    $testimonial_query->the_post();
                    $active_class = ($slide_counter === 0) ? 'active' : ''; ?>

                    <div class="carousel-item <?php echo $active_class ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                        <div class="testimonial-card">
                            <div class="testiomnial_heading">
                                <h3>Testimonial</h3>
                            </div>
                            <div class="testimonial-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="testimonial-title">
                                <h6><?php the_title(); ?></h6>
                            </div>

                        </div>

                    </div>


                <?php
                    $slide_counter++;
                }


                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<section class="News">
    <div class="News-wrapper">
        <h3><?php the_field('news_heading'); ?></h3>
        <div class="News-content">
            <p><?php the_field('news_content'); ?></p>
        </div>
    </div>
    <div class="News-Posts">
        <div class="container">
            <div class="News-PostsWrapper row">
                <?php
                $loop = new WP_Query(array(
                    'post_type' => 'news',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post(); ?>

                        <div class="NewsCard col-lg-4 col-md-6">
                            <div class="Image">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <h6><?php the_title(); ?></h6>
                            <div class="NewsCard-Content">
                               <?php the_content(); ?>
                            </div>
                            <div class="button">
                                <a aria-label="Read more about this article: <?php the_title(); ?>" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>


                <?php endwhile;

                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>