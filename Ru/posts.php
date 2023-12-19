<div class="entry_cell_wrap">
          <div class="entry_cell"> <a href="<?php the_permalink() ?>">
              <div class="entry_cell_image_wrap"> <?php no_image() ?> </div>
              <div class="entry_cell_title_wrap">
                <h2> <?php trim_title_chars(110, "…"); ?> </h2>
              </div>
              <div class="entry_text_wrap">
                <div class="entry_text">
                  <p> <?php echo excerpt(17); ?> </p>
                </div>
              </div>
              </a>
               <?php
                if ( $categories = get_the_category()) : ?> <div class="categories_entry_thumbnail_wrap">
                <div class="categories_entry_thumbnail">
                  <div class="categories_entry_thumbnail_title"> </div>
                  <ul class="categories_entry_thumbnail_list"> <?php foreach($categories as $cat) : ?> 
                      <li>
                      <a
                      href="<?php echo get_category_link( $cat )?>"> 
                        <?php echo $cat ->name;?>
                        </a>
                       </li>
                   
                    <?php endforeach; ?> </ul> <?php endif; ?>
                </div>
              </div>
              <div class="views_date_share_wrap">
              <div class="views_wrap">
              <i class="eye fa fa-eye" aria-hidden="true"></i>
              <div class="views">
              <?php echo get_post_meta( $post->ID, 'views', true ); ?>
              </div>  
              </div>
              <div class="entry_cell_date_wrap">
                <p> <?php the_time('d.m.Y') ?> </p>
              </div>
              <div class="entry_cell_share_wrap">
              <div class="entry_cell_share">
           <div class="entry_cell_share_svg_wrap">
 <svg  height="16px" width="16px" version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<path d="M426.7,341.3c-29.1,0-54.8,14.7-70.2,36.9L167.4,278.1c1.9-7.1,3.3-14.4,3.3-22.1c0-7.7-1.3-15-3.3-22.1l189.1-100.1
	c15.4,22.3,41,36.9,70.2,36.9c47.1,0,85.3-38.2,85.3-85.3S473.8,0,426.7,0s-85.3,38.2-85.3,85.3c0,0.8,0.2,1.6,0.2,2.4l-199,105.4
	c-15.2-13.8-35.1-22.4-57.2-22.4C38.2,170.7,0,208.9,0,256s38.2,85.3,85.3,85.3c22.1,0,42-8.6,57.2-22.4l199,105.4
	c0,0.8-0.2,1.6-0.2,2.4c0,47.1,38.2,85.3,85.3,85.3s85.3-38.2,85.3-85.3S473.8,341.3,426.7,341.3z"/>
</svg>
</div>
 </div>
                <div class="entry_cell_share_list_wrap">
                  <div class="entry_cell_share_list">
                    <div class="entry_cell_share_list_header">
                      <p>Поделиться</p>
                    </div>
                   <div class="entry_cell_share_list_telegram_wrap"> <a
                        href="https://telegram.me/share/url?url=<?php the_permalink() ?>" title=""
                        onclick="window.open(this.href, this.title, ); return false" target="_parent">
                        <div class="entry_cell_share_list_telegram"> <i class="fab fa-telegram"></i>
                          <p>Telegram
                          <p>
                        </div>
                      </a> </div>
                      <div class="entry_cell_share_list_vk_wrap"> <a
                        href="http://vk.com/share.php?url=<?php the_permalink() ?>" title=""
                        onclick="window.open(this.href, this.title, ); return false" target="_parent">
                        <div class="entry_cell_share_list_vk"> <i class="fab fa-vk"></i>
                          <p>VK
                          <p>
                        </div>
                      </a> </div>
                    <div class="entry_cell_share_list_twitter_wrap"> <a
                        href="http://twitter.com/share?&url=<?php the_permalink() ?>" title=""
                        onclick="window.open(this.href, this.title, ); return false" target="_parent">
                        <div class="entry_cell_share_list_twitter"> <i class="fab fa-twitter"></i>
                          <p>Twitter
                          <p>
                        </div>
                      </a> </div>
                    <div class="entry_cell_share_list_link_wrap">
                      <div class="entry_cell_share_list_link">
                        <div class="entry_cell_share_link_wrap"
                        data-href="<?php the_permalink() ?>">
                          <div class="entry_cell_share_link"  > <i class="fas fa-clone"></i>
                            <p>Копировать</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div> 
        </div> 