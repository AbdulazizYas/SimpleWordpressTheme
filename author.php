<?php get_header(); ?>
<!-- Start Header Author -->
  <header class="author-info 
  text-center">
    <div class="container">
      <h2><?php the_author_meta('nickname'); ?></h2>
      <div class="avatar-info">
        <?php
          $auth_avtr_args = array(
            'class' => 'img-responsive center-block img-auth'
          );
          echo get_avatar(get_the_author_meta('ID') , 150 , '' , 'Author Avatar',$auth_avtr_args);
          ?>
      </div>
      <div class="author-inform">
        <div class="about">
          <h3>About <?php the_author_meta('nickname'); ?></h3>
          <?php
                if(get_the_author_meta('description')){?>
                  <p class="lead desc"><?php the_author_meta('description'); ?></p>
              <?php } else {
                echo '<p class"no-desc"> There is no Description for this Author </p>';
              } 
              ?>
        </div>
        <div class="auth-stats">

          <div class="posts-count">
            <span>Posts</span>
            <span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
          </div>
          <div class="comments-count">
            <span>Comments</span>
            <span><?php
                    $comnt_count_args = array(
                      'user_id'=> get_the_author_meta('ID'),
                      'count'  => true,
                    );
                    echo get_comments($comnt_count_args);
                ?></span>
          </div>
          <div class="posts-views">
            <span>Total Posts Views</span>
            <span>0</span>
          </div>
          <div class="testing">
            <span>Testing</span>
            <span>0</span>
          </div>

        </div>
      </div>
    </div> 
  </header>
  <!-- End Header Author -->
<div class="container">
  <h3 class="text-center">Posts By <?php the_author_meta('nickname'); ?></h3>
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
        <p class="post-txt"> <?php the_excerpt(); ?> </p>
      </div>
    </div>
      <?php
    }
  }

?>
</div>
<?php get_footer(); ?>