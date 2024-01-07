<div id="post-<?php the_ID(); ?>" class="search_results_cell_wrap">
            <a href="<?php the_permalink() ?>">
               <div class="search_results_cell">
                  <div class="search_results_cell_title_text_image_wrap">
                     <div class="search_results_cell_title_text_wrap">
                        <div class="search_results_cell_title">
                           <h3>
                              <?php trim_title_chars(80, "&nbsp;…"); ?>
                           </h3>
                        </div>
                        <div class="search_results_cell_text_desktop">
                           <p>
                              <?php echo excerpt(25); ?>
                           </p>
                        </div>   
                        <div class="search_results_cell_text_mobile">
                           <p>
                              <?php echo excerpt(20); ?>
                           </p>
                        </div>
                     </div> 
                     <div class="search_results_cell_image">
                        <?php
                           no_image()
                           ?>
                     </div>
                  </div>
               </div>
            </a>
         </div>