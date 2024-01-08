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
      <div class="entry_categories_side_wrap__categories_page">
         <?php
            get_template_part( 'parts/sorting_posts_by_popularity__left_sidebar' );
            ?>
         <div class="entry_wrap">
            <div class="entry">
               <?php
                  if (have_posts()) : while (have_posts()) : the_post();  
                   get_template_part( 'parts/posts' );
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
            <?php get_template_part( 'template-parts/pagination' ); ?>
         </div>
      </div>
   </div>
</div>
<div id="similar_news_wrap_1">
   <div class="similar_news_wrap">
      <div class="similar_news_title">
         <h3>Related Posts</h3>
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
         <div class="similar_news_cell">
            <a href="<?php the_permalink() ?>">
               <div class="similar_news_cell_image">
                  <?php
                     no_image()
                     ?>
               </div>
               <div class="similar_news_cell_title">
                  <p>
                     <?php echo mb_strimwidth(get_the_title(), 0, 40,'...'); ?>
                  </p>
               </div>
            </a>
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
<?php
   get_footer();
   ?>