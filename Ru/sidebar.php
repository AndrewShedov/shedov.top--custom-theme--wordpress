<div class="sidebar_wrap">
  <div class="sidebar">
    <?php if ( $categories = get_categories(  )) : ?>
    <div class="categories_wrap">
      <div class="categories">
        <div class="categories_title">
          <h3>Все категории</h3>
        </div>
        <ul class="categories_list">
          <?php foreach($categories as $cat) : ?>
             <li>
            <a href="<?php echo get_category_link( $cat )?>">
              <?php echo $cat ->name;?>
              </a>
            </li>
          <?php endforeach; ?>
          </ul>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>