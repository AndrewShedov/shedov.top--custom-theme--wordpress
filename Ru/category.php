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
         <div class="posts_wrap">
            <div class="posts">
               <?php
                  if (have_posts()) : while (have_posts()) : the_post();  
                   get_template_part( 'parts/post' );
                  
                  
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
      <div class="popular_posts_wrap_index_page">
         <?php
            get_template_part( 'parts/sorting_posts_by_popularity' );
              ?>
      </div>
      <div class="all_categories_index_page">
         <?php
            get_template_part( 'parts/all_categories' );
            ?>
      </div>
   </div>
</div>
<?php
   get_footer();
   ?>