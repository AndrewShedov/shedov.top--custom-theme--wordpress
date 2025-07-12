<?php
/*
 * Plugin Name: Infinite scroll
 * Description: AJAX infinite scrolling posts plugin with sorting support and multisite.
 * Version: 1.0
 * Author: Andrew Shedov
 * Author URI: https://shedov.top
 * License: MIT
 */

if (!defined('LOADMORE_URL')) {
	define('LOADMORE_URL', plugin_dir_url(__FILE__));
}

class Infinite_scroll_loadmore_public {
  
  public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'infinite_scroll_loadmore_scripts'));
    add_action('wp_ajax_loadmore', array($this, 'infinite_scroll_loadmore_ajax_handler'));
    add_action('wp_ajax_nopriv_loadmore', array($this, 'infinite_scroll_loadmore_ajax_handler'));
  }

  public function infinite_scroll_loadmore_scripts() {
    global $wp_query;

    $sort = $_GET['sort'] ?? 'new';
    $meta_key = '';
    $orderby = 'date';
    $order = 'DESC';

    if ($sort === 'old') {
      $order = 'ASC';
    } elseif ($sort === 'popular') {
      $orderby = 'meta_value_num';
      $meta_key = 'views';
    }

    wp_enqueue_script(
      'infinite_scroll_loadmore',
      LOADMORE_URL . 'public/js/loadmore.js',
      array(),
      null,
      true
    );

    wp_localize_script('infinite_scroll_loadmore', 'infinite_scroll_loadmore_params', array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'posts' => json_encode(array(
        'post_type'      => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'cat'            => is_category() ? get_queried_object_id() : '',
        'category_name'  => is_category() ? get_queried_object()->slug : '',
        's'              => is_search() ? get_search_query() : '',
        'orderby'        => $orderby,
        'order'          => $order,
        'meta_key'       => $meta_key,
      )),
      'search_query'   => is_search() ? get_search_query() : '',
      'current_page'   => get_query_var('paged') ? get_query_var('paged') : 1,
      'max_page'       => $wp_query->max_num_pages,
      'loadmore_image' => LOADMORE_URL . 'public/images/loader.gif',
      'sort'           => $sort,
    ));

    wp_enqueue_style('loader-css', LOADMORE_URL . 'public/css/loader.css');
  }

  public function infinite_scroll_loadmore_ajax_handler() {
    $args = json_decode(stripslashes($_POST['query']), true);
    $page = intval($_POST['page']) + 1;

    $args['paged'] = $page;
    $args['post_status'] = 'publish';

    // security
    if (isset($args['meta_key'])) {
      $args['meta_key'] = sanitize_key($args['meta_key']);
    }
    if (isset($args['orderby'])) {
      $args['orderby'] = sanitize_key($args['orderby']);
    }
    if (isset($args['order']) && in_array(strtoupper($args['order']), ['ASC', 'DESC'])) {
      $args['order'] = strtoupper($args['order']);
    } else {
      $args['order'] = 'DESC';
    }

    $is_search = filter_var($_POST['is_search'], FILTER_VALIDATE_BOOLEAN);

    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part($is_search ? 'parts/post_in_search' : 'parts/post');
      }
    }
    wp_reset_postdata();
    echo ob_get_clean();
    wp_die();
  }
}

new Infinite_scroll_loadmore_public();
