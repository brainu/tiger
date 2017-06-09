<article class="post post-krayver">
    <div class="post-krayver-inner">
        <img src="<?php echo panther_get_background_image(get_the_ID(),320,200);?>" height=200 widht=320 alt="<?php the_title();?>">
        <div class="post-krayver-content">
            <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
        </div>
        <footer class="post-krayver-footer">
            <svg class="svgIcon" width="18" height="18" viewBox="0 0 25 25">
                <path d="M20 12h-7V5h-1v7H5v1h7v7h1v-7h7" fill-rule="evenodd">
            </svg>
        </footer>
    </div>
</article>