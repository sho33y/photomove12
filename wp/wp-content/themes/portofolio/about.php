<?php
/*
Template Name: About
*/

$profileImg = get_field('profile-img');
$profileImg = wp_get_attachment_image_src($profileImg, 'full');
$profileImg = $profileImg[0];
?>

<?php get_header(); ?>
<div class="about-wrapper fade-in">
    <div class="container">
        <div class="profile-wrapper">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): ?>
                <?php the_post(); ?>

                <!-- プロフィール写真 -->
                <div class="profile-img">
                    <img src="<?php echo $profileImg; ?>" alt="Atsushi Yagishita">
                </div>
                <div class="profile-txt">
                    <?php the_content(); ?>
                </div>

                <?php endwhile; ?>
            <?php else: ?>
                <p>記事はありません。</p>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php get_footer(); ?>