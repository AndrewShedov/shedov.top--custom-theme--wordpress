<?php get_header(); ?>
<div class="width_page_1165_wrap">
   <div class="width_page_1165">
      <div class="posts_categories_side_wrap__search_page">
         <?php
            get_template_part( 'parts/sorting_posts_by_popularity__left_sidebar' );
         ?>   
         <div class="search_wrap">
            <?php
               // 1. PROTECTION: Force the value to a number (absint)
               $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
               
               // 2. PROTECTION: Clean the query of junk and strictly truncate it to 50 characters (protection against Heavy Query DoS)
               $raw_s = get_search_query();
               $s = mb_substr(sanitize_text_field($raw_s), 0, 50);

               // 3. PROTECTION: Blocking deep pagination (Offset DoS)
               if ( $paged > 50 ) {
                   // If a bot requests page 51 or higher, we return an empty result,
// without burdening the database with a full-text search.
                   $args = array( 'post__in' => array(0) );
               } else {
                   $args = array(
                       'posts_per_page' => 5,
                       'paged'          => $paged,
                       's'              => $s
                   );
               }

               $the_query = new WP_Query($args);
               
               if ( $the_query->have_posts() && !empty($s) ) {
                   echo '<div class="search_results_wrap">';
                   echo "<div class='search_title'> <h2>Результаты поиска для: " . esc_html( $s ) . "</h2> </div>";
                   echo '<div class="search_results">';
                   
                   while ( $the_query->have_posts() ) {
                       $the_query->the_post();
                       get_template_part( 'parts/post_in_search' );
                   }
                   echo '</div></div>';
               } else {
            ?>
            <div class="nothing_found_title">
               <h2>Ничего не найдено для: <?php echo esc_html($s); ?></h2>
               <p>Попробуйте с другими ключевыми словами (не более 50 символов).</p>
            </div>
            <?php } ?>
            
            <?php get_template_part('content', get_post_format()); ?>
            
            <div class="pagination_wrap">
               <div class="pagination">
                  <div class="nav-links">
                     <?php
                        $total_pages = $the_query->max_num_pages;
                        
                        // If there is more than one page, show pagination, but visually no more than 50 items.
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('page'));
                            // Visual constraint
                            $display_total_pages = min($total_pages, 50); 
                            
                            echo paginate_links(array(
                                'base'      => @add_query_arg('page','%#%'),
                                'format'    => '?page=%#%',
                                'current'   => $current_page,
                                'total'     => $display_total_pages,
                                'prev_text' => __('back'),
                                'next_text' => __('next'),
                            ));
                        }
                     ?>
                  </div>
               </div>
            </div>
         </div>
         <?php
            get_template_part( 'parts/categories_side' );
         ?>
      </div>
   </div>
   <?php wp_reset_postdata(); ?>
   <section class="popular_posts_wrap_search_page">
      <?php
         get_template_part( 'parts/sorting_posts_by_popularity' );
      ?>
   </section>
   <div class="all_categories_search_page">
      <?php
         get_template_part( 'parts/all_categories' );
      ?>
   </div>
</div>
<?php get_footer(); ?>