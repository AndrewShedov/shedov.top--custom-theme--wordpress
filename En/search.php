<?php get_header(); ?>
<div class="width_page_1165_wrap">
 <div class="width_page_1165">
   <div class="entry_categories_side_wrap">
      <div class="search_wrap">
         <?php
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            $s = get_search_query();
            $args = array(
            'posts_per_page' => 10,
            'paged' => $paged,
            's' => $s
            );
            $the_query = new WP_Query($args);
            //print_r($the_query);
            if ( $the_query->have_posts() ) {
            _e("<!-- <div class='search_title_wrap'> 1 -->
            <div class='search_title_wrap'> <h2>Search results for: ".get_query_var('s')."</h2><!-- <div class='search_title_wrap'> 2 -->
            </div>" );
            echo '<!-- search_results_wrap 1 -->
            <div class="search_results_wrap">
            <!-- search_results 1 -->
            <div class="search_results">';
            while ( $the_query->have_posts() ) {
            $the_query->the_post();
            ?>
         <div class="search_results_cell_wrap">
            <a href="<?php the_permalink() ?>">
               <div class="search_results_cell">
                  <div class="search_results_cell_title_text_image_wrap">
                     <div class="search_results_cell_title_text_wrap">
                        <div class="search_results_cell_title_wrap_2">
                           <h3>
                              <?php trim_title_chars(80, "&nbsp;…"); ?>
                           </h3>
                        </div>
                        <div class="search_results_cell_text_wrap_1">
                           <p>
                              <?php echo excerpt(25); ?>
                           </p>
                        </div>
                        <div class="search_results_cell_text_wrap_2">
                           <p>
                              <?php echo excerpt(20); ?>
                           </p>
                        </div>
                     </div>
                     <div class="search_results_cell_image_wrap">
                        <?php
                           no_image()
                           ?>
                     </div>
                  </div>
               </div>
            </a>
         </div>
         <?php
            }
            echo
            '<!-- search results 2 -->
            </div>
            <!-- search results_wrap 2 -->
            </div>';
            }else{
            ?>
         <div class="nothing_found_title">
            <h2>Nothing found for: <?php the_search_query(); ?></h2>
            <p>Try with other keywords.</p>
         </div>
         <?php } ?>
         <?php get_template_part('content', get_post_format()); ?>
         <div class="pagination_wrap">
            <div class="pagination">
               <div class="nav-links">
                  <?php
                     $total_pages = $the_query->max_num_pages;
                     if ($total_pages > 1){
                     $current_page = max(1, get_query_var('page'));
                     echo paginate_links(array(
                     'base' => @add_query_arg('page','%#%'),
                     'format' => '?page=%#%',
                     'current' => $current_page,
                     'total' => $total_pages,
                     'prev_text'    => __('back'),
                     'next_text'    => __('next'),
                     ));
                     }
                     ?>
               </div>
            </div>
         </div>
      </div>
      <?php
         get_template_part( 'categories_side' );
         ?>
   </div>
</div>
<?php wp_reset_postdata(); ?>
<?php
      get_template_part( 'parts/sorting_posts_by_popularity' );
        ?>
 <div class="single_width_1025_wrap">
   <div class="single_width_1025">
      <?php get_sidebar(); ?>
   </div>
</div>
</div>
<?php get_footer(); ?>