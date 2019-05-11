<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-3">
                <div class="footer-logo">
                    <a href="index.html">
                        <img src="<?php the_field('logo','option'); ?>" alt="logo" class="img-fluid" width="100%">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-5">
                <div class="links">
                    <div class="list">
                        <h3> <?php the_field('footer_title','option'); ?>  </h3>
<!--                        --><?php
//                        $link = get_field('footer_link');
//                        if(get_field('footer_link','option')): ?>
<!--                            <ul>-->
<!--                                --><?php //while(has_sub_field('footer_link','option')): ?>
<!--                                     <li> <a href="--><?php //the_sub_field('link','option'); ?><!-- ">  --><?php //the_sub_field('link_text','option'); ?><!-- </a> </li>-->
<!--                                --><?php //endwhile; ?>
<!--                            </ul>-->
<!--                        --><?php //endif; ?>

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
                    <div class="contact">
                        <h3> تواصل معنا  </h3>
                        <ul>
                            <li> <i class="icofont-google-map"></i>  <?php the_field('location','option'); ?> </li>
                            <li> <i class="icofont-ui-call"></i>  <?php the_field('phone','option'); ?> </li>
                            <li> <i class="icofont-envelope"></i> <?php the_field('whatsapp','option'); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-4">
                <div class="newsletter">
                    <h3> <?php the_field('news_title','option'); ?> </h3>
                    <p>   <?php the_field('news_text','option'); ?></p>

                    <?php echo do_shortcode('[wpens_easy_newsletter firstname="no" lastname="no" button_text="ارسال"]'); ?>

<!--                    <form action="">-->
<!--                        <input type="text" class="form-control" placeholder="أدخل بريدك الالكترونى ">-->
<!--                        <button class="btn-animate" type="submit"> ارسال  <span></span> </button>-->
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="copy-right">
    <div class="container">
        <div class="social">
            <?php
            $link = get_field('social');
            if(get_field('social','option')): ?>
                <ul>
                    <?php while(has_sub_field('social','option')): ?>
                        <li> <a href="<?php the_sub_field('link','option'); ?> ">  <?php the_sub_field('icon','option'); ?> </a> </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>

        <p> <?php the_field('copyright','option') ?> </p>
    </div>
</div>

<?php wp_footer() ?>
</body>

</html>