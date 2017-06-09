<?php 

function panther_is_has_image($post_id) {
    static $has_image;
    global $post;
    if (has_post_thumbnail($post_id)) {
        $has_image = true;
    } elseif (get_post_meta($post_id,'_banner',true)) {
        $has_image = true;
    } else {
        $content = get_post_field('post_content', $post_id);
        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
        $n = count($strResult[1]);
        if ($n > 0) {
            $has_image = true;
        } else {
            $has_image = false;
        }
    }

    return $has_image;

}

function panther_get_background_image($post_id, $width = null, $height = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    if (has_post_thumbnail($post_id)) {
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
        $output       = $timthumb_src[0];
    } elseif (get_post_meta($post_id,'_banner',true)) {
        $output = get_post_meta($post_id,'_banner',true);
    }else {
        $content         = get_post_field('post_content', $post_id);
        $defaltthubmnail = '//static.fatesinger.com/2017/01/ctb5lpll348k8h5n.jpeg';
        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
        $n = count($strResult[1]);
        if ($n > 0) {
            $output = $strResult[1][0];
        } else {
            $output = $defaltthubmnail;
        }
    }
    if ($height && $width) {
        $result = $output . "!/both/{$width}x{$height}";

    } else {
        $result = $output;
        //if ( fa_is_support_webp() && pure_get_setting('upyun') ) $result .= '!/format/webp';
    }

    return $result;
}

function panther_setup() {
    add_theme_support( 'title-tag' );

    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    
}
add_action( 'after_setup_theme', 'panther_setup' );

function panther_scripts(){
    wp_enqueue_style( 'panther-style', get_theme_file_uri( '/assets/css/app.css' ), array(),  V );
    wp_enqueue_script( 'panther-js' , get_theme_file_uri( '/assets/js/application.js' ), array(),  V , true);
}
add_action( 'wp_enqueue_scripts', 'panther_scripts' );

function panther_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'panther_javascript_detection', 0 );