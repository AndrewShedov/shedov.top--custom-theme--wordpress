<?php
$args = array(
'posts_per_page' => 4,
'ignore_sticky_posts' => true,
);
$query = new WP_Query ( $args);
if ($query->have_posts()) : //если посты не найдены
?>
<div class="recent_posts_title">
  <h3>Новости</h3>
</div>
<div class="recent_posts_wrap">
  <div class="recent_posts">
    <div class="recent_posts_list_wrap">
      <div class="recent_posts_list">
        <?php   while ($query->have_posts()) : $query->the_post(  ); ?>
        <div class="recent_posts_cell_wrap">
          <div class="recent_posts_cell">
            <a href="<?php the_permalink() ?>">
              <div class="recent_posts_cell_title_wrap">
                <h3><?php the_title(  ) ?></h3>
              </div>
              <div class="recent_posts_cell_image_wrap">
                <?php
no_image()
?>
              </div>
              <div class="recent_posts_cell_date_wrap">
                <p>
                  <?php the_time('j F Y') ?>
                </p>
              </div>
            </a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<div class="pagination_wrap">
  <div class="pagination">
    <?php if (function_exists('wpschool_page_navi')) wpschool_page_navi(); ?>
  </div>
</div>