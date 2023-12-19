<?php get_header(); the_post(); ?>
<div class="single_width_1025_wrap">
   <div class="single_width_1025">
      <div class="single_title_wrap">
         <div class="single_title ">
            <h1><?php the_title()?></h1>
         </div>
      </div>
      <div class="single_title_date_wrap">
         <div class="single_title_date">
            <p>
               <?php the_time('d.m.Y') ?>
            </p>
         </div>
      </div>
      <div class="single_wrap">
         <?php the_content() ?>
         <div class="single_share_post_wrap">
            <div class="single_share_post">
               <div class="single_share_post_title_wrap">
                  <div class="single_share_post_title">
                     <p>Share</p>
                  </div>
               </div>
               <div class="single_share_Icons_Wrap_level_1_wrap">
                  <a class="single_share_vk_icon" href="http://vk.com/share.php?url=<?php the_permalink() ?>" title=""
                     onclick="window.open(this.href, this.title, ); return false" target="_parent"><i class="fab fa-vk"></i>
                  </a>
                  <a class="single_share_telegram_icon_svg_a"
                     href="https://telegram.me/share/url?url=<?php the_permalink() ?>" title=""
                     onclick="window.open(this.href, this.title, ); return false" target="_parent">
                     <div class="single_share_telegram_icon_svg_wrap">
                        <svg class="single_share_telegram_icon_svg" width="20" height="20" viewBox="-3 0 30 25" fill="none"
                           xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                           >
                           <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z">
                           </path>
                        </svg>
                     </div>
                  </a>
                  <a class="single_share_twitter" href="http://twitter.com/share?&url=<?php the_permalink() ?>" title=""
                     onclick="window.open(this.href, this.title, ); return false" target="_parent"><i
                     class="fab fa-twitter"></i>
                  </a>
                  <div class="single_share_copy_notification">
                     <div>
                        <div class="single_share_copy_notification_text" id="single_share_copy_notification">
                           <p>Copy</p>
                        </div>
                        <div class="single_share_copy_icon" 
                        data-href="<?php the_permalink() ?>">
                           <i class="fas fa-copy"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="single_sub_wrap">
            <div class="single_sub_icons_wrap">
               <div class="single_sub_icons_wrap_level_1_wrap">
                  <a class="telegram_pro_icon_sub_single_a" href="https://t.me/AndrewShedovChannel" target="_blank">
                     <svg class="telegram_pro_icon_sub_single" width="28"
                        height="28" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">
                        <path fill-rule="evenodd" clip-rule="evenodd" id="telegram-1"
                           d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z" />
                     </svg>
                  </a>
                  <a class="behance_icon_sub_single" href="https://www.behance.net/AndrewShedov" target="_blank"
                     rel="noopener"><i class="fab fa-behance"></i></a>
                  <a class="codepen_icon_sub_single" href="https://codepen.io/AndrewShedov" target="blank" rel="noopener"><i
                     class="fab fa-codepen"></i>
                  </a>
                  <a class="github_icon_sub_single" href="https://github.com/AndrewShedov" target="blank" rel="noopener"><i
                     class="fab fa-github"></i> </a>
               </div>
               <div class="single_sub_icons_wrap_level_3_wrap"> <a class="qiwi_icon_sub_single"
                  href="https://qiwi.com/n/ANDREWSHEDOV" target="blank" rel="noopener"><img
                  src="https://shedov.top/wp-content/images/qiwi.png" alt="qiwi" /> </a> <a
                  class="yoomoney_icon_sub_single" href="https://yoomoney.ru/to/410011226872318" target="blank"
                  rel="noopener"><img src="https://shedov.top/wp-content/images/yoomoney.png" alt="yoomoney" /> </a>
                  <a class="tinkoff_icon_sub_single" href="https://www.tinkoff.ru/rm/shedov.andrey2/lGla256001" target="blank"
                     rel="noopener"><img src="https://shedov.top/wp-content/images/tinkoff_logo.png" alt="tinkoff" /> </a>
               </div>
               <div class="single_sub_icons_wrap_level_5_wrap">
                  <div class="single_sub_icons_wrap_level_5">
                     <p> BTC: 1C2EWWeEXVhg93hJA9KovpkSd3Rn3BkcYm </p>
                     <p> ETH: 0x05037ecbd8bcd15631d780c95c3799861182e6b8 </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="single_date_number_comments_category_wrap">
            <div class="single_date_number_comments_category">
               <div class="single_date__number_comments_wrap">
               </div>
               <div class="single_number_comments_wrap" id="single_number_comments_wrap">
                  <div class="single_number_comments">
                     <a href="<?php the_permalink(  ) ?>#comments"><?php comments_number( ) ?></a>
                  </div>
               </div>
            </div>
            <?php
               if ( $categories = get_the_category()) : ?>
            <div class="categories_entry_wrap">
               <div class="categories_entry">
                  <div class="categories_entry_title">
                  </div>
                  <ul class="categories_entry_list">
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
      <?php
         $args = array(
         'posts_per_page' => 4,
         'ignore_sticky_posts' => true,
         'category__in' => $category_ids, // array(1,5,10);
         );
         $query = new WP_Query ( $args);
         if ($query->have_posts()) : //если посты не найдены
         ?>
   </div>
</div>
<div id="similar_news_wrap_1">
   <div class="similar_news_wrap">
      <div class="similar_news_title_wrap">
         <div class="similar_news_title">
            <div class="similar_news_title_text">
               <h3>Similar</h3>
            </div>
         </div>
      </div>
      <div class="similar_news">
         <?php
            $categories = get_the_category($post->ID);
            if ($categories) {
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
            $args=array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'showposts'=>5,
            'orderby'=>rand(),
            'caller_get_posts'=>1);
            $my_query = new wp_query($args);
            if( $my_query->have_posts() ) 
            while ($my_query->have_posts()) {
            $my_query->the_post();
            ?>
         <div class="similar_news_cell_wrap">
            <div class="similar_news_cell">
               <a href="<?php the_permalink() ?>">
                  <div class="similar_news_cell_image_wrap">
                     <?php
                        no_image()
                        ?>
                  </div>
                  <div class="similar_news_cell_title_wrap">
                     <h3>
                        <?php echo mb_strimwidth(get_the_title(), 0, 40,'...'); ?>
                     </h3>
                  </div>
               </a>
            </div>
         </div>
         <?php
            }
            wp_reset_query();
            wp_reset_postdata(); 
            }
            ?>
      </div>
   </div>
</div>
<?php endif;
   wp_reset_postdata( );
   ?>
<div class="single_width_1025_wrap">
   <div class="single_width_1025">
      <?php
         get_template_part( 'sidebar_single' );
         ?>
      <?php if (comments_open()) { ?>
      <?php comments_template(); ?>
      <?php } ?>
   </div>
</div>
<?php get_footer() ?>