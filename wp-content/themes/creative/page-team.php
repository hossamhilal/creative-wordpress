
<?php get_header(); ?>

<div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php
    if(function_exists('bcn_display'))
    {
        bcn_display();
    }
    ?>
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
    </div>
</div>

<?php get_footer();