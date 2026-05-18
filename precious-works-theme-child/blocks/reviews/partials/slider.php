<div class="reviews-container container">
    <div class="reviews-row row">


    <div class="review-glide glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            <?php foreach ($reviews as $review_id) { ?>
                <div class="reviews-col col ms-auto glide__slide">
                        <?php include(locate_template('components/variables/review-variables.php')); ?>
                        <?php include(locate_template('blocks/reviews/partials/single-review.php')); ?>       
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
    <div class="button-row row">
        <div class="button-col col-12 mx-auto text-center">
            <?php include(locate_template('blocks/partials/button-area.php')); ?>
        </div>
    </div>   
</div>