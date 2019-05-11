<?php get_header(); ?>

    <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
        <?php
        if(function_exists('bcn_display'))
        {
            bcn_display();
        }
        ?>
    </div>


    <div class="packages internal-page">
        <div class="container">
            <div class="basic-title">
                <h1>  <?php the_field('packages_title', 'option'); ?> </h1>
                <p>  <?php the_field('packages_description', 'option'); ?> </p>
            </div>

            <div class="packages-slider">
                <div class="row">
                    <?php
                    $i = 1;
                    $item = array('post_type' => 'packages');
                    $query = new WP_Query($item);

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="item color-<?php echo $i ?>">
                                    <div class="package-offer">
                                        <div class="head">
                                            <h2> <?php the_title() ?>  </h2>
                                        </div>
                                        <h1>  <?php the_field('price') ?>  </h1>

                                        <?php if (get_field('properites')): ?>
                                            <ul>
                                                <?php while (has_sub_field('properites')): ?>
                                                    <li>
                                                        <label> <?php the_sub_field('title'); ?>  </label>
                                                        <span>  <?php the_sub_field('description'); ?>  </span>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="buttons">
                                            <a class="btn btn-green"
                                               href="https://api.whatsapp.com/send?phone=<?php the_field('phone', 'option'); ?> ">
                                                <i class="icofont-whatsapp"></i> </a>
                                            <a class="btn btn-green"> إشترك الآن </a>
                                            <a class="btn btn-green" href="tel:<?php the_field('phone', 'option'); ?> ">
                                                <i class="icofont-ui-call"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++;
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </div>
    </div>


<?php get_footer();