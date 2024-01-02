<?php get_header(); ?>
<div class="width_page_1165_wrap">
<div class="width_page_1165">
   <div class="entry_categories_side_wrap">
      <div class="search_wrap">
         <?php
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            $s = get_search_query();
            $args = array(
            'posts_per_page' => 5,
            'paged' => $paged,
            's' => $s
            );
            $the_query = new WP_Query($args);
            if ( $the_query->have_posts() ) {
            _e("<div class='search_title'> <h2>Результаты поиска для: ".get_query_var('s')."</h2>
            </div>" );
            echo '<div class="search_results_wrap">
                  <div class="search_results">';
            while ( $the_query->have_posts() ) {
            $the_query->the_post();
            ?>
         <div id="post-<?php the_ID(); ?>" class="search_results_cell_wrap">
            <a href="<?php the_permalink() ?>">
               <div class="search_results_cell">
                  <div class="search_results_cell_title_text_image_wrap">
                     <div class="search_results_cell_title_text_wrap">
                        <div class="search_results_cell_title">
                           <h3>
                              <?php trim_title_chars(80, "&nbsp;…"); ?>
                           </h3>
                        </div> 
                        <div class="search_results_cell_text_desktop">
                           <p>
                              <?php echo excerpt(19); ?>
                           </p>
                        </div> 
                        <div class="search_results_cell_text_mobile">
                           <p>
                              <?php echo excerpt(20); ?>
                           </p>
                        </div>
                     </div>
                     <div class="search_results_cell_image">
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
            '</div>
             </div>';
            }else{
            ?>
         <div class="nothing_found_title">
            <h2>Ничего не найдено для: <?php the_search_query(); ?></h2>
            <p>Попробуйте с другими ключевыми словами.</p>
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