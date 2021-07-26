<?php

    if(comments_open()){ //Check if Comments are Allowed ?>

      <h3 class="cmnt-number"><?php comments_number('No Comments' , 'One Comment' , '% Comments'); ?></h3>
  <?php
      echo '<ul class="list-unstyled comments-list">';
      $comments_args = array(
        'max_depth'    => 3,
        'type'         => 'comment',
        'avatar_size'  => 64
      );

      wp_list_comments($comments_args);
      echo '</ul>';
      echo '<hr>';
      comment_form();
    } else {

      echo 'sorry theres no comment';
    }