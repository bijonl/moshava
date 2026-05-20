

<section <?php echo pw_block_section_classes($block) ?>>
    <div class="d-flex split-hero-bg-container">
        <div class="split-column-bg first-image w-sm-50 overlay" style="background-image: url('<?php echo $image_url ?>')"></div>
        <div class="split-column-bg second-image w-50 overlay" style="background-image: url('<?php echo $second_column_image_url ?>')"></div>
    </div>

    <div class="split-hero homepage-hero-container container h-100">
        <div class="homepage-hero-row row align-items-center h-100">
            <div class="homepage-hero-col col-sm-10 mx-auto">
                
                <div class="homepage-hero-content-wrapper position-relative">
                    <div class="overlay image-overlay"></div>
                    <?php $display_title = 'h1'; ?>
                    <?php include(locate_template('blocks/partials/title-area.php')); ?>
                    <?php include(locate_template('blocks/partials/button-area.php')); ?>
                </div>
            </div>
        </div>
    </div>
</section>