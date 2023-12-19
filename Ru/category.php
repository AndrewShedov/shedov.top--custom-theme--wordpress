<?php
   get_header();
   ?>
<div class="category_name_title_wrap">
   <div class="category_name_title">
      <div class="category_name_title_text">
         <?php echo get_category_parents($cat, TRUE, '<p>&nbsp;/&nbsp;</p>'); ?>
      </div>
   </div>
</div>
<div class="width_page_1165_wrap">
   <div class="width_page_1165">
      <div class="entry_categories_side_wrap">
         <div class="entry_wrap">
            <div class="entry">
               <?php
                  if (have_posts()) : while (have_posts()) : the_post();  
                   get_template_part( 'posts' );
                  
                  
                    endwhile;
                   endif;
                    ?>
            </div>
         </div>
         <?php
            get_template_part( 'categories_side' );
             ?>
      </div>
      <div class="pagination_wrap">
         <div class="pagination">
            <?php get_template_part( 'template-parts/pagination' ); ?>
         </div>
      </div>
     </div>
</div>
<div id="similar_news_wrap_1">
         <div class="similar_news_wrap">
            <div class="similar_news_title_wrap">
               <div class="similar_news_title">
                  <div class="similar_news_title_text">
                     <h3>Похожее</h3>
                  </div>
               </div>
            </div>
            <div class="similar_news">
               <?php
                  $categories = get_the_category($post->ID);
                  if ($categories) {
                  $category_ids = array();
                  foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                  $args=array(
                  'category__in' => $category_ids,
                  'post__not_in' => array($post->ID),
                  'showposts'=>5,
                  'orderby'=>rand(),
                  'caller_get_posts'=>1);
                  $my_query = new wp_query($args);
                  if( $my_query->have_posts() ) 
                  while ($my_query->have_posts()) {
                  $my_query->the_post();
                  ?>
               <div class="similar_news_cell_wrap">
                  <div class="similar_news_cell">
                     <a href="<?php the_permalink() ?>">
                        <div class="similar_news_cell_image_wrap">
                           <?php
                              no_image()
                              ?>
                        </div>
                        <div class="similar_news_cell_title_wrap">
                           <h3>
                              <?php echo mb_strimwidth(get_the_title(), 0, 45,'...'); ?>
                           </h3>
                        </div>
                     </a>
                  </div>
               </div>
               <?php
                  }
                  wp_reset_query();
                  wp_reset_postdata(); 
                  }
                  ?>
            </div>
         </div>
      </div>
      <?php get_sidebar() ?>
<?php
   get_footer();
   ?>