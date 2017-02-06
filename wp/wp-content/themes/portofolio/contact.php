<?php
/*
Template Name: Contact
*/

$contactForm   = get_posts(array('post_type' => 'wpcf7_contact_form'));
$contactFormID = 1;
if (isset($contactForm) && !is_null($contactForm)) {
    $contactFormID = $contactForm[0]->ID;
}
?>

<?php get_header(); ?>
<div class="contact-wrapper fade-in">
    <div class="container">
        <div class="contact-description">
            <h2>お問い合わせ</h2>
            <p>お仕事のご依頼などは下記のメールフォームからお気軽にお問い合わせくださいませ。</p>
            <p>後日、担当者よりご連絡させて頂きます。</p>
        </div>

        <?php echo do_shortcode('[contact-form-7 id="'.$contactFormID.'" title="お問い合わせフォーム"]'); ?>

    </div>
</div>
<?php get_footer(); ?>
