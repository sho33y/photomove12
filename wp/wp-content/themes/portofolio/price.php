<?php
/*
Template Name: Price
*/


$custom_fields    = get_post_custom(get_the_ID());
$price_type_count = 5;
$price_types      = array();

for ($i = 1; $i <= $price_type_count; $i++) {
    $price_type_key = 'price_type'.$i;
    $price_key      = 'price'.$i;

    if (!empty($custom_fields[$price_type_key][0])) {
        $price_types[$i]['type'] = $custom_fields[$price_type_key][0];
    }
    if (!empty($custom_fields[$price_key][0])) {
        $price_types[$i]['price'] = $custom_fields[$price_key][0];
    }
}
?>

<?php get_header(); ?>

<div class="price-wrapper fade-in">
    <div class="container">
        <div class="price-inner">
            <h2>撮影料金のご案内</h2>

            <table class="price-table">
                <?php if (!empty($price_types)): ?>
                    <?php foreach ($price_types as $price_type): ?>
                        <tr>
                            <th><span class="fa fa-camera"></span><?php echo $price_type['type']; ?></th>
                            <td>¥ <?php echo number_format($price_type['price']); ?> <span class="sml">(税抜き)</span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>

            <div class="location-description">
                <?php echo nl2br($custom_fields['location'][0]); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>