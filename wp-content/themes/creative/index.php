<?php get_header(); ?>


    <div class="services">
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
                <div class="owl-carousel owl-theme service-owl">
                    <?php
                        $i = 1;
                        while ($query->have_posts()) {
                            $query->the_post(); ?>
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
                    <?php $i++; } ?>
                </div>
            </div>
            <?php }  wp_reset_postdata(); ?>
        </div>
    </div>


    <div class="packages">
        <div class="container">
            <div class="basic-title">
                <h1>  <?php the_field('packages_title', 'option'); ?> </h1>
                <p>  <?php the_field('packages_description', 'option'); ?> </p>
            </div>

            <div class="packages-slider">
                <div class="owl-carousel owl-theme packages-owl">
                    <?php
                    $i = 1;
                    $item = array('post_type' => 'packages');
                    $query = new WP_Query($item);

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                    ?>
                            <div class="item color-<?php echo $i ?>">
                                <div class="package-offer">
                                    <div class="head">
                                        <h2> <?php the_title() ?>  </h2>
                                    </div>
                                    <h1>  <?php  the_field('price') ?>  </h1>

                                    <?php if(get_field('properites')): ?>
                                        <ul>
                                            <?php while(has_sub_field('properites')): ?>
                                                <li>
                                                    <label> <?php the_sub_field('title'); ?>  </label>
                                                    <span>  <?php the_sub_field('description'); ?>  </span>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <div class="buttons">
                                        <a class="btn btn-green" href="https://api.whatsapp.com/send?phone=<?php the_field('phone' , 'option'); ?> ">  <i class="icofont-whatsapp"></i>   </a>
                                        <a class="btn btn-green"> إشترك الآن  </a>
                                        <a class="btn btn-green" href="tel:<?php the_field('phone' , 'option'); ?> ">  <i class="icofont-ui-call"></i> </a>
                                    </div>
                                </div>
                            </div>

                    <?php  $i++;    }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>



    <div class="team-blog-wrapper">
        <div class="container">

            <div class="team-wrapper">
                <div class="basic-title">
                    <h1>  <?php the_field('team_title', 'option'); ?> </h1>
                    <p>  <?php the_field('team_description', 'option'); ?> </p>
                </div>

                <?php
                $item = array('post_type' => 'team');
                $query = new WP_Query($item);

                if ( $query->have_posts() ) {
                    ?>
                    <div class="slider">
                        <div class="owl-carousel owl-theme team-owl">

                            <?php
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                ?>

                                <div class="item">
                                    <div class="photo">
                                        <img src="<?php the_field('image') ?>" alt="img" class="img-fluid">
                                    </div>
                                    <div class="text">
                                        <h3> <?php the_title() ?>  </h3>
                                        <p>  <?php the_field('job') ?> </p>

                                        <?php if(get_field('social')): ?>
                                            <ul class="social">
                                                <?php while(has_sub_field('social')): ?>
                                                    <li> <a href="<?php the_sub_field('link'); ?>"> <?php the_sub_field('icon'); ?> </a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); ?>
                <div class="team-fixed-data">
                    <div class="text">
                        <h3> Hossam Hilal </h3>
                        <p> UI Developer </p>
                        <ul class="social">
                            <li> <a href="#"> <i class="icofont-facebook"></i> </a></li>
                            <li> <a href="#"> <i class="icofont-twitter"></i> </a></li>
                            <li> <a href="#"> <i class="icofont-google-plus"></i> </a></li>
                            <li> <a href="#"> <i class="icofont-instagram"></i> </a></li>
                            <li> <a href="#"> <i class="icofont-linkedin"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="blog-wrapper">
                <div class="basic-title">
                    <h1>  <?php the_field('blog_title', 'option'); ?> </h1>
                    <p>  <?php the_field('blog_description', 'option'); ?> </p>
                </div>
                <?php
                $item = array('post_type' => 'blog');
                $query = new WP_Query($item);
                if ( $query->have_posts() ) {
                ?>
                <div class="sider">
                    <div class="owl-carousel owl-theme blog-owl">

                    <?php
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>

                        <div class="item">
                            <div class="blog-box">
                                <div class="pic">
                                    <img src="<?php the_field('img') ?> " alt="img" class="img-fluid">
                                </div>
                                <div class="data">
                                    <span class="date"> <?php the_time('d/m/Y') ?> </span>
                                    <h3> <?php the_title() ?> </h3>
                                    <p> <?php the_field('description') ?> </p>
                                </div>
                                <a href="<?php the_permalink()?> " class="btn-default btn-link"> قراءة المزيد </a>
                            </div>
                        </div>

                    <?php } ?>
                    </div>
                </div>
                <?php } wp_reset_postdata(); ?>
            </div>
        </div>
    </div>

    <?php
        $item = array('post_type' => 'download');
        $query = new WP_Query($item);
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();
        ?>
        <div class="download-wrapper">
            <div class="container">
                <div class="box">
                    <div class="data">
                        <h1> <?php the_title() ?> </h1>
                        <p>  <?php the_field('text') ?>  </p>
                    </div>
                    <div class="download">
                        <a href="<?php the_field('link') ?> " class="link">
                            <span> <?php the_field('icon_text') ?> </span>
                            <?php the_field('icon'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } } wp_reset_postdata(); ?>


    <div class="contact-us">
        <div class="container">
            <div class="basic-title">
                <h1>  <?php the_field('contact_title', 'option'); ?> </h1>
                <p>  <?php the_field('contact_description', 'option'); ?> </p>
            </div>
            <div class="form-box"  >
                <?php echo do_shortcode('[contact-form-7 id="116" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>

<?php get_footer();
