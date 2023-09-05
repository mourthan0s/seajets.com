<?php 
    extract(wp_parse_args( $args, [
        'article' => '',
        'classes' => 'large-4',
    ])); 
    
    $max_words = ($classes == 'large-4') ? 10 : 10;
?> 

<div class="space-bottom cell small-12 <?php echo $classes?>"> 
    <div class="article-wrapper pl50">
        <div class="img-wrapper">
            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id( $article->ID ), 'full', false)[0]; ?>" alt="<?php echo $article->post_title; ?>">
            <div class="date"><?php echo get_the_date('j F, Y', $article->ID) ?></div>
        </div>
        <div class="article-content">
            <div class="title"><?php echo $article->post_title; ?></div>
            <div class="description"><?php echo wp_trim_words( get_the_excerpt($article->ID), $max_words ); ?></div>
        </div>
        <a class="make-full" href="<?php the_permalink($article->ID); ?>"></a>
    </div>
</div>