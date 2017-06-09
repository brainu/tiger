<!DOCTYPE html>
<html class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link class="js-favicon is-default" rel="shortcut icon" href="<?php echo get_theme_file_uri('/assets/img/location.png');?>">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div class="surface-content">
    <header class="site-header">
        <div class="metabar-block u-floatLeft" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <h1 class="site-title u-floatLeft" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <a href="<?php echo home_url();?>" class="logo" title="<?php echo get_bloginfo('name', 'display');?>">
                    <img src="<?php echo get_theme_file_uri('/assets/img/logo.png');?>" width=38 >
                </a>
            </h1>
        </div>
    </header>