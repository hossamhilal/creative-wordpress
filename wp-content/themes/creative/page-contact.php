
<?php get_header(); ?>

<div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php
    if(function_exists('bcn_display'))
    {
        bcn_display();
    }
    ?>
</div>


<div class="contact-us internal-page">
    <div class="container">
        <div class="basic-title">
            <h1>  <?php the_field('contact_title', 'option'); ?> </h1>
            <p>  <?php the_field('contact_description', 'option'); ?> </p>
        </div>
        <div class="conatct-list">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/map.png" alt="logo" class="img-fluid" width="100%">
                        <span> <?php the_field('location', 'option'); ?>   </span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/call.png" alt="logo" class="img-fluid" width="100%">
                        <span> <a href="tel:<?php the_field('phone', 'option'); ?> "> <?php the_field('phone', 'option'); ?>   </a></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/msg.png" alt="logo" class="img-fluid" width="100%">
                        <span> <a href="https://api.whatsapp.com/send?phone=<?php the_field('whatsapp', 'option'); ?>"> <?php the_field('whatsapp', 'option'); ?>  </a> </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-box"  >
            <?php echo do_shortcode('[contact-form-7 id="116" title="Contact form 1"]'); ?>
        </div>
    </div>
</div>

<?php get_footer();