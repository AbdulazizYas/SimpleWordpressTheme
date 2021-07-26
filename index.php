<?php get_header(); ?>
<div class="container">
  <div class="main-posts">
    
<?php

  if(have_posts()){

    while(have_posts()){

      the_post(); ?>
      <div class="row myrow">
      <div class="col-md-6 mycol">
      <?php if (has_post_thumbnail( $post->ID ) ){ ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )); ?>
        <div class="thumb" style="background-image:url(<?php echo $image[0]; ?>) ">
        </div>
      <?php } else{?>
        <div class="thumb">
        </div>
      <?php } ?>
      </div>

      <div class="col-md-6 mycol text-center post">
        <h3 class="post-title">
          <a href="<?php the_permalink() ?> ">
            <?php the_title(); ?>
          </a>
        </h3>
        <div class="date"><?php the_date('F j, Y'); ?></div>
        <div class="author">by <?php the_author_posts_link(); ?></div>
        <p class="post-txt"> <?php the_excerpt(); ?> </p>
      </div>
    </div>
      <?php
    }
  }

?>
    
  </div>
  <div class="pagination text-center">
      <?php echo numbering_pagination(); ?>
  </div>
</div>

<?php get_footer(); ?>