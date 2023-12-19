<?php
/* 
*Template name: Ширина записи 1025px
*Template Post Type: post
*/
get_header();
the_post();
?>

<!-- width_page_1025_wrap 1 -->

<div class="width_page_1025_wrap">

<!-- width_page_1025 1 -->
<div class="width_page_1025">


<!-- Content -->
<h1 ><?php the_title() ?></h1>

<?php the_content( ) ?>






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


<!-- width_page_1025 2 -->
</div>

<!-- width_page_1025_wrap 2 -->
</div>






<?php get_footer() ?>  