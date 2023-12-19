    <?php if ( $categories = get_categories(  )) : ?> 
    <div class="categories_wrap_single">
      <div class="categories_single">
        <div class="categories_title_single">
          <h3>Все категории</h3>
        </div>
        <ul class="categories_list_single">
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
