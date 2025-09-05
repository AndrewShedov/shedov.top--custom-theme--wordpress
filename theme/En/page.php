<?php get_header() ?>
<main class="width_page_1025_wrap">
   <div class="width_page_1025">
      <div class="main_title">
         <h1><?php the_title() ?></h1>
      </div>
      <?php the_content(); ?>
      <?php if (comments_open()) { ?>
      <div class="width_1025_comments_wrap">
         <div class="width_1025_date_wrap">
            <div class="width_1025_date">
               <?php the_time( 'j F Y' )?>
            </div>
         </div>
         <?comments_template();?>
      </div>
      <?php } ?>
   </div>
</main>
<?php get_footer() ?>