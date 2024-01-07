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
               <div class="single_share_post_title">
                  <p>Share</p>
               </div>
               <div class="single_share_post_social_links">
                  <a href="http://twitter.com/share?&url=<?php the_permalink() ?>"
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="Share on X">
                     <svg class="single_share_post_social_links__x_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" version="1.1" aria-label="X link">
                        <path style=" stroke:none;fill-rule:nonzero; fill-opacity:1;" d="M 11.90625 8.476562 L 19.351562 0 L 17.585938 0 L 11.117188 7.359375 L 5.957031 0 L 0 0 L 7.808594 11.128906 L 0 20.015625 L 1.765625 20.015625 L 8.589844 12.242188 L 14.042969 20.015625 L 20 20.015625 M 2.402344 1.300781 L 5.109375 1.300781 L 17.585938 18.777344 L 14.875 18.777344 "/>
                     </svg>
                  </a>
                  <a href="https://telegram.me/share/url?url=<?php the_permalink() ?>"
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="Share on Telegram">
                     <svg class="single_share_post_social_links__telegram_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20">
                        <path d="m488.649875 44.6098697c6.442438-2.8224615 10.738405-4.6832009 12.887902-5.5822181 6.137252-2.5668769 7.41252-3.0127709 8.243723-3.0276516.182815-.0030813.591576.0424775.856354.2585203.223574.1824224.285088.428849.314524.6018054.029436.1729565.066092.5669556.036954.874815-.33258 3.5138587-1.771648 12.041067-2.503764 15.9766489-.309785 1.6652923-.919763 2.2236562-1.510292 2.2782995-1.283356.1187526-2.257879-.8528431-3.500872-1.6721675-1.945039-1.2820809-3.043862-2.0801802-4.931859-3.3312543-2.181908-1.4458326-.767468-2.2404874.475995-3.5391756.32542-.3398729 5.979917-5.5116482 6.08936-5.9808093.013687-.0586764.02639-.2773944-.102829-.3928855-.129218-.1154911-.319934-.0759976-.457559-.0445881-.195081.044522-3.302306 2.1096922-9.321675 6.1955107-.881976.6089971-1.680842.9057209-2.396598.8901714-.789064-.017142-2.306907-.4486274-3.435267-.8174505-1.38398-.4523766-2.48394-.6915513-2.388158-1.4598267.049889-.4001653.59791-.8094133 1.644061-1.227744z" fill-rule="evenodd" transform="translate(-487 -36)"></path>
                     </svg>
                  </a>
                  <a href="http://vk.com/share.php?url=<?php the_permalink() ?>" title=""
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="Share on VK">
                     <svg class="single_share_post_social_links__vk_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="3.3 3 13 13" version="1.1">
                        <path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 10.640625 14.410156 C 6.082031 14.410156 3.484375 11.285156 3.375 6.082031 L 5.660156 6.082031 C 5.734375 9.898438 7.417969 11.515625 8.75 11.851562 L 8.75 6.082031 L 10.898438 6.082031 L 10.898438 9.375 C 12.214844 9.234375 13.601562 7.734375 14.066406 6.082031 L 16.214844 6.082031 C 15.859375 8.117188 14.359375 9.617188 13.292969 10.234375 C 14.359375 10.734375 16.066406 12.042969 16.714844 14.410156 L 14.351562 14.410156 C 13.839844 12.824219 12.574219 11.601562 10.898438 11.433594 L 10.898438 14.410156 Z M 10.640625 14.410156 "/>
                     </svg>
                  </a>
                  <div class="single_share_copy_notification_wrap">
                     <div class="single_share_copy_notification">
                        <p>Copy</p>
                     </div>
                     <div class="single_share_copy_icon" 
                        data-href="<?php the_permalink() ?>">
                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg class="single_share_post_social_links__share_link" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M10.975 14.51a1.05 1.05 0 0 0 0-1.485 2.95 2.95 0 0 1 0-4.172l3.536-3.535a2.95 2.95 0 1 1 4.172 4.172l-1.093 1.092a1.05 1.05 0 0 0 1.485 1.485l1.093-1.092a5.05 5.05 0 0 0-7.142-7.142L9.49 7.368a5.05 5.05 0 0 0 0 7.142c.41.41 1.075.41 1.485 0zm2.05-5.02a1.05 1.05 0 0 0 0 1.485 2.95 2.95 0 0 1 0 4.172l-3.5 3.5a2.95 2.95 0 1 1-4.171-4.172l1.025-1.025a1.05 1.05 0 0 0-1.485-1.485L3.87 12.99a5.05 5.05 0 0 0 7.142 7.142l3.5-3.5a5.05 5.05 0 0 0 0-7.142 1.05 1.05 0 0 0-1.485 0z"/>
                        </svg>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="single_sub_wrap">
            <div class="single_sub_icons">
               <div class="single_sub_icons_level_1">
                  <a class="single_sub_icons_level_1__telegram_icon" href="https://t.me/AndrewShedovChannel" target="_blank" rel="noopener" aria-label="telegram link">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20">
                        <path d="m488.649875 44.6098697c6.442438-2.8224615 10.738405-4.6832009 12.887902-5.5822181 6.137252-2.5668769 7.41252-3.0127709 8.243723-3.0276516.182815-.0030813.591576.0424775.856354.2585203.223574.1824224.285088.428849.314524.6018054.029436.1729565.066092.5669556.036954.874815-.33258 3.5138587-1.771648 12.041067-2.503764 15.9766489-.309785 1.6652923-.919763 2.2236562-1.510292 2.2782995-1.283356.1187526-2.257879-.8528431-3.500872-1.6721675-1.945039-1.2820809-3.043862-2.0801802-4.931859-3.3312543-2.181908-1.4458326-.767468-2.2404874.475995-3.5391756.32542-.3398729 5.979917-5.5116482 6.08936-5.9808093.013687-.0586764.02639-.2773944-.102829-.3928855-.129218-.1154911-.319934-.0759976-.457559-.0445881-.195081.044522-3.302306 2.1096922-9.321675 6.1955107-.881976.6089971-1.680842.9057209-2.396598.8901714-.789064-.017142-2.306907-.4486274-3.435267-.8174505-1.38398-.4523766-2.48394-.6915513-2.388158-1.4598267.049889-.4001653.59791-.8094133 1.644061-1.227744z"  fill-rule="evenodd" transform="translate(-487 -36)"/>
                     </svg>
                  </a>
                  <a href="https://www.behance.net/AndrewShedov" target="blank" rel="noopener" aria-label="behance link">
                     <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                     <svg class="contacts_icons_level_1_behance_icon" viewBox="0 -3.5 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g  stroke="none" stroke-width="1"  fill-rule="evenodd">
                           <g  transform="translate(-100.000000, -7482.000000)" >
                              <g  transform="translate(56.000000, 160.000000)">
                                 <path d="M56.981,7324.11726 L62.069,7324.11726 L62.069,7322.65997 L56.981,7322.65997 L56.981,7324.11726 Z M59.489,7327.04322 C58.354,7327.04322 57.492,7327.74656 57.409,7329.04584 L61.481,7329.04584 C61.205,7327.50385 60.52,7327.04322 59.489,7327.04322 L59.489,7327.04322 Z M59.648,7333.06968 C60.696,7333.06968 61.465,7332.40764 61.622,7331.84992 L63.826,7331.84992 C63.196,7333.86701 61.895,7335 59.559,7335 C56.578,7335 54.905,7332.87964 54.905,7330.06626 C54.905,7323.44077 64.465,7323.20323 63.985,7330.68491 L57.409,7330.68491 C57.473,7332.20418 58.1,7333.06968 59.648,7333.06968 L59.648,7333.06968 Z M49.73,7332.77842 C50.933,7332.77842 51.775,7332.31572 51.775,7331.06705 C51.775,7329.77191 51.031,7329.21006 49.782,7329.21006 L46.768,7329.21006 L46.768,7332.77842 L49.73,7332.77842 Z M49.571,7327.26218 C50.572,7327.26218 51.263,7326.79638 51.263,7325.71399 C51.263,7324.57377 50.459,7324.22158 49.36,7324.22158 L46.768,7324.22158 L46.768,7327.26218 L49.571,7327.26218 L49.571,7327.26218 Z M49.924,7322 C52.295,7322 53.943,7322.7839 53.943,7325.22237 C53.943,7326.42973 53.458,7327.32931 52.233,7327.93557 C53.801,7328.40137 54.543,7329.62422 54.543,7331.23127 C54.543,7333.78232 52.52,7335 50.1,7335 L44,7335 L44,7322 L49.924,7322 Z"  >
                                 </path>
                              </g>
                           </g>
                        </g>
                     </svg>
                  </a>
                  <a href="https://codepen.io/AndrewShedov" target="blank" rel="noopener" aria-label="codepen link">
                     <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                     <svg viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g  stroke="none" stroke-width="1"  fill-rule="evenodd">
                           <g transform="translate(-800.000000, -160.000000)" >
                              <path d="M847.982,176.419 C847.9775,176.3875 847.97,176.359 847.9655,176.329 C847.955,176.2705 847.9445,176.212 847.9295,176.1565 C847.9205,176.122 847.907,176.089 847.8965,176.056 C847.88,176.005 847.8635,175.9555 847.844,175.906 C847.8305,175.8715 847.814,175.837 847.7975,175.8055 C847.7765,175.7575 847.754,175.7125 847.727,175.669 C847.709,175.636 847.688,175.6045 847.6685,175.573 C847.6415,175.5295 847.613,175.4875 847.5815,175.447 C847.559,175.417 847.535,175.387 847.511,175.3585 C847.478,175.3195 847.4435,175.282 847.4075,175.246 C847.3805,175.219 847.355,175.1905 847.3265,175.1665 C847.2875,175.132 847.2485,175.099 847.2095,175.0675 C847.178,175.0435 847.148,175.0195 847.1165,174.997 C847.1045,174.9895 847.094,174.979 847.082,174.9715 L825.1445,160.3465 C824.4515,159.8845 823.55,159.8845 822.8555,160.3465 L800.9195,174.9715 C800.9075,174.979 800.897,174.9895 800.885,174.997 C800.852,175.0195 800.822,175.0435 800.792,175.0675 C800.7515,175.099 800.7125,175.132 800.675,175.1665 C800.6465,175.1905 800.6195,175.219 800.5925,175.246 C800.5565,175.282 800.522,175.3195 800.4905,175.3585 C800.465,175.387 800.441,175.417 800.4185,175.447 C800.3885,175.4875 800.36,175.5295 800.333,175.573 C800.312,175.6045 800.2925,175.636 800.273,175.669 C800.2475,175.7125 800.225,175.7575 800.2025,175.8055 C800.1875,175.837 800.171,175.8715 800.1575,175.906 C800.1365,175.9555 800.12,176.005 800.1035,176.056 C800.093,176.089 800.081,176.122 800.072,176.1565 C800.057,176.212 800.0465,176.2705 800.036,176.329 C800.03,176.359 800.0225,176.3875 800.0195,176.419 C800.0075,176.506 800,176.596 800,176.6875 L800,191.3125 C800,191.4025 800.0075,191.4925 800.0195,191.5825 C800.0225,191.611 800.03,191.641 800.036,191.671 C800.0465,191.7295 800.057,191.7865 800.072,191.8435 C800.081,191.878 800.093,191.911 800.1035,191.944 C800.12,191.9935 800.1365,192.0445 800.1575,192.0955 C800.171,192.1285 800.1875,192.1615 800.2025,192.1945 C800.225,192.241 800.2475,192.286 800.273,192.3325 C800.2925,192.364 800.312,192.3955 800.333,192.427 C800.36,192.4705 800.3885,192.511 800.4185,192.5515 C800.441,192.583 800.465,192.613 800.4905,192.6415 C800.522,192.679 800.5565,192.718 800.5925,192.7525 C800.6195,192.781 800.6465,192.808 800.675,192.8335 C800.7125,192.868 800.7515,192.901 800.792,192.9325 C800.822,192.9565 800.852,192.9805 800.885,193.003 C800.897,193.0105 800.9075,193.021 800.9195,193.0285 L822.8555,207.6535 C823.202,207.8845 823.601,208 824,208 C824.399,208 824.798,207.8845 825.1445,207.6535 L847.082,193.0285 C847.094,193.021 847.1045,193.0105 847.1165,193.003 C847.148,192.9805 847.178,192.9565 847.2095,192.9325 C847.2485,192.901 847.2875,192.868 847.3265,192.8335 C847.355,192.808 847.3805,192.781 847.4075,192.7525 C847.4435,192.718 847.478,192.679 847.511,192.6415 C847.535,192.613 847.559,192.583 847.5815,192.5515 C847.613,192.511 847.6415,192.4705 847.6685,192.427 C847.688,192.3955 847.709,192.364 847.727,192.3325 C847.754,192.286 847.7765,192.241 847.7975,192.1945 C847.814,192.1615 847.8305,192.1285 847.844,192.0955 C847.8635,192.0445 847.88,191.9935 847.8965,191.944 C847.907,191.911 847.9205,191.878 847.9295,191.8435 C847.9445,191.7865 847.955,191.7295 847.9655,191.671 C847.97,191.641 847.9775,191.611 847.982,191.5825 C847.994,191.4925 848,191.4025 848,191.3125 L848,176.6875 C848,176.596 847.994,176.506 847.982,176.419 L847.982,176.419 L847.982,176.419 Z M826.0625,165.9175 L842.2235,176.6905 L835.0055,181.519 L826.0625,175.537 L826.0625,165.9175 L826.0625,165.9175 Z M821.9375,165.9175 L821.9375,175.537 L812.996,181.519 L805.7765,176.6905 L821.9375,165.9175 L821.9375,165.9175 Z M804.125,180.5485 L809.2865,184 L804.125,187.4515 L804.125,180.5485 L804.125,180.5485 Z M821.9375,202.0825 L805.7765,191.3095 L812.996,186.4825 L821.9375,192.463 L821.9375,202.0825 L821.9375,202.0825 Z M824,188.8795 L816.7055,184 L824,179.1205 L831.296,184 L824,188.8795 L824,188.8795 Z M826.0625,202.0825 L826.0625,192.463 L835.0055,186.4825 L842.2235,191.3095 L826.0625,202.0825 L826.0625,202.0825 Z M843.875,187.4515 L838.715,184 L843.875,180.5485 L843.875,187.4515 L843.875,187.4515 Z">
                              </path>
                           </g>
                        </g>
                     </svg>
                  </a>
                  <a href="https://github.com/AndrewShedov" target="blank" rel="noopener" aria-label="github link">
                     <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"   data-view-component="true" class="octicon octicon-mark-github v-align-middle color-fg-default">
                        <path d="M8 0c4.42 0 8 3.58 8 8a8.013 8.013 0 0 1-5.45 7.59c-.4.08-.55-.17-.55-.38 0-.27.01-1.13.01-2.2 0-.75-.25-1.23-.54-1.48 1.78-.2 3.65-.88 3.65-3.95 0-.88-.31-1.59-.82-2.15.08-.2.36-1.02-.08-2.12 0 0-.67-.22-2.2.82-.64-.18-1.32-.27-2-.27-.68 0-1.36.09-2 .27-1.53-1.03-2.2-.82-2.2-.82-.44 1.1-.16 1.92-.08 2.12-.51.56-.82 1.28-.82 2.15 0 3.06 1.86 3.75 3.64 3.95-.23.2-.44.55-.51 1.07-.46.21-1.61.55-2.33-.66-.15-.24-.6-.83-1.23-.82-.67.01-.27.38.01.53.34.19.73.9.82 1.13.16.45.68 1.31 2.69.94 0 .67.01 1.3.01 1.49 0 .21-.15.45-.55.38A7.995 7.995 0 0 1 0 8c0-4.42 3.58-8 8-8Z"></path>
                     </svg>
                  </a>
               </div>
               <div class="single_sub_icons_level_2"> <a class="single_sub_icons_level_2__qiwi_icon"
                  href="https://qiwi.com/n/ANDREWSHEDOV" target="blank" rel="noopener" aria-label="qiwi link"><img
                  src="https://shedov.top/wp-content/images/qiwi.png" alt="qiwi" /> </a> <a
                  class="yoomoney_icon_sub_single" href="https://yoomoney.ru/to/410011226872318" target="blank"
                  rel="noopener" aria-label="yoomoney link"><img src="https://shedov.top/wp-content/images/yoomoney.png" alt="yoomoney" /> </a>
                  <a class="tinkoff_icon_sub_single" href="https://www.tinkoff.ru/rm/shedov.andrey2/lGla256001" target="blank"
                     rel="noopener" aria-label="tinkoff link"><img src="https://shedov.top/wp-content/images/tinkoff_logo.png" alt="tinkoff" /> </a>
               </div>
               <div class="single_sub_icons_level_3">
                  <p>BTC (Network BTC) - 1N1GXRUXNTbwPa1mQY5ugufNdhGWxQxtyU</p>
                  <p>Ethereum (Network ERC20) - 0xd6893a5807c24cf5c1319f10489c89540cba149b</p>
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
      <div class="similar_news_title">
         <h3>Similar</h3>
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
      <?php if ( $categories = get_categories(  )) : ?>
      <div class="categories_wrap">
         <div class="categories_single">
            <div class="categories_title_single">
               <h3>All categories</h3>
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
      <?php if (comments_open()) { ?>
      <?php comments_template(); ?>
      <?php } ?>
   </div>
</div>
<?php get_footer() ?>