



<a href="<?php the_permalink() ?>" >
<!-- recent_posts_cell_title_wrap 1 -->
<div class="recent_posts_cell_title_wrap">
<h3>
<?php trim_title_chars(30, " …"); ?>
</h3>
</a>
<!-- recent_posts_cell_title_wrap 2 -->
</div>
		

			<div>
				<?php the_excerpt(); ?>
			
			</div>

		

<?php

 no_image()

?>

<?php
		
		

// Default to displaying the post meta.
twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
?>


<!-- single_category_wrap 1 -->
<div class="single_category_wrap">


<div class="single_category">
  

<p>Категория:&nbsp;</p> <?php the_category( ',&nbsp;' ) ?>


</div>


<!-- single_category_wrap 2 -->
</div>


	

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>


