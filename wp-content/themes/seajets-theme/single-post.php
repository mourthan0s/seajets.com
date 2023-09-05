<?php get_header(); ?>

<div class="grid-container">
  <!-- <div class="featured-image">
    <?php //the_post_thumbnail(); ?>
  </div> -->

  <!-- <div class="demo"> -->
  <div class="grid-x grid-padding-x">
    <div class="large-9 cell">
      <div class="post_header">
        <div class="post_title"><?php the_title( '<h2>', '</h2>' ); ?></div>
        <div class="post_featured"><?php the_post_thumbnail(); ?></div>
      </div>
      <div class="post_content"><?php the_content(); ?></div>
    </div>
      <div class="large-3 cell">
        <div class="post_sidebar">
          <div class="latest-posts-sidebar">
            <h2>Latest News</h2>
            <div class="latest_post_wrapper">
              <?php
              $latest_posts_query = new WP_Query( array(
                  'posts_per_page' => 5,
                  'post__not_in' => array( get_the_ID() ) // exclude current post
              ) );
              while ( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post();
              ?>
              <div class="latest_post">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
                <div class="post_info">
                  <h3><?php the_title(); ?></h3>
                  <p class="post-date"><?php the_date(); ?></p>
                </div>
                <a href="<?php the_permalink(); ?>"></a>
              </div>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          </div>
          <div class="tags">
            <h2>Tags</h2>
            <?php the_tags( ' ', ' ', '<br />' ); ?>
          </div>
        </div>
      </div>
    </div>
  <!-- </div> -->
</div>

<?php get_footer(); ?>