<?php get_header(); ?>
<div class="single-wrapper fade-in">
    <div class="container">
        <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
        <?php the_post(); ?>
            <div class="single-eyecatch">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/screenshot.png" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </div>
            <div class="single-info">
                <div class="single-ttl"><?php the_title(); ?></div>
                <span class="single-cat"><?php the_category(' , '); ?></span>
                <span class="single-date"><?php echo get_post_time('F d Y'); ?></span>
                <div class="single-content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
