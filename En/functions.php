<?php
add_theme_support("title-tag");
add_theme_support("post-thumbnails");
add_image_size("bigfeatured", 888, 578, true);
add_image_size("smallsidebar", 88, 69, true);
add_action("wp_enqueue_scripts", "Add_js_and_css");

function Add_js_and_css()
{
    wp_enqueue_style(
        "main",
        get_stylesheet_directory_uri() . "/css/style.css",
        [],
        time()
    );

    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }
}
// Gutenberg styles 1
add_action("after_setup_theme", "add_gutenberg_css");
function add_gutenberg_css()
{
    add_theme_support("editor-styles");
    add_editor_style("css/style-gutenberg.css");
}
// Gutenberg styles 2
register_nav_menus([
    "head_menu" => "Menu in header",
]);

class Cust_Nav extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && "discard" === $args->item_spacing) {
            $t = "";
            $n = "";
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        // Default class.
        $classes = ["dropdown_menu"];
        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode(
            " ",
            apply_filters("nav_menu_submenu_css_class", $classes, $args, $depth)
        );
        $class_names = $class_names
            ? ' class="' . esc_attr($class_names) . '"'
            : "";
        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }
    /**
     * Starts the element output.
     *
     * @since 3.0.0
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     *
     * @see Walker::start_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && "discard" === $args->item_spacing) {
            $t = "";
            $n = "";
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = $depth ? str_repeat($t, $depth) : "";

        $classes = empty($item->classes) ? [] : (array) $item->classes;

        if (in_array("menu-item-has-children", $classes)) {
            $classes[] = "dropdown";
        }

        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters("nav_menu_item_args", $args, $item, $depth);
        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */

        $class_names = implode(
            " ",
            apply_filters(
                "nav_menu_css_class",
                array_filter($classes),
                $item,
                $args,
                $depth
            )
        );
        $class_names = $class_names
            ? ' class="' . esc_attr($class_names) . '"'
            : "";
        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters(
            "nav_menu_item_id",
            "menu-item-" . $item->ID,
            $item,
            $args,
            $depth
        );
        $id = $id ? ' id="' . esc_attr($id) . '"' : "";
        $output .= $indent . "<li" . $id . $class_names . ">";
        $atts = [];
        $atts["title"] = !empty($item->attr_title) ? $item->attr_title : "";
        $atts["target"] = !empty($item->target) ? $item->target : "";
        if ("_blank" === $item->target && empty($item->xfn)) {
            $atts["rel"] = "noopener";
        } else {
            $atts["rel"] = $item->xfn;
        }
        $atts["href"] = !empty($item->url) ? $item->url : "";
        $atts["aria-current"] = $item->current ? "page" : "";
        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title        Title attribute.
         *     @type string $target       Target attribute.
         *     @type string $rel          The rel attribute.
         *     @type string $href         The href attribute.
         *     @type string $aria-current The aria-current attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters(
            "nav_menu_link_attributes",
            $atts,
            $item,
            $args,
            $depth
        );
        $attributes = "";
        foreach ($atts as $attr => $value) {
            if (is_scalar($value) && "" !== $value && false !== $value) {
                $value = "href" === $attr ? esc_url($value) : esc_attr($value);
                $attributes .= " " . $attr . '="' . $value . '"';
            }
        }
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters("the_title", $item->title, $item->ID);
        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters(
            "nav_menu_item_title",
            $title,
            $item,
            $args,
            $depth
        );
        //$item_output  = $args->before;
        $item_output .= "<a" . $attributes . ">";
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= "</a>";
        $item_output .= $args->after;
        //example
        //$item_output .= $args->before;
        //example
        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters(
            "walker_nav_menu_start_el",
            $item_output,
            $item,
            $depth,
            $args
        );
    }
}
class Cust_Nav_mobile extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && "discard" === $args->item_spacing) {
            $t = "";
            $n = "";
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        // Default class.
        $classes = ["dropdown_menu_mobile"];
        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode(
            " ",
            apply_filters("nav_menu_submenu_css_class", $classes, $args, $depth)
        );
        $class_names = $class_names
            ? ' class="' . esc_attr($class_names) . '"'
            : "";
        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }
    /**
     * Starts the element output.
     *
     * @since 3.0.0
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     *
     * @see Walker::start_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && "discard" === $args->item_spacing) {
            $t = "";
            $n = "";
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = $depth ? str_repeat($t, $depth) : "";
        $classes = empty($item->classes) ? [] : (array) $item->classes;

        if (in_array("menu-item-has-children", $classes)) {
            $classes[] = "dropdown_mobile";
        }
        //add arrow
        $has_children = array_search("menu-item-has-children", $classes);
        if ($has_children != false):
            $item_output .=
                '<div class="toggle-button"  ><svg class="menu_arrow" viewBox="-96 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"/></svg>';
        endif;
        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters("nav_menu_item_args", $args, $item, $depth);
        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode(
            " ",
            apply_filters(
                "nav_menu_css_class",
                array_filter($classes),
                $item,
                $args,
                $depth
            )
        );
        $class_names = $class_names
            ? ' class="' . esc_attr($class_names) . '"'
            : "";
        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters(
            "nav_menu_item_id",
            "menu-item-" . $item->ID,
            $item,
            $args,
            $depth
        );
        $id = $id ? ' id="' . esc_attr($id) . '"' : "";
        $output .= $indent . "<li" . $id . $class_names . ">";
        $atts = [];
        $atts["title"] = !empty($item->attr_title) ? $item->attr_title : "";
        $atts["target"] = !empty($item->target) ? $item->target : "";
        if ("_blank" === $item->target && empty($item->xfn)) {
            $atts["rel"] = "noopener";
        } else {
            $atts["rel"] = $item->xfn;
        }
        $atts["href"] = !empty($item->url) ? $item->url : "";
        $atts["aria-current"] = $item->current ? "page" : "";
        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title        Title attribute.
         *     @type string $target       Target attribute.
         *     @type string $rel          The rel attribute.
         *     @type string $href         The href attribute.
         *     @type string $aria-current The aria-current attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters(
            "nav_menu_link_attributes",
            $atts,
            $item,
            $args,
            $depth
        );
        $attributes = "";
        foreach ($atts as $attr => $value) {
            if (is_scalar($value) && "" !== $value && false !== $value) {
                $value = "href" === $attr ? esc_url($value) : esc_attr($value);
                $attributes .= " " . $attr . '="' . $value . '"';
            }
        }
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters("the_title", $item->title, $item->ID);
        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters(
            "nav_menu_item_title",
            $title,
            $item,
            $args,
            $depth
        );
        //$item_output  = $args->before;

        $item_output .= "<a" . $attributes . ">";
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= "</a>";

        $item_output .= $args->after;
        //example
        //$item_output .= $args->before;
        //example
        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters(
            "walker_nav_menu_start_el",
            $item_output,
            $item,
            $depth,
            $args
        );
    }
}

function true_add_contacts($contactmethods)
{
    $contactmethods["instagram"] = "ins";
    $contactmethods["facebook"] = "fs";
    $contactmethods["twitter"] = "tw";
    $contactmethods["pinterest"] = "pn";
    return $contactmethods;
}
add_filter("user_contactmethods", "true_add_contacts", 10, 1);

// change the text read more
function excerpt($limit)
{
    $excerpt = explode(" ", get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . "...";
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace("`\[[^\]]*\]`", "", $excerpt);
    return $excerpt;
}

// Custom script in footer header
// add_action('wp_enqueue_scripts', 'tutsplus_enqueue_custom_js');
// function tutsplus_enqueue_custom_js() {
//     wp_enqueue_script('custom', get_stylesheet_directory_uri().'/js/custom.js');
// }

/* Custom script in footer */
add_action("wp_enqueue_scripts", "tutsplus_enqueue_custom_js");
function tutsplus_enqueue_custom_js()
{
    wp_enqueue_script(
        "custom",
        get_stylesheet_directory_uri() . "/js/custom.js",
        [],
        false,
        true
    );
}

