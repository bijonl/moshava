<?php 
include(locate_template('blocks/partials/global-block-variables.php')); 

$image = get_field('image'); 
$image_url = wp_get_attachment_url($image);

$second_column_image = get_field('second_column_image');
$second_column_image_url = !empty($second_column_image) ? wp_get_attachment_url($second_column_image) : '';
$has_content = $image || $has_button_area || $has_title_area;

if(!$has_content) {
    include __DIR__ . '/demo.php';
    return; 
} 

$hero_format = get_field('hero_format'); 
$is_split_hero = $hero_format === 'split'; 


if($is_split_hero) {
    include(locate_template('blocks/homepage-hero/partials/split-hero.php'));
} else { ?>
    <section <?php echo pw_block_section_classes($block) ?> style="background-image: url('<?php echo $image_url ?>')">
        <div class="overlay image-overlay"></div>
        <div class="homepage-hero-container container h-100">
            <div class="homepage-hero-row row align-items-center h-100">
                <div class="homepage-hero-col col-12">
                    <div class="homepage-hero-content-wrapper">
                        <?php $display_title = 'h1'; ?>
                        <?php include(locate_template('blocks/partials/title-area.php')); ?>
                        <?php include(locate_template('blocks/partials/button-area.php')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


