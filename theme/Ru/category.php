<?php
   get_header();
   ?>
<div class="width_page_1165_wrap">
   <div class="width_page_1165">
      <div class="category_name_title_wrap">
         <div class="category_name_title">
            <?php echo get_category_parents($cat, TRUE, '<p>&nbsp;/&nbsp;</p>'); ?>
         </div>
      </div>
      <div class="posts_categories_side_wrap__categories_page">
         <?php
            get_template_part( 'parts/sorting_posts_by_popularity__left_sidebar' );
            ?>
         <!-- sorting posts -->
         <?php
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'new';
            $category_id = get_queried_object_id();
            $args = array(
              'post_type' => 'post',
              'cat' => $category_id,
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
         <div class="posts_wrap">
            <!-- sorting posts -->
            <nav class="sort_menu">
               <ul class="sort_menu_list">
                  <li class="<?php echo ($sort === 'new' ? 'current-menu-item' : ''); ?>">
                     <a href="?sort=new">Новые</a>
                  </li>
                  <li class="<?php echo ($sort === 'popular' ? 'current-menu-item' : ''); ?>">
                     <a href="?sort=popular">Популярные</a>
                  </li>
                  <li class="<?php echo ($sort === 'old' ? 'current-menu-item' : ''); ?>">
                     <a href="?sort=old">Старые</a>
                  </li>
               </ul>
            </nav>
            <!-- /sorting posts -->
            <div class="posts">
               <?php
                  if (have_posts()) : while (have_posts()) : the_post();  
                   get_template_part( 'parts/post_in_category' );
                  
                  
                    endwhile;
                   endif;
                    ?>
            </div>
         </div>
         <?php
            get_template_part( 'parts/categories_side' );
             ?>
      </div>
      <div class="pagination_wrap">
         <div class="pagination">
            <?php get_template_part( 'parts/pagination' ); ?>
         </div>
      </div>
   </div>
   <section class="popular_posts_wrap_index_page">
      <?php
         get_template_part( 'parts/sorting_posts_by_popularity' );
           ?>
   </section>
   <div class="all_categories_index_page">
      <?php
         get_template_part( 'parts/all_categories' );
         ?>
   </div>
</div>
<?php
   get_footer();
   ?>