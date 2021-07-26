<?php

    //include nav walker class for bootstrap menu
    require_once('class-wp-bootstrap-navwalker.php');

    /*
    ** add Theme Supports
    **add_theme_support()
    */
    add_theme_support('post-thumbnails');

    /*
    ** Function to add my custom CSS Files
    **added By AbdulazizYas
    **wp_enqueue_style()
    */
    function azooz_add_styles(){
      wp_enqueue_style('fa', get_template_directory_uri() . '/css/all.css');
      wp_enqueue_style('bs', get_template_directory_uri() . '/css/bootstrap.css');
      wp_enqueue_style('my-style', get_template_directory_uri() . '/css/azooz.css');
    }

    /*
    ** Function to add my custom CSS Files
    **added By AbdulazizYas
    **wp_enqueue_script()
    */
    function azooz_add_scripts(){
      wp_deregister_script('jquery');
      wp_register_script('jquery',includes_url('/js/jquery/jquery.js'),array(),false,true);
      wp_enqueue_script('jquery');
      wp_enqueue_script('bs-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js',array(),false,true);
      wp_enqueue_script('main', get_template_directory_uri() . '/js/script.js',array(),false,true);
    }

    /*
    ** add custom menus Support
    ** added by AbdulazizYas
    ** register_nav_menu()
    */
    function azooz_register_custom_menu(){
      register_nav_menus(array(
        'navbar' => 'Navigation Bar',
        'navfooter' => 'Footer menu'
      ));
    }

    function azooz_add_custom_menu(){

      wp_nav_menu(array(

        'theme_location' => 'navbar',
        'menu_class'     =>  'navbar-nav ml-auto',
        'container'      => false,
        'depth'          => 2,
        'walker'         => new WP_Bootstrap_Navwalker(),

      ));

    }

    /*
    ** Customaizing the excerpt word Length & Read More
    ** Added By azooz
    */

    function azooz_extend_excerpt_length($length){
      if(is_author()){
        return 25;
      } else{
        return 45;
      }
    }

    function azooz_change_excerpt_dots($more){
      return ' ( . . . )';
    }
    add_filter('excerpt_length','azooz_extend_excerpt_length');
    add_filter('excerpt_more','azooz_change_excerpt_dots');
     /*
    ** Hooks and add_action() functions
    **added By AbdulazizYas
    **add_action()
    */
    add_action( 'wp_enqueue_scripts', 'azooz_add_styles' );
    add_action( 'wp_enqueue_scripts', 'azooz_add_scripts' );
    add_action( 'init', 'azooz_register_custom_menu' );

    function numbering_pagination(){
      global $wp_query;

      $all_pages = $wp_query->max_num_pages;

      $current_page = max(1, get_query_var('paged'));

      if($all_pages > 1){

        return paginate_links(array(
          'base'    => get_pagenum_link() . '%_%',
          'format'  => '/page/%#%',
          'current' => $current_page,
          'total'   => $all_pages
        ));
      }
    }

    /*
    ** Register SideBar
    ** register_sidebar()
    */

    function azooz_register_sidebar(){

      register_sidebar(array(
        'name'          => 'Main SideBar',
        'description'   => 'This Main SideBar',
        'id'            => 'main-sidebar',
        'class'         => 'main-sidebar',
        'before_widget' => '<div class="widget-content">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'

      ));
    }

    add_action('widgets_init','azooz_register_sidebar');