<article class="masonry-review-card" aria-labelledby="review-<?php echo $review_id; ?>-person">
    <div class="review-content">
        <blockquote>
            <p><?php echo $review; ?></p>
        </blockquote>
    </div>
    <footer class="review-meta-wrapper d-flex align-items-center">
        <?php if (!empty($review_image)) { ?>
            <div class="review-image-wrapper">
                <?php echo $review_image ?>
            </div>
        <?php } ?>
        <div class="review-meta">
            <?php if ($person) { ?>
                <p id="review-<?php echo $review_id; ?>-person" class="review-meta person mb-0 fw-bold">
                    <?php echo esc_html($person); ?>
                </p>
            <?php } ?>
            <?php if ($position) { ?>
                <p class="review-meta position mb-0">
                    <?php echo esc_html($position); ?>
                </p>
            <?php } ?>
        </div>
    </footer>
    <svg xmlns="http://www.w3.org/2000/svg" 
            width="120" 
            height="24" 
            viewBox="0 0 120 24" 
            fill="#fabb05">

        <path d="M12 1.8l3.09 6.26 6.91 1-5 4.87 1.18 6.87L12 17.77 5.82 20.8 7 13.93 2 9.06l6.91-1L12 1.8z"/>
        <path d="M36 1.8l3.09 6.26 6.91 1-5 4.87 1.18 6.87L36 17.77 29.82 20.8 31 13.93 26 9.06l6.91-1L36 1.8z"/>
        <path d="M60 1.8l3.09 6.26 6.91 1-5 4.87 1.18 6.87L60 17.77 53.82 20.8 55 13.93 50 9.06l6.91-1L60 1.8z"/>
        <path d="M84 1.8l3.09 6.26 6.91 1-5 4.87 1.18 6.87L84 17.77 77.82 20.8 79 13.93 74 9.06l6.91-1L84 1.8z"/>
        <path d="M108 1.8l3.09 6.26 6.91 1-5 4.87 1.18 6.87L108 17.77 101.82 20.8 103 13.93 98 9.06l6.91-1L108 1.8z"/>

    </svg>
</article>
