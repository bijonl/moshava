<?php 
wp_footer(); 
$social_media_footer = get_field('social_media_footer', 'options');
$footer_logo = get_field('footer_logo', 'options');
$phone_number = get_field('phone_number', 'options');
?>

<footer class="site-footer" role="contentinfo">
    <div class="site-footer-content-container container">
        <div class="site-footer-content-row row align-items-center">
            <div class="footer-copyright-col col text-start">
                <?php include locate_template('components/footer/copyright.php'); ?>
            </div>
            <div class="footer-logo-col col text-center">
                <i class="fa-solid fa-phone"></i>
                <a href="<?php echo 'tel:'.$phone_number ?>" ><?php echo $phone_number ?></a>
            </div>
            <?php if (have_rows('social_media_footer', 'options')) { ?>
                <nav class="footer-social-col col" role="navigation" aria-label="Social Media Links">
                    <?php include locate_template('components/footer/social-icons.php'); ?>
                </nav>
            <?php }; ?>
           
        </div>
    </div>
</footer>