// Remove jquery jQuery Migrate
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
function remove_jquery_migrate( $scripts ) {
	if ( empty( $scripts->registered['jquery'] ) || is_admin() ) {
		return;
	}
   $deps = & $scripts->registered['jquery']->deps;
   $deps = array_diff( $deps, [ 'jquery-migrate' ] );
}
// /Remove jquery jQuery Migrate

function be_arrows_in_menus($item_output, $item, $depth, $args)
{
    if (in_array("desktop_menu_arrows", $item->classes)) {
        $arrow =
            0 == $depth
                ? '<svg class="menu_arrow" viewBox="-96 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"/></svg>'
                : '<svg class="menu_arrow_2" viewBox="-96 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"/></svg>';
        $item_output = str_replace("</a>", $arrow . "</a>", $item_output);
    }
    return $item_output;
}
add_filter("walker_nav_menu_start_el", "be_arrows_in_menus", 10, 4);
add_filter("wp_nav_menu_objects", "change_nav_menu_items_desktop", 10, 2);
function change_nav_menu_items_desktop($items, $args)
{
    $parents = wp_list_pluck($items, "menu_item_parent");
    if ("head_menu" == $args->theme_location) {
        foreach ($items as $item) {
            if (in_array($item->ID, $parents)) {
                $item->classes[] = "desktop_menu_arrows";
                $item->classes["desktop_menu_arrows"] = "";
            }
        }
    }
    return $items;
}

