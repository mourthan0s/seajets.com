<?php
get_header();

$main_img = get_field('header_main_banner', 'options');
$args = [    
    'posts_per_page' => 8, 
    'post_type' => 'post', 
    'paged' => get_query_var('paged')  
];
$articles = new WP_Query($args);
$currentTag = get_queried_object();

?> 
<div class="header-banner-wrapper">
    <div class="home_title"><?php echo makeUppercase($currentTag->name); ?></div>
    <div class="image-wrapper">
        <img src="<?php echo $main_img['sizes']["2048x2048"];?>" alt="<?php echo $main_img['alt'];?>">
    </div>
</div>

<div class="post_possition">
    <div class="grid-container moveTop">
        <div class="grid-x grid-padding-x">
            <?php
            $i=0;
            foreach ($articles->posts as $article){
                    get_template_part( '/template-parts/article', null, [
                        'article' => $article,
                        'classes' => ($i<3) ? 'large-4' : 'large-6',
                    ] );           
                $i++;
                if ($i > 4) {
                    $i=0;
                }
            }
            ?>
        </div>
        <div class="pagination"><?php the_posts_pagination( array('prev_next' => false ) ); ?></div>
    </div>
</div>

<?php get_footer(); ?> 