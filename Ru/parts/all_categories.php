<?php if ( $categories = get_categories(  )) : ?> 
<div class="all_categories_wrap">
   <div class="all_categories">
      <div class="all_categories_title">
         <h3>Все категории</h3>
      </div>
      <ul class="all_categories_list">
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