/*Mobile Menu */
function MobileMenu()
{
    $locations = [
        "MobileMenu" => __("Mobile menu", "MobileMenu"),
    ];
    register_nav_menus($locations);
}
add_action("init", "MobileMenu");

require get_template_directory() . "/parts/MobileMenu/mobile_menu.php";

add_action("wp_enqueue_scripts", "MobileMenuJs");
function MobileMenuJs()
{
    wp_enqueue_script(
        "MobileMenuJs",
        get_stylesheet_directory_uri() . "/parts/MobileMenu/mobile_menu.js",
        [],
        false,
        true
    );
}
/* /Mobile Menu */

 
// PICTURE IF THERE IS NO IMAGE 1
function no_image()
{
    if (has_post_thumbnail()):
        the_post_thumbnail();
    else:
        print '<img class="wp-post-image" src="' .
            get_bloginfo("template_directory") .
            "/images/post_no_image.webp" .
            '" alt="no image" />';
    endif;
}
// PICTURE IF THERE IS NO IMAGE 2
//... ellipses at the end TITLE 1
function trim_title_chars($count, $after)
{
    $title = get_the_title();
    if (mb_strlen($title) > $count) {
        $title = mb_substr($title, 0, $count);
    } else {
        $after = "";
    }
    echo $title . $after; 
}
//... ellipses at the end TITLE 2

 
// Counting the number of page visits
add_action("wp_head", "kama_postviews");
/**
 * @param array $args
 *
 * @return null
 */
function kama_postviews($args = [])
{
    global $user_ID, $post, $wpdb;
    if (!$post || !is_singular()) {
        return;
    }
    $rg = (object) wp_parse_args($args, [
        // Key of the post meta field where the number of views will be recorded.
        "meta_key" => "views",
        // Whose visits are counted? 0 - Everyone. 1 - Guests only. 2 - Only registered users.
        "who_count" => 1,
        // Exclude bots, robots? 0 - no, let them count too. 1 - yes, exclude from counting.
        "exclude_bots" => 1,
    ]);
    $do_count = false;
    switch ($rg->who_count) {
        case 0:
            $do_count = true;
            break;
        case 1:
            if (!$user_ID) {
                $do_count = true;
            }
            break;
        case 2:
            if ($user_ID) {
                $do_count = true;
            }
            break;
    }
    if ($do_count && $rg->exclude_bots) {
        $notbot = "Mozilla|Opera"; // Chrome|Safari|Firefox|Netscape - everyone is equal Mozilla
        $bot = "Bot/|robot|Slurp/|yahoo";
        if (
            !preg_match("/$notbot/i", $_SERVER["HTTP_USER_AGENT"]) ||
            preg_match("~$bot~i", $_SERVER["HTTP_USER_AGENT"])
        ) {
            $do_count = false;
        }
    }
    if ($do_count) {
        $up = $wpdb->query(
            $wpdb->prepare(
                "UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s",
                $post->ID,
                $rg->meta_key
            )
        );
        if (!$up) {
            add_post_meta($post->ID, $rg->meta_key, 1, true);
        }
        wp_cache_delete($post->ID, "post_meta");
    }
}
// /Counting the number of page visits

