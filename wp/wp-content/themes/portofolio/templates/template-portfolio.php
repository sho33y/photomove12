<div class="portfolio-wrapper fade-in">
    <div class="container">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): ?>
            <?php the_post(); ?>
                <div class="portfolio-box">
                    <?php $imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium'); ?>
                    <?php $imageFull = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                    <a href="<?php echo $imageFull[0]; ?>" class="swipebox" rel="portfolio">
                        <img src="<?php echo $imageThumbnail[0]; ?>" alt="<?php echo $portfolio->post_title; ?>">
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>記事はありません。</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>
<div class="pagination-wrapper">
    <?php pagination($wp_query->max_num_pages); ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.swipebox' ).swipebox({
        'removeBarsOnMobile': false
    });
});
</script>
