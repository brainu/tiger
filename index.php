<?php get_header();?>
    <div class="u-backgroundGray">
        <div class="layoutSingleColumn layoutSingleColumn--wide">
            <?php
            if ( have_posts() ) :
                echo '<div class="krayver-list">';
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/post/content', get_post_format() );
                endwhile;
                echo '</div>';
                the_posts_pagination( array(
                    'prev_next' => false,
                ) );
            endif;
            ?>
        </div>
    </div>
<?php get_footer();?>