<div id="post-<?php the_ID(); ?>" class="search_results_cell_wrap">
      <a href="<?php the_permalink() ?>">
        <div class="search_results_cell">
          <div class="search_results_cell_title_wrap_1">
            <h3>
              <?php trim_title_chars(80, "&nbsp;…"); ?>
            </h3>
          </div>
          <div class="search_results_cell_title_text_image_wrap">
            <div class="search_results_cell_title_text_wrap">
              <div class="search_results_cell_title_wrap_2">
                <h3>
                  <?php trim_title_chars(80, "&nbsp;…"); ?>
                </h3>
              </div>
              <div class="search_results_cell_text_wrap_1">
                <p>
                  <?php echo excerpt(45); ?>
                </p>
              </div>
              <div class="search_results_cell_text_wrap_2">
                <p>
                  <?php echo excerpt(20); ?>
                </p>
              </div>
            </div>
            <div class="search_results_cell_image_wrap">
              <?php
no_image()
?>
            </div>
          </div>
        </div>
      </a>
    </div>