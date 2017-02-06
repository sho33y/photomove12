<div class="blog-wrapper fade-in">
    <div class="container">
        <div class="blog-area">
            <?php if (have_posts()): ?>
            <?php while (have_posts()): ?>
            <?php the_post(); ?>
                <article class="item">
                    <div class="blur">
                        <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/screenshot.png" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <span class="hover-ttl"><?php the_title(); ?></span><span class="overlay"></span></a>
                    </div>
                    <div class="item-info">
                        <div class="item-ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <span class="item-cat"><?php the_category(' , '); ?></span>
                        <span class="item-date"><?php echo get_post_time('F d Y'); ?></span>
                        <div class="item-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php endif; ?>

            <?php pagination($wp_query->max_num_pages); ?>
        </div>
    </div>
</div>