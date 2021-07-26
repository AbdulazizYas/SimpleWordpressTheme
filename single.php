<?php get_header(); ?>



<?php if ( has_post_thumbnail($post->ID)): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID )); ?>
  <header class="article-header" style="background-image:url('<?php echo $image[0]; ?>');background-size:cover;background-position:center;position:relative;">
<?php else: ?>	
  <header class="article-header no-bg">
<?php endif; ?>
    <div class="bg-overlay"></div>
    <div class="wrapper">
      <h1 class="single-title text-center"><?php the_title(); ?></h1>
    </div>
  </header>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <?php

        if(have_posts()){ // Satrt IF Cond

          while(have_posts()){ //Start While

            the_post(); ?>

            <div class="single-post post-content mr-oppst">
              <div class="preinfo-post">Posted on <?php the_date('F j, Y'); ?> by <?php the_author_posts_link(); ?> under <?php the_category(' , '); ?></div>
              <div class="single-post-content"> <?php the_content(); ?> </div>
            </div>

            
          
            <?php
          } //End While
        } // End IF Cond

        ?>
      <div class="single-post" style="padding: 10px 50px 40px;">
        <h3 class="abt-auth">About the Author</h3>
        <div class="auth">
          <div class="auth-avatar">
            <?php $avatar_args = array('class' => 'img-bord') ?>
            <?php echo get_avatar(get_the_author_meta('ID') , 128 , '' , 'Author Avatar' , $avatar_args); ?>
          </div>
          <div class="auth-info">
            <h4 class="author-name">
            <?php the_author_meta('nickname'); ?>
            </h4>
            <?php
              if(get_the_author_meta('description')){?>
                <p class="lead"><?php the_author_meta('description'); ?></p>
            <?php } else {
              echo '<p class"no-desc"> There is no Description for this Author </p>';
            } 
            ?>
          </div>
  
        </div>
        <hr>
        <div class="auth-profile">

          <div class="num-posts">
            <span>Number of Posts : </span>
            <span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
          </div>

          <div class="profile-page">
            <span>Profile <?php the_author_posts_link(); ?></span>
          </div>

        </div>        
      </div>
      <div class="single-post">
        <div class="post-pagination">
          <?php 
            if(get_previous_post_link()){ //check if previous post is exist
              ?>
              <div>
                <span>Previous Post</span>
                <span><?php previous_post_link('<i class="fas fa-caret-left"></i> %link','%title'); ?></span>
              </div>
          <?php } else {
              echo '<div></div>';
            }
          ?>

          <?php 
            if(get_next_post_link()){ //check if next post is exist
              ?>
              <div>
                <span>Next Post</span>
                <span><?php next_post_link('%link <i class="fas fa-caret-right"></i>','%title'); ?></span>
              </div>
          <?php } else {
              echo '<div></div>';
            }
          ?>
        </div>
      </div>

      <div class="single-post">
        <?php comments_template(); ?>
      </div>

    </div>
    <div class="col-md-3">
      <?php
        if(is_active_sidebar('main-sidebar')){
          dynamic_sidebar('main-sidebar');
        }
        ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>