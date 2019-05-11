<?php get_header(); ?>

<div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php
    if(function_exists('bcn_display'))
    {
        bcn_display();
    }
    ?>
</div>

    <div class="single_page">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="basic-title">
                    <h1> <?php the_title(); ?> </h1>
                    <?php the_content(); ?>
                </div>

                <div class="details">
                    <h2> <?php the_field('section-title'); ?>  </h2>
                    <p>  <?php the_field('section-description'); ?>  </p>
                    <?php
                    $link = get_field('prperites');
                    if(get_field('prperites')): ?>
                        <ul>
                            <?php while(has_sub_field('prperites')): ?>
                                <li> <?php the_sub_field('props'); ?>  </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <button class="btn-animate"> إطلب الخدمة   <span></span></button>

            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>



<?php get_footer();