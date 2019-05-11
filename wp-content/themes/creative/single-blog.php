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
                <div class="article-page">
                    <div class="main-banner">
                        <img src="<?php the_field('img') ?> " alt="img" class="img-fluid">
                    </div>
                    <div class="head">
                        <h3> <?php the_title(); ?>   </h3>
                        <ul>
                            <li> <?php the_time('d/m/Y') ?> </li>
                            <li> <span> 2 </span> تعليقات </li>
                        </ul>
                    </div>
                    <div class="content">
                        <p> <?php the_field('description') ?> </p>
                        <?php
                        $link = get_field('article_section');
                        if(get_field('article_section')): ?>
                                <?php while(has_sub_field('article_section')): ?>
                                    <h3> <?php the_sub_field('article_section_title') ?> </h3>
                                    <p> <?php the_sub_field('article_section_paragraph'); ?>  </p>
                                <?php endwhile; ?>
                        <?php endif; ?>


                        <div class="tags">
                            <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                        </div>
                    </div>

<?php comments_template() ?>


                </div>

            <?php endwhile; ?>
            <?php endif; ?>

            <div class="blog-wrapper">
                <div class="basic-title">
                    <h1>  مواضيع مشابهة </h1>
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
                                        <a href="<?php the_field('link') ?> " class="btn-default btn-link"> قراءة المزيد </a>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); ?>
            </div>
        </div>
    </div>





<?php get_footer();