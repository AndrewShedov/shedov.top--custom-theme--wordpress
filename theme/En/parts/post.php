<article id="post-<?php the_ID(); ?>" class="post">
   <a aria-label="see post" class="post_all_link" href="<?php the_permalink(); ?>"></a>
   <div class="post_image"> 
      <?php no_image(); ?>
   </div>
   <div class="post_title">
      <h2>
         <?php trim_title_chars(100, "…"); ?>
      </h2>
   </div>
   <div class="post_text">
      <p>
         <?php echo excerpt(35); ?>
      </p>
   </div>
   <?php if ($categories = get_the_category()): ?>
   <div class="post_categories">
      <ul class="post__categories_list">
         <?php foreach ($categories as $cat): ?>
         <li>
            <a href="<?php echo get_category_link($cat); ?>">
            <?php echo $cat->name; ?>
            </a>
         </li>
         <?php endforeach; ?>
      </ul>
      <?php endif; ?>
   </div>
   <div class="post__views__date__share__wrap">
      <div class="post_views_wrap">
         <div class="post_eye">
            <svg  viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
               <g stroke="none" stroke-width="1"   fill-rule="evenodd">
                  <path d="M14,5.25 C8.16666667,5.25 3.185,8.87833333 1.16666667,14 C3.185,19.1216667 8.16666667,22.75 14,22.75 C19.8333333,22.75 24.815,19.1216667 26.8333333,14 C24.815,8.87833333 19.8333333,5.25 14,5.25 L14,5.25 L14,5.25 Z M14,19.8333333 C10.78,19.8333333 8.16666667,17.22 8.16666667,14 C8.16666667,10.78 10.78,8.16666667 14,8.16666667 C17.22,8.16666667 19.8333333,10.78 19.8333333,14 C19.8333333,17.22 17.22,19.8333333 14,19.8333333 L14,19.8333333 L14,19.8333333 Z M14,10.5 C12.0633333,10.5 10.5,12.0633333 10.5,14 C10.5,15.9366667 12.0633333,17.5 14,17.5 C15.9366667,17.5 17.5,15.9366667 17.5,14 C17.5,12.0633333 15.9366667,10.5 14,10.5 L14,10.5 L14,10.5 Z">
                  </path>
               </g>
            </svg>
         </div>
         <div class="post__number_views">
            <?php
               $views = get_post_meta($post->ID, "views", true);
               echo format_number_short((int)$views);
               ?>
         </div>
      </div>
      <!-- post publication date -->
      <?php
         $published = get_the_time('U');
         $updated = get_the_modified_time('U');
         $current_year = date('Y');
         
         $pub_year = date('Y', $published);
         $upd_year = date('Y', $updated);
         
         $pub_format = ($pub_year === $current_year) ? 'F j' : 'F j, Y';
         $upd_format = ($upd_year === $current_year) ? 'F j' : 'F j, Y';
         
         $pub_date = date_i18n($pub_format, $published);
         $upd_date = date_i18n($upd_format, $updated);
         ?>
      <?php if ($published === $updated) : ?>
      <div class="post_date_wrap">
         <div class="post_date">
            <p><?php echo $pub_date; ?></p>
         </div>
      </div>
      <?php else : ?>
      <div class="post_date_wrap">
         <div class="post_date">
            <p><?php echo $pub_date; ?></p>
            <div class="post_date_upd_wrap">
               <div class="post_date_upd">
                  <div class="post_date_upd_separator_wrap">
                     <span class="post_date_upd_separator_svg" aria-hidden="true">
                        <svg viewBox="0 0 297 297" class="heartbeat">
                           <path
                              d="M277.47,49.459c-13.551-13.78-33.892-21.064-58.824-21.064c-30.677,0-57.294,17.727-70.144,43.475
                              c-12.85-25.748-39.466-43.475-70.144-43.475c-23.853,0-44.62,7.79-58.475,21.934C6.41,64.085-0.458,83.648,0.024,106.902
                              c0.273,13.19,3.447,26.465,9.483,39.782h51.16l18.615-55.847c1.115-3.345,4.247-5.602,7.773-5.602s6.658,2.256,7.773,5.602
                              l33.193,99.58l12.71-38.131c1.115-3.345,4.247-5.602,7.773-5.602H287.38c5.831-12.691,9.37-26.022,9.602-39.815
                              C297.393,82.359,290.828,63.043,277.47,49.459z"
                              fill="currentColor"
                              />
                           <path
                              d="M135.792,218.917c-1.115,3.345-4.247,5.602-7.773,5.602c-3.526,0-6.658-2.256-7.773-5.602l-33.193-99.58l-12.71,38.131
                              c-1.115,3.345-4.247,5.602-7.773,5.602H18.377c12.35,19.664,30.885,39.377,55.545,58.996
                              c35.138,27.955,69.518,44.986,70.965,45.697c1.14,0.561,2.377,0.841,3.616,0.841c1.252,0,2.503-0.287,3.654-0.86
                              c4.537-2.26,88.196-44.559,126.254-104.674H154.407L135.792,218.917z"
                              fill="currentColor"
                              />
                        </svg>
                     </span>
                  </div>
                  <p>upd: <?php echo $upd_date; ?></p>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <!-- / post publication date -->
      <div class="post_share_wrap">
         <div class="post_share">
            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
               viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
               <path d="M426.7,341.3c-29.1,0-54.8,14.7-70.2,36.9L167.4,278.1c1.9-7.1,3.3-14.4,3.3-22.1c0-7.7-1.3-15-3.3-22.1l189.1-100.1
                  c15.4,22.3,41,36.9,70.2,36.9c47.1,0,85.3-38.2,85.3-85.3S473.8,0,426.7,0s-85.3,38.2-85.3,85.3c0,0.8,0.2,1.6,0.2,2.4l-199,105.4
                  c-15.2-13.8-35.1-22.4-57.2-22.4C38.2,170.7,0,208.9,0,256s38.2,85.3,85.3,85.3c22.1,0,42-8.6,57.2-22.4l199,105.4
                  c0,0.8-0.2,1.6-0.2,2.4c0,47.1,38.2,85.3,85.3,85.3s85.3-38.2,85.3-85.3S473.8,341.3,426.7,341.3z"/>
            </svg>
         </div>
         <div class="post__share_list">
            <div class="post__share_list_title">
               <p>Share</p>
            </div>
            <div class="post__share_list_social_icons">
               <div class="post__share_list_social_icons__icon_wrap post__share_list_social_icons__x_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" version="1.1" aria-label="X link">
                     <path style=" stroke:none;fill-rule:nonzero; fill-opacity:1;" d="M 11.90625 8.476562 L 19.351562 0 L 17.585938 0 L 11.117188 7.359375 L 5.957031 0 L 0 0 L 7.808594 11.128906 L 0 20.015625 L 1.765625 20.015625 L 8.589844 12.242188 L 14.042969 20.015625 L 20 20.015625 M 2.402344 1.300781 L 5.109375 1.300781 L 17.585938 18.777344 L 14.875 18.777344 "/>
                  </svg>
                  <a href="http://twitter.com/share?&url=<?php the_permalink(); ?>"
                     onclick="window.open(this.href, this.title, ); return false" target="_parent">
                  </a>
               </div>
               <div class="post__share_list_social_icons__icon_wrap post__share_list_social_icons__telegram_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20">
                     <path d="m488.649875 44.6098697c6.442438-2.8224615 10.738405-4.6832009 12.887902-5.5822181 6.137252-2.5668769 7.41252-3.0127709 8.243723-3.0276516.182815-.0030813.591576.0424775.856354.2585203.223574.1824224.285088.428849.314524.6018054.029436.1729565.066092.5669556.036954.874815-.33258 3.5138587-1.771648 12.041067-2.503764 15.9766489-.309785 1.6652923-.919763 2.2236562-1.510292 2.2782995-1.283356.1187526-2.257879-.8528431-3.500872-1.6721675-1.945039-1.2820809-3.043862-2.0801802-4.931859-3.3312543-2.181908-1.4458326-.767468-2.2404874.475995-3.5391756.32542-.3398729 5.979917-5.5116482 6.08936-5.9808093.013687-.0586764.02639-.2773944-.102829-.3928855-.129218-.1154911-.319934-.0759976-.457559-.0445881-.195081.044522-3.302306 2.1096922-9.321675 6.1955107-.881976.6089971-1.680842.9057209-2.396598.8901714-.789064-.017142-2.306907-.4486274-3.435267-.8174505-1.38398-.4523766-2.48394-.6915513-2.388158-1.4598267.049889-.4001653.59791-.8094133 1.644061-1.227744z" fill-rule="evenodd" transform="translate(-487 -36)"></path>
                  </svg>
                  <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>"
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="telegram link">
                  </a>
               </div>
               <div class="post__share_list_social_icons__icon_wrap post__share_list_social_icons__vk_icon">
                  <svg viewBox="-8 -7 110 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M7.52944 7.02944C0.5 14.0589 0.5 25.3726 0.5 48V52C0.5 74.6274 0.5 85.9411 7.52944 92.9706C14.5589 100 25.8726 100 48.5 100H52.5C75.1274 100 86.4411 100 93.4706 92.9706C100.5 85.9411 100.5 74.6274 100.5 52V48C100.5 25.3726 100.5 14.0589 93.4706 7.02944C86.4411 0 75.1274 0 52.5 0H48.5C25.8726 0 14.5589 0 7.52944 7.02944ZM17.3752 30.4169C17.9168 56.4169 30.9167 72.0418 53.7084 72.0418H55.0003V57.1668C63.3753 58.0001 69.7082 64.1252 72.2498 72.0418H84.0835C80.8335 60.2085 72.2914 53.6668 66.9581 51.1668C72.2914 48.0835 79.7915 40.5835 81.5831 30.4169H70.8328C68.4995 38.6669 61.5836 46.1668 55.0003 46.8751V30.4169H44.2499V59.2501C37.5833 57.5835 29.1668 49.5002 28.7918 30.4169H17.3752Z"></path>
                  </svg>
                  <a href="http://vk.com/share.php?url=<?php the_permalink(); ?>" title=""
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="VK link">
                  </a>
               </div>
               <div class="post__share_link_copy_notification_wrap">
                  <div class="post__share_link_copy_notification_window">
                     <p>Copy</p>
                  </div>
                  <div class="post__share_link" data-href="<?php the_permalink(); ?>">
                     <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.975 14.51a1.05 1.05 0 0 0 0-1.485 2.95 2.95 0 0 1 0-4.172l3.536-3.535a2.95 2.95 0 1 1 4.172 4.172l-1.093 1.092a1.05 1.05 0 0 0 1.485 1.485l1.093-1.092a5.05 5.05 0 0 0-7.142-7.142L9.49 7.368a5.05 5.05 0 0 0 0 7.142c.41.41 1.075.41 1.485 0zm2.05-5.02a1.05 1.05 0 0 0 0 1.485 2.95 2.95 0 0 1 0 4.172l-3.5 3.5a2.95 2.95 0 1 1-4.171-4.172l1.025-1.025a1.05 1.05 0 0 0-1.485-1.485L3.87 12.99a5.05 5.05 0 0 0 7.142 7.142l3.5-3.5a5.05 5.05 0 0 0 0-7.142 1.05 1.05 0 0 0-1.485 0z"/>
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</article>