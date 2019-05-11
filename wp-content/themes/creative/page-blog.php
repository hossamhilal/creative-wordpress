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
                <div class="row">
                    <?php
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <div class="col-12 col-sm-6 col-lg-4">
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
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</div>


<?php get_footer();