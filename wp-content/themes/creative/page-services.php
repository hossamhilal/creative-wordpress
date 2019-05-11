<?php get_header(); ?>

    <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
        <?php
        if(function_exists('bcn_display'))
        {
            bcn_display();
        }
        ?>
    </div>

    <div class="services internal-page">
        <div class="container">
            <div class="basic-title">
                <h1>  <?php the_field('services_title', 'option'); ?> </h1>
                <p>  <?php the_field('services_description', 'option'); ?> </p>
            </div>

            <?php
            $item = array('post_type' => 'services');
            $query = new WP_Query($item);

            if ($query->have_posts()) { ?>
                <div class="slider">
                    <div class="row">
                        <?php
                        $i = 1;
                        while ($query->have_posts()) {
                            $query->the_post(); ?>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="item color-<?php echo $i ?>">
                                    <div class="service-box">
                                        <div class="data">
                                            <div class="icon"><img src="<?php the_field('image'); ?>"></div>
                                            <h3> <?php the_title() ?>  </h3>
                                            <?php the_content() ?>
                                            <a href="<?php the_permalink()?> ">
                                                <span> <i class="icofont-plus"></i> </span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++;
                        } ?>
                    </div>
                </div>
            <?php }
            wp_reset_postdata(); ?>
        </div>
    </div>


<?php get_footer();