// sorting posts by number of views - left sidebar

function sorting_posts_by_number_views_left_sidebar($args = "")
{
    global $wpdb, $post;
    parse_str($args, $i);
    $num = isset($i["num"]) ? preg_replace("/[^0-9,\s]/", "", $i["num"]) : 10; // 20,10 | 10
    $key = isset($i["key"]) ? sanitize_text_field($i["key"]) : "views";
    $order =
        isset($i["order"]) && strtoupper($i["order"]) === "ASC"
            ? "ASC"
            : "DESC";
    $days = isset($i["days"]) ? (int) $i["days"] : 0;
    $format = isset($i["format"]) ? stripslashes($i["format"]) : "";
    $cache = isset($i["cache"]);
    $echo = isset($i["echo"]) ? (int) $i["echo"] : 1;
    $return = isset($i["return"]) ? $i["return"] : "string";
    if ($cache) {
        $cache_key = md5(__FUNCTION__ . serialize($args));
        // receive and give cache if there is one
        if ($cache_out = wp_cache_get($cache_key)) {
            if ($echo) {
                return print $cache_out;
            }
            return $cache_out;
        }
    }
    $AND_days = $days ? "AND post_date > CURDATE() - INTERVAL $days DAY" : "";
    if (4 === strlen($days)) {
        $AND_days = "AND YEAR(post_date)=$days";
    }
    $esc_key = esc_sql($key);
    $sql = "SELECT *, (pm.meta_value+0) AS views
	FROM $wpdb->posts p
		LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID)
	WHERE pm.meta_key = '$esc_key' $AND_days
		AND p.post_type = 'post'
		AND p.post_status = 'publish'
	ORDER BY views $order LIMIT $num";
    $posts = $wpdb->get_results($sql);
    if (!$posts) {
        return false;
    }
    if ("array" === $return) {
        return $posts;
    }
    $out = $x = "";
    preg_match("!{date:(.*?)}!", $format, $date_m);
    foreach ($posts as $pst) {
        $x = "popular_post_left_sidebar";
        $LinkArticle = get_permalink($pst->ID);
        $image = get_the_post_thumbnail($pst->ID);
        // Title length
        $maxchar = 48;
        $Title =
            iconv_strlen($pst->post_title, "utf-8") > $maxchar
                ? iconv_substr($pst->post_title, 0, $maxchar, "utf-8") . "..."
                : $pst->post_title;
        $a1 =
            '<a href="' .
            get_permalink($pst->ID) .
            "\" title=\"{$pst->views} просмотров: $Title\">";
        $a2 = "</a>";
        $comments = $pst->comment_count;
        $views = $pst->views;
        if ($format) {
            $date = apply_filters(
                "the_time",
                mysql2date($date_m[1], $pst->post_date)
            );
            $Sformat = str_replace($date_m[0], $date, $format);
            $Sformat = str_replace(
                ["{a}", "{title}", "{/a}", "{comments}", "{views}"],
                [$a1, $Title, $a2, $comments, $views],
                $Sformat
            );
        } else {
            $Sformat = $a1 . $Title . $a2;
        }
        //no pictures
        //$out .= "<li class=\"$x\">$Sformat</li>";
        //with pictures
        //$out .= "\n<div class='$x'>". $image ."$Sformat</div>";
        $out .=
            "<article class='popular_post_left_sidebar'>
						<a aria-label='popular post' class='popular_post_left_sidebar_all_link' href=" .
            $LinkArticle .
            "></a>
						<div class='popular_post_left_sidebar_image'>" .
            $image .
            "</div><div class='popular_post_left_sidebar_title'>
		<h3>" .
            $Title .
            "</h3></div></article>";
        //$out .= "<div class="'popular_post_image'">". $image ."</div>";
    }
    if ($cache) {
        wp_cache_add($cache_key, $out);
    }
    if ($echo) {
        echo $out;
    }
    return $out;
}

// /sorting posts by number of views - left sidebar

// sorting posts by number of views - bottom

