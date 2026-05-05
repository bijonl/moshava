<?php 
include(locate_template('blocks/partials/global-block-variables.php'));  ?>

<?php $has_content = have_rows('menu_section') || $has_button_area || $has_title_area;

if(!$has_content) {
    include __DIR__ . '/demo.php';
    return; 
} ?>

<section <?php echo pw_block_section_classes($block) ?>>
    <?php include(locate_template('blocks/partials/title-area.php')); ?>
  <?php if(have_rows('menu_section')) { ?>
    <section class="food-menu-container container" aria-label="Food Menu">
        <div class="food-menu-row row">
            <div class="col-sm-8 mx-auto food-menu-col">

                <?php while(have_rows('menu_section')) { 
                    the_row(); 
                    $section_title = get_sub_field('title');
                    $menu_items = get_sub_field('menu_items');
                    $section_id = sanitize_title($section_title);
                ?>

                    <div class="menu-section-title-wrapper text-center">
                        <h2 id="<?php echo $section_id; ?>">
                            <?php echo esc_html($section_title); ?>
                        </h2>
                    </div>

                    <?php if($menu_items) { ?>
                        <ul 
                            class="menu-section-wrapper d-flex flex-wrap list-unstyled ms-0 mb-0"
                            aria-labelledby="<?php echo $section_id; ?>"
                        >

                            <?php foreach($menu_items as $menu_item) { 

                                $item_title = get_field('display_name', $menu_item) ?: get_the_title($menu_item);
                                $item_description = get_field('item_description', $menu_item, false, false);
                                $desc_id = 'desc-' . $menu_item;

                                $image = get_the_post_thumbnail(
                                    $menu_item,
                                    'square',
                                    array(
                                        'class' => 'w-100 h-auto',
                                        'alt'   => esc_attr($item_title)
                                    )
                                );
                            ?>

                                <li class="single-menu-item text-center">
                                    <article class="single-menu-item-wrapper">

                                        <figure class="mx-auto">
                                            <?php echo $image; ?>
                                        </figure>

                                        <h3>
                                            <?php echo esc_html($item_title); ?>
                                        </h3>

                                        <?php if($item_description) { ?>
                                            <p 
                                                id="<?php echo $desc_id; ?>" 
                                                class="w-75 mx-auto mb-0"
                                            >
                                                <?php echo $item_description; ?>
                                            </p>
                                        <?php } ?>

                                    </article>
                                </li>

                            <?php } ?>

                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php } ?>

                <?php } ?>

            </div>
        </div>
    </section>
    <?php } ?>

    <?php include(locate_template('blocks/partials/button-area.php')); ?>
</section>