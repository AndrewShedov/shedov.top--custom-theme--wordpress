<article id="post-<?php the_ID(); ?>" class="post_in_search_wrap">
   <a href="<?php the_permalink() ?>" rel="noreferrer noopener" target="_blank">
      <div class="post_in_search">
         <div class="post_in_search_title_text_image_wrap">
            <div class="post_in_search_title_text_wrap">
               <div class="post_in_search_title">
                  <h3>
                     <?php trim_title_chars(80, "&nbsp;…"); ?>
                  </h3>
               </div>
               <div class="post_in_search_text_desktop">
                  <p>
                     <?php echo excerpt(19); ?>
                  </p>
               </div>
               <div class="post_in_search_text_mobile">
                  <p>
                     <?php echo excerpt(20); ?>
                  </p>
               </div>
            </div>
            <div class="post_in_search_image">
               <?php
                  no_image()
                  ?>
            </div>
         </div>
      </div>
   </a>
</article>