<?php
/*
Template Name: Top
*/

$arrTopImg = [];
for ($i = 1; $i <= 5; $i++) {
    $imgFieldName = 'top-image'.$i;
    $topImg       = get_field($imgFieldName);
    $topImg       = wp_get_attachment_image_src($topImg, 'full');
    $arrTopImg[]  = $topImg[0];
}
?>

<?php get_header(); ?>
    <div class="top-wrapper">
        <div class="container">
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            $(document).ready(function(){
                $(".top").bgswitcher({
                    images: [
                        "<?php echo $arrTopImg[0]; ?>",
                        "<?php echo $arrTopImg[1]; ?>",
                        "<?php echo $arrTopImg[2]; ?>",
                        "<?php echo $arrTopImg[3]; ?>",
                        "<?php echo $arrTopImg[4]; ?>",
                    ]
                });
            });
        });
    </script>
<?php get_footer(); ?>
