<?php get_header(); ?>
<main class="width_page_1165_wrap">
   <div class="width_page_1165">
      <div class="posts__categories_side__wrap">
         <?php get_template_part('parts/sorting_posts_by_popularity__left_sidebar'); ?>
         <!-- sorting posts -->
         <?php
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'new';
            
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => get_option('posts_per_page'),
              'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            );
            
            switch ($sort) {
              case 'old':
                $args['orderby'] = 'date';
                $args['order'] = 'ASC';
                break;
              case 'popular':
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = 'views';
                $args['order'] = 'DESC';
                break;
              default:
                $args['orderby'] = 'date';
                $args['order'] = 'DESC';
                break;
            }
            
            $wp_query = new WP_Query($args);
            ?>
         <!-- /sorting posts -->
         <!-- posts wrap -->
         <div class="posts_wrap">
            <!-- sorting posts -->
            <nav class="sort_menu">
               <ul class="sort_menu_list">
                  <li class="<?php echo ($sort === 'new' ? 'current-menu-item' : ''); ?>">
                     <a href="?sort=new">New</a>
                  </li>
                  <li class="<?php echo ($sort === 'popular' ? 'current-menu-item' : ''); ?>">
                     <a href="?sort=popular">Popular</a>
                  </li>
                  <li class="<?php echo ($sort === 'old' ? 'current-menu-item' : ''); ?>">
                     <a href="?sort=old">Old</a>
                  </li>
               </ul>
            </nav>
            <!-- /sorting posts -->
            <div class="posts">
               <?php
                  if (have_posts()) :
                    while (have_posts()) : the_post();
                      get_template_part('parts/post');
                    endwhile;
                   endif;
                  ?>
            </div>
         </div>
         <?php get_template_part('parts/categories_side'); ?>
      </div>
      <!-- /posts wrap -->
      <!-- pagination -->
      <div class="pagination_wrap">
         <div class="pagination">
            <?php get_template_part('parts/pagination'); ?>
         </div>
      </div>
      <!-- /pagination -->
   </div>
   <!-- popular posts -->
   <section class="popular_posts_wrap_index_page">
      <?php get_template_part('parts/sorting_posts_by_popularity'); ?>
   </section>
   <!-- /popular posts -->
   <div class="all_categories_index_page">
      <?php get_template_part('parts/all_categories'); ?>
   </div>
</main>
<?php get_footer(); ?>