function sorting_posts_by_number_views_bottom($args = "")
{
    global $wpdb, $post;
    parse_str($args, $i);
    $num = isset($i["num"]) ? preg_replace("/[^0-9,\s]/", "", $i["num"]) : 10; // 20,10 | 10
    $key = isset($i["key"]) ? sanitize_text_field($i["key"]) : "views";
    $order =
        isset($i["order"]) && strtoupper($i["order"]) === "ASC"
            ? "ASC"
            : "DESC";
    $days = isset($i["days"]) ? (int) $i["days"] : 0;
    $format = isset($i["format"]) ? stripslashes($i["format"]) : "";
    $cache = isset($i["cache"]);
    $echo = isset($i["echo"]) ? (int) $i["echo"] : 1;
    $return = isset($i["return"]) ? $i["return"] : "string";
    if ($cache) {
        $cache_key = md5(__FUNCTION__ . serialize($args));
        // receive and give cache if there is one
        if ($cache_out = wp_cache_get($cache_key)) {
            if ($echo) {
                return print $cache_out;
            }
            return $cache_out;
        }
    }
    $AND_days = $days ? "AND post_date > CURDATE() - INTERVAL $days DAY" : "";
    if (4 === strlen($days)) {
        $AND_days = "AND YEAR(post_date)=$days";
    }
    $esc_key = esc_sql($key);
    $sql = "SELECT *, (pm.meta_value+0) AS views
	FROM $wpdb->posts p
		LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID)
	WHERE pm.meta_key = '$esc_key' $AND_days
		AND p.post_type = 'post'
		AND p.post_status = 'publish'
	ORDER BY views $order LIMIT $num";
    $posts = $wpdb->get_results($sql);
    if (!$posts) {
        return false;
    }
    if ("array" === $return) {
        return $posts;
    }
    $out = $x = "";
    preg_match("!{date:(.*?)}!", $format, $date_m);
    foreach ($posts as $pst) {
        $x = "popular_post";
        $LinkArticle = get_permalink($pst->ID);
        $image = get_the_post_thumbnail($pst->ID);
        // Header length
        $maxchar = 37;
        $Title =
            iconv_strlen($pst->post_title, "utf-8") > $maxchar
                ? iconv_substr($pst->post_title, 0, $maxchar, "utf-8") . "..."
                : $pst->post_title;
        $a1 =
            '<a href="' .
            get_permalink($pst->ID) .
            "\" title=\"{$pst->views} просмотров: $Title\">";
        $a2 = "</a>";
        $comments = $pst->comment_count;
        $views = $pst->views;
        if ($format) {
            $date = apply_filters(
                "the_time",
                mysql2date($date_m[1], $pst->post_date)
            );
            $Sformat = str_replace($date_m[0], $date, $format);
            $Sformat = str_replace(
                ["{a}", "{title}", "{/a}", "{comments}", "{views}"],
                [$a1, $Title, $a2, $comments, $views],
                $Sformat
            );
        } else {
            $Sformat = $a1 . $Title . $a2;
        }
        //no pictures
        //$out .= "<li class=\"$x\">$Sformat</li>";
        //with pictures
        //$out .= "\n<div class='$x'>". $image ."$Sformat</div>";
        $out .=
            "<article class='popular_post'><a href=" .
            $LinkArticle .
            "><div class='popular_post_image'>" .
            $image .
            "</div><div class='popular_post_title'>
		<h3>" .
            $Title .
            "</h3></div></a></article>";
        //$out .= "<div class="'popular_post_image'">". $image ."</div>";
    }
    if ($cache) {
        wp_cache_add($cache_key, $out);
    }
    if ($echo) {
        echo $out;
    }
    return $out;
}

// /sorting posts by number of views - bottom

// PRISM 1
function add_prism()
{
    if (is_single()) {
        // Register prism.css file
        wp_register_style(
            "prismCSS", // handle name for the style
            get_stylesheet_directory_uri() . "/prism/prism.css" // location of the prism.css file
        );

        // Register prism.js file
        wp_register_script(
            "prismJS", // handle name for the script
            get_stylesheet_directory_uri() . "/prism/prism.js" // location of the prism.js file
        );

        // Enqueue the registered style and script files
        wp_enqueue_style("prismCSS");
        wp_enqueue_script("prismJS");
    }
}
add_action("wp_enqueue_scripts", "add_prism");
// PRISM 2
/* Snippet seeks to remove the remaining warnings when validating HTML on w3c.org:
   Warning: The type attribute is unnecessary for JavaScript resources.
   Warning: The type attribute for the style element is not needed and should be omitted.
*/

