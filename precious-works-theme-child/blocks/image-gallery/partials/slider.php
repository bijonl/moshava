<div class="image-gallery-container container">
    <div class="image-gallery-row row" role="list">
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                <?php foreach ($images as $image_id) { 
                    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    if (!$alt) {
                        $alt = get_the_title($image_id); // fallback if alt text is missing
                    }
                    $full_image_url = wp_get_attachment_url($image_id);
                ?>
                    <div class="glide__slide image-gallery-col col columns-<?php echo esc_attr($number_of_columns); ?>" role="listitem">
                        <figure class="gallery-image w-sm-50 mx-auto mb-4">
                            <a 
                                href="<?php echo esc_url($full_image_url); ?>" 
                                class="glightbox" 
                                data-gallery="image-gallery-block"
                                aria-label="View larger image of <?php echo esc_attr($alt ?: 'gallery image'); ?>"
                            >
                                <?php echo wp_get_attachment_image($image_id, 'full', false, array(
                                    'class' => 'w-100 h-auto',
                                    'alt' => esc_attr($alt),
                                    'loading' => 'lazy'
                                )); ?>
                            </a>
                        </figure>
                    </div>
                <?php } ?>
                </ul>
            </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="&lt;"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir="&gt;"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                </div>
        </div>
    </div>
</div>