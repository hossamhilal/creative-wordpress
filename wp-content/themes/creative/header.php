<?php

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#navbar-menu" data-offset="0">

<header class="site-header <?php if(! is_home()) { echo 'internal-header'; }?> ">
    <div class="container">

        <div class="header-nav">
            <div class="over-lay"> </div>
            <div class="logo-box">
                <a href="index.html">
                    <img src="<?php the_field('logo','option'); ?>" alt="logo" class="img-fluid" width="100%">
                </a>
            </div>
            <div class="nav-btn">  <span></span>  <span></span>  <span></span> </div>
            <div class="nav-menu">
                <?php
                    wp_nav_menu(
                        array(
                            'menu' => ' ',
                            'container'       => '',
                            'container_class' => false,
                            'menu_class' => '' ,
                            'menu_id' => '' ,
                            'depth'	          => 2,
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        )
                    );
                ?>
            </div>
        </div>

        <?php if(is_home()) : ?>
        <div class="header-data">
            <div class="row">
                <?php
                    $item = array('post_type' => 'header');
                    $query = new WP_Query($item);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                        $query->the_post();
                ?>
                    <div class="col-12 col-sm-7 col-xl-6">
                        <div class="data"  >
                            <h1> <?php the_title() ?> </h1>
                            <?php the_content() ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 col-xl-6">
                        <div class="pic"  >
                            <?php  the_post_thumbnail()?>
    <!--                        <img src="images/header-pic.png" alt="img" class="img-fluid">-->
                        </div>
                    </div>
                <?php }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php  endif; ?>
    </div>
</header>
