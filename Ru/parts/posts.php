<div id="post-<?php the_ID(); ?>" class="post">
      <a aria-label="посмотреть пост" class="post_all_link" href="<?php the_permalink(); ?>">
      </a>
         <div class="post_image"> <?php no_image(); ?> </div>
         <div class="post_title">
            <p> <?php trim_title_chars(100, "…"); ?> </p>
         </div> 
            <div class="post_text">
               <p> <?php echo excerpt(21); ?> </p>
            </div>
         <?php if ($categories = get_the_category()): ?> 
         <div class="post_categories">
            <ul class="post__categories_list">
               <?php foreach ($categories as $cat): ?> 
               <li>
                  <a
                     href="<?php echo get_category_link($cat); ?>"> 
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
               <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
               <svg  viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g stroke="none" stroke-width="1"   fill-rule="evenodd">
                     <path d="M14,5.25 C8.16666667,5.25 3.185,8.87833333 1.16666667,14 C3.185,19.1216667 8.16666667,22.75 14,22.75 C19.8333333,22.75 24.815,19.1216667 26.8333333,14 C24.815,8.87833333 19.8333333,5.25 14,5.25 L14,5.25 L14,5.25 Z M14,19.8333333 C10.78,19.8333333 8.16666667,17.22 8.16666667,14 C8.16666667,10.78 10.78,8.16666667 14,8.16666667 C17.22,8.16666667 19.8333333,10.78 19.8333333,14 C19.8333333,17.22 17.22,19.8333333 14,19.8333333 L14,19.8333333 L14,19.8333333 Z M14,10.5 C12.0633333,10.5 10.5,12.0633333 10.5,14 C10.5,15.9366667 12.0633333,17.5 14,17.5 C15.9366667,17.5 17.5,15.9366667 17.5,14 C17.5,12.0633333 15.9366667,10.5 14,10.5 L14,10.5 L14,10.5 Z">
                     </path>
                  </g>
               </svg>
            </div> 
            <div class="post__number_views">
               <?php echo get_post_meta($post->ID, "views", true); ?>
            </div>
         </div> 
         <div class="post__publication_date">
            <p> <?php the_time("d.m.Y"); ?> </p>
         </div>
         <div class="post_share_wrap">
            <div class="post_share">
               
                  <svg  height="16px" width="16px" version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                     viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                     <path d="M426.7,341.3c-29.1,0-54.8,14.7-70.2,36.9L167.4,278.1c1.9-7.1,3.3-14.4,3.3-22.1c0-7.7-1.3-15-3.3-22.1l189.1-100.1
                        c15.4,22.3,41,36.9,70.2,36.9c47.1,0,85.3-38.2,85.3-85.3S473.8,0,426.7,0s-85.3,38.2-85.3,85.3c0,0.8,0.2,1.6,0.2,2.4l-199,105.4
                        c-15.2-13.8-35.1-22.4-57.2-22.4C38.2,170.7,0,208.9,0,256s38.2,85.3,85.3,85.3c22.1,0,42-8.6,57.2-22.4l199,105.4
                        c0,0.8-0.2,1.6-0.2,2.4c0,47.1,38.2,85.3,85.3,85.3s85.3-38.2,85.3-85.3S473.8,341.3,426.7,341.3z"/>
                  </svg>
               
            </div>
            <div class="post__share_list">
               <div class="post__share_list_title">
                  <p>Поделиться</p>
               </div>
               <div class="post__share_list_social_icons">
                  
                  <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>"
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="telegram link">
                     <svg class="post__share_list_social_icons__telegram_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20">
                        <path d="m488.649875 44.6098697c6.442438-2.8224615 10.738405-4.6832009 12.887902-5.5822181 6.137252-2.5668769 7.41252-3.0127709 8.243723-3.0276516.182815-.0030813.591576.0424775.856354.2585203.223574.1824224.285088.428849.314524.6018054.029436.1729565.066092.5669556.036954.874815-.33258 3.5138587-1.771648 12.041067-2.503764 15.9766489-.309785 1.6652923-.919763 2.2236562-1.510292 2.2782995-1.283356.1187526-2.257879-.8528431-3.500872-1.6721675-1.945039-1.2820809-3.043862-2.0801802-4.931859-3.3312543-2.181908-1.4458326-.767468-2.2404874.475995-3.5391756.32542-.3398729 5.979917-5.5116482 6.08936-5.9808093.013687-.0586764.02639-.2773944-.102829-.3928855-.129218-.1154911-.319934-.0759976-.457559-.0445881-.195081.044522-3.302306 2.1096922-9.321675 6.1955107-.881976.6089971-1.680842.9057209-2.396598.8901714-.789064-.017142-2.306907-.4486274-3.435267-.8174505-1.38398-.4523766-2.48394-.6915513-2.388158-1.4598267.049889-.4001653.59791-.8094133 1.644061-1.227744z" fill-rule="evenodd" transform="translate(-487 -36)"></path>
                     </svg>
                  </a>
                  <a href="http://vk.com/share.php?url=<?php the_permalink(); ?>" title=""
                     onclick="window.open(this.href, this.title, ); return false" target="_parent" aria-label="VK link">
                     <svg class="post__share_list_social_icons__vk_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="3.3 3 13 13" version="1.1">
                        <path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 10.640625 14.410156 C 6.082031 14.410156 3.484375 11.285156 3.375 6.082031 L 5.660156 6.082031 C 5.734375 9.898438 7.417969 11.515625 8.75 11.851562 L 8.75 6.082031 L 10.898438 6.082031 L 10.898438 9.375 C 12.214844 9.234375 13.601562 7.734375 14.066406 6.082031 L 16.214844 6.082031 C 15.859375 8.117188 14.359375 9.617188 13.292969 10.234375 C 14.359375 10.734375 16.066406 12.042969 16.714844 14.410156 L 14.351562 14.410156 C 13.839844 12.824219 12.574219 11.601562 10.898438 11.433594 L 10.898438 14.410156 Z M 10.640625 14.410156 "/>
                     </svg>
                  </a>
                  <a href="http://twitter.com/share?&url=<?php the_permalink(); ?>"
                     onclick="window.open(this.href, this.title, ); return false" target="_parent">
                     <svg class="post__share_list_social_icons__x_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" version="1.1" aria-label="X link">
                        <path style=" stroke:none;fill-rule:nonzero; fill-opacity:1;" d="M 11.90625 8.476562 L 19.351562 0 L 17.585938 0 L 11.117188 7.359375 L 5.957031 0 L 0 0 L 7.808594 11.128906 L 0 20.015625 L 1.765625 20.015625 L 8.589844 12.242188 L 14.042969 20.015625 L 20 20.015625 M 2.402344 1.300781 L 5.109375 1.300781 L 17.585938 18.777344 L 14.875 18.777344 "/>
                     </svg>
                  </a>
                  <div class="post__share_link_copy_notification_wrap">
                     <div class="post__share_link_copy_notification_window">
                        <p>Copy</p>
                     </div>
                     <div class="post__share_link" data-href="<?php the_permalink(); ?>">
                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M10.975 14.51a1.05 1.05 0 0 0 0-1.485 2.95 2.95 0 0 1 0-4.172l3.536-3.535a2.95 2.95 0 1 1 4.172 4.172l-1.093 1.092a1.05 1.05 0 0 0 1.485 1.485l1.093-1.092a5.05 5.05 0 0 0-7.142-7.142L9.49 7.368a5.05 5.05 0 0 0 0 7.142c.41.41 1.075.41 1.485 0zm2.05-5.02a1.05 1.05 0 0 0 0 1.485 2.95 2.95 0 0 1 0 4.172l-3.5 3.5a2.95 2.95 0 1 1-4.171-4.172l1.025-1.025a1.05 1.05 0 0 0-1.485-1.485L3.87 12.99a5.05 5.05 0 0 0 7.142 7.142l3.5-3.5a5.05 5.05 0 0 0 0-7.142 1.05 1.05 0 0 0-1.485 0z"/>
                        </svg>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>