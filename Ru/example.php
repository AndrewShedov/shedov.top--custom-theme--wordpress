<?php

$args = array();

$query = new WP_Query ( $args);


if ($query->have_posts()) : //если посты не найдены

  while ($query->have_posts()) : the_post(  ); //до тех пор пока посты есть, инициализирцем пост

  the_title(  ); //функция для использования в цикле, например выводим заголовки

endwhile;

else;
//постов нет
endif;

wp_reset_postdata( );




--------------------------------------
if (have_posts()) : //если посты не найдены

while (have_posts()) :; //до тех пор пока посты есть, инициализирцем пост

the_title(  ); //функция для использования в цикле, например выводим заголовки

endwhile;

else;
//постов нет
endif;