<?php
/* 
*Template name: Ширина страницы 1400px
*/
get_header();
the_post();
?>
<div class="width_page_1400_wrap">
<div class="width_page_1400">
<!-- Content -->
<h1 ><?php the_title() ?></h1>

<?php the_content( ) ?>




<div class="width_1400_comments_wrap">

<div class="width_1400_date_wrap">

<div class="width_1400_date">
<?php the_time( 'j F Y' )?>
</div>

</div>

<?

comments_template();

?>


</div>



</div>


</div>






<?php get_footer() ?>  