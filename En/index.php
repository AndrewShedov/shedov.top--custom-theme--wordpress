<?php get_header() ?>
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
            <?php get_template_part( 'parts/pagination/pagination' ); ?>
         </div>
      </div>
   </div>
</div>
<?php
   get_template_part( 'parts/sorting_posts_by_popularity' );
     ?>
<?php get_sidebar() ?>
<?php get_footer() ?>