add_action("template_redirect", function () {
    ob_start(function ($buffer) {
        $buffer = str_replace(
            [' type="text/css"', " type='text/css'"],
            "",
            $buffer
        );
        $buffer = str_replace(
            [' type="text/javascript"', " type='text/javascript'"],
            "",
            $buffer
        );
        return $buffer;
    });
});

// adaptation to different screens admin bar
// delete html { margin-top: 32px !important; }
add_theme_support("admin-bar", ["callback" => "__return_false"]);
// /adaptation to different screens admin bar

// ban on adding <p> tags in posts
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
// /ban on adding <p> tags in posts

// fix wp v6.7 - 'https://wordpress.org/support/topic/weird-style-code-in-my-website/ --- https://core.trac.wordpress.org/ticket/62413' Error validator.w3.org: CSS: contain-intrinsic-size: Property contain-intrinsic-size doesn't exist.
add_filter('wp_img_tag_add_auto_sizes', '__return_false');
// /fix wp v6.7 - 'https://wordpress.org/support/topic/weird-style-code-in-my-website/ --- https://core.trac.wordpress.org/ticket/62413' Error validator.w3.org: CSS: contain-intrinsic-size: Property contain-intrinsic-size doesn't exist.

// disable embeds
function disable_embeds_code_init() {

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
   
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
   
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
   
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
   
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
   
    // Remove all embeds rewrite rules.
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
   
    // Remove filter of the oEmbed result before any HTTP requests are made.
    remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
   }
   
   add_action( 'init', 'disable_embeds_code_init', 9999 );
   
   function disable_embeds_tiny_mce_plugin($plugins) {
       return array_diff($plugins, array('wpembed'));
   }
   
   function disable_embeds_rewrites($rules) {
       foreach($rules as $rule => $rewrite) {
           if(false !== strpos($rewrite, 'embed=true')) {
               unset($rules[$rule]);
           }
       }
       return $rules;
   }
   
   // /disable embeds

 

// disable speculative loading
add_filter( 'wp_speculation_rules_configuration', '__return_null' );
// /disable speculative loading

// hide main title
function hide_main_title($classes) {
    // add main title id
    if (is_page(array(10, 18, 22, 8, 25))) {
      $classes[] = 'hide-main-title';
    }
    return $classes;
  }
  add_filter('body_class', 'hide_main_title');
// /hide main title

// disable - wptexturize
add_filter( 'run_wptexturize', '__return_false' );
// /disable - wptexturize

// remove trailing slash
function remove_trailing_slashes_from_void_elements($buffer) {
    $search = [
        '/<meta([^>]*?)\s*\/>/i',
        '/<link([^>]*?)\s*\/>/i',
        '/<input([^>]*?)\s*\/>/i',
        '/<img([^>]*?)\s*\/>/i',
        '/<br([^>]*?)\s*\/>/i',
        '/<hr([^>]*?)\s*\/>/i',
    ];
    $replace = [
        '<meta$1>',
        '<link$1>',
        '<input$1>',
        '<img$1>',
        '<br$1>',
        '<hr$1>',
    ];

    return preg_replace($search, $replace, $buffer);
}

function start_buffer_cleaning() {
    ob_start('remove_trailing_slashes_from_void_elements');
}
add_action('get_header', 'start_buffer_cleaning');
// /remove trailing slash

// formats a large number into a short, human-readable form.
/**
 * Examples:
 * - 1200 => "1.2K"
 * - 2500000 => "2.5M"
 * - 7200000000 => "7.2B"
 *
 * @param int|float $number The number to format.
 * @return string The formatted short version of the number.
 */
function format_number_short($number) {
  if ($number >= 1_000_000_000) {
    return round($number / 1_000_000_000, 1) . 'B';
  } elseif ($number >= 1_000_000) {
    return round($number / 1_000_000, 1) . 'M';
  } elseif ($number >= 1_000) {
    return round($number / 1_000, 1) . 'K';
  } else {
    return $number;
  }
}
// /formats a large number into a short, human-readable form.