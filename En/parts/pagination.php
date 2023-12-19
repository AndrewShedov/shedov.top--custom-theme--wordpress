
<?php
function pagination () {
   
        $total_pages = $the_query->max_num_pages;

        if ($total_pages > 1){
    
            $current_page = max(1, get_query_var('page'));
    
            echo paginate_links(array(
                'base' => @add_query_arg('page','%#%'),
                'format' => '?page=%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => __('back'),
                'next_text'    => __('next'),
            ));
        }
       



}

pagination ()

?> 