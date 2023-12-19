<?php
/* 
*Template name: Ширина страницы 1025px
*/
get_header();
the_post();
?>
<div class="width_page_1025_wrap">
<div class="width_page_1025">
<!-- Content -->
<h1 class="main_title" ><?php the_title() ?></h1>

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



</div>


</div>






<?php get_footer() ?>  