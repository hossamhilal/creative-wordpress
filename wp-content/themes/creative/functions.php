<?php
define('DIR_URI', get_template_directory_uri() );
define('CSS_URI', get_template_directory_uri() .'/css/');
define('JS_URI', get_template_directory_uri() .'/js/');
add_action( 'wp_enqueue_scripts', 'theme_files' );
function theme_files() {
    wp_enqueue_style('bootstrap', CSS_URI . 'bootstrap.min.css');
    wp_enqueue_style('icofont', CSS_URI . 'icofont.min.css');
    wp_enqueue_style('font-awesome',  CSS_URI . 'font-awesome-5all.css');
    wp_enqueue_style('owl-carousel', CSS_URI . 'owl.carousel.min.css');
    wp_enqueue_style('main-style', CSS_URI . 'style.css');
    wp_enqueue_style('style', DIR_URI);

    wp_enqueue_script('popper',JS_URI . 'popper.min.js',array('jquery'),'null', true);
    wp_enqueue_script('bootstrap-js',JS_URI . 'bootstrap.min.js',array('jquery'),'null', true);
    wp_enqueue_script('owl',JS_URI . 'owl.carousel.min.js',array('jquery'),'null', true);
    wp_enqueue_script('edit',JS_URI . 'edit.js',array('jquery'),'null', true);
    if ( is_singular() ) {
        wp_enqueue_script( "comment-reply" );
    }
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


// REGISTER THE NAVBER
add_action( 'after_setup_theme', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header' ),
            'footer' => __( 'footer' )
        )
    );
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}



// ADD ACTIVE CLASS TO NAV ITEM
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function create_post_header() {
    register_post_type( 'header',
        $values = array(
            'public' => true,
            'labels' => array( 'name' => 'header' ),
            'menu_icon'     => 'dashicons-welcome-view-site' ,
            'menu_position' => 25 ,
            'supports' => array( 'title', 'editor', 'thumbnail')
        )
    );
}
add_action( 'init', 'create_post_header' );

function create_post_services() {
    register_post_type( 'services',
        $values = array(
            'public' => true,
            'labels' => array( 'name' => 'services' ),
            'menu_icon'     => 'dashicons-admin-generic' ,
            'menu_position' => 25 ,
            'supports' => array( 'title', 'editor')
        )
    );
}
add_action( 'init', 'create_post_services' );

function create_post_packages() {
    register_post_type( 'packages',
        $values = array(
            'public' => true,
            'labels' => array( 'name' => 'packages' ),
            'menu_icon'     => 'dashicons-editor-bold' ,
            'menu_position' => 25 ,
            'supports' => array('title')
        )
    );
}
add_action( 'init', 'create_post_packages' );


function create_post_team() {
    register_post_type( 'team',
        $values = array(
            'public' => true,
            'labels' => array( 'name' => 'team' ),
            'menu_icon'     => 'dashicons-groups' ,
            'menu_position' => 25 ,
            'supports' => array('title')
        )
    );
}
add_action( 'init', 'create_post_team' );



function create_post_blog() {
    register_post_type( 'blog',
        $values = array(
            'public' => true,
            'labels' => array( 'name' => 'blog' ),
            'menu_icon'     => 'dashicons-images-alt' ,
            'menu_position' => 25 ,
            'supports' => array('title','comments')
        )
    );
}
add_action( 'init', 'create_post_blog' );

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'blog',
        array(
            'labels' => array(
                'name' => __( 'blog' ),
                'singular_name' => __( 'blog' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'blog'),
            'supports' => array( 'title'),
            'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
        )
    );
}

function create_post_download() {
    register_post_type( 'download',
        $values = array(
            'public' => true,
            'labels' => array( 'name' => 'download' ),
            'menu_icon'     => 'dashicons-download' ,
            'menu_position' => 25 ,
            'supports' => array('title')
        )
    );
}
add_action( 'init', 'create_post_download' );


add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme_h_menu',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme_h_menu',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme_h_menu',
    ));
}

/**
 * Comments callback
 */
if ( ! function_exists( 'razz_comment' ) ) {
    function razz_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li <?php comment_class( 'single-comment base-box' ); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e( 'Pingback:', 'razz' );
                    comment_author_link();
                    edit_comment_link( esc_html__( '(Edit)', 'razz' ), '<span class="edit-link">', '</span>' ); ?>
                </p>
                <?php
                break;
            default :
                global $wpdb;
                ?>
            <li <?php comment_class( 'single-comment' ); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment-wrap base-box">
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'razz' ); ?></em>
                    <?php endif; ?>
                    <div class="commentHead">
                        <div class="comment-h">
                            <div class="pic">
                                <?php echo get_avatar( $comment); ?>
                            </div>
                            <div class="CommentHeadDetails data">
                                <ul>
                                    <?php
                                    printf( '<li class="comment-author fn">%1$s %2$s</li>', get_comment_author_link(),
                                        // If current post author is also comment author, make it known visually.
                                        ( $comment->user_id ) ? '' : ''
                                    );
                                    printf( '<li class="comment-meta commentmetadata "> </li> <li> <time datetime="%2$s">%3$s</time> </li>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ),
                                        /* translators: 1: date, 2: time */
                                        sprintf( esc_html__( '%1$s at %2$s', 'razz' ), get_comment_date(), get_comment_time() )
                                    );
                                    ?>
                                </ul>
                                <?php comment_text(); ?>

                                <div class="CommentHeadLinks replay-btn">
                                    <?php

                                    comment_reply_link( array_merge( $args, array(
                                        'reply_text' => esc_html__( 'رد', 'razz' ),
                                        'before'     => '<span>',
                                        'after'      => '</span>',
                                        'depth'      => $depth,
                                        'max_depth'  => $args['max_depth']
                                    ) ) );
                                    edit_comment_link( esc_html__( 'تعديل', 'razz' ) ); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                break;
        endswitch;
    }
}
