<?php
if (function_exists('register_sidebar'))
    register_sidebar();

/**
 * Stats Post Views
 */
function test_get_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function test_set_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**
 * Stats Site Views
 */
function test_site_views()
{
    //global $wpdb;
    //链接数据库
    //$conn=mysqli_connect("localhost","wordpress","123456");
    //if(!$conn){
    //die("链接失败".mysqli_errno());
    //}
    //选择数据库
    //mysqli_select_db($conn,"wordpress") or die(mysqli_errno());
    //从数据库中获取访问数
    //$sql = "select * from db_stats";
    //$views = $wpdb->get_var($sql);
    //$views++;
    //$row=mysqli_fetch_row($res);
    //$row[0]++;
    //将访客数添加到数据库中
    //$sql = "insert into db_stats ";
    //$wpdb->query($sql);
    //mysqli_query($conn,$sql);
    //echo "$views";
}

/**
 * Get Month And Day Of Date
 */
function test_get_date()
{
    $date = get_the_date('m-d', '', '', FALSE);
    $dateArray = explode('-', $date);
    if ($dateArray[0] < 10) {
        $dateArray[0] = substr($dateArray[0], 1);
    }
    return $dateArray;
}

/**
 * Get Part Of The Content
 */
function test_excerpt($length = 300, $more = '&hellip;', $echo = true)
{
    static $excerpt_length, $excerpt_more;

    $current_filter = current_filter();
    if ($current_filter == 'excerpt_length') return $excerpt_length;
    if ($current_filter == 'excerpt_more') return $excerpt_more;

    $excerpt_length = $length;
    $excerpt_more = $more;

    $callable = __FUNCTION__;
    add_filter('excerpt_length', $callable, 18);
    add_filter('excerpt_more', $callable, 18);

    $excerpt = $echo ? the_excerpt() : get_the_excerpt();

    remove_filter('excerpt_length', $callable, 18);
    remove_filter('excerpt_more', $callable, 18);

    unset($excerpt_length, $excerpt_more);
    return $excerpt;
}

/**
 * Get The Number Of Posts
 */
function test_get_posts_counts()
{
    $count_posts = wp_count_posts();
    echo $published_posts = $count_posts->publish;
}

/**
 * Get The Number Of Comments
 */
function test_get_comments_counts()
{
    $comment_args = array(
        'post_author' => 1, // use post_id, not post_ID
        'count' => true //return only the count
    );
    $comment_count = get_comments($comment_args);
    echo $comment_count;
}

/**
 * Get The Link Jump To The Comment
 */
function test_get_comment_link($com)
{
    $post_link = get_permalink($com->comment_post_ID);
    $com_link = "$post_link" . '#comment-' . "$com->comment_ID";
    echo $com_link;
}

/**
 * Recommend Posts By The Tags
 */
function test_get_recommend_posts()
{
    $tags = get_the_tags();
    $tag = $tags[0]->name;
    $args = array(
        'tag' => $tag,
        'showposts' => 3,
        'caller_get_posts' => 1
    );

    $my_query = new WP_Query($args);
    return $my_query;
}

/*
 * Load More
 */
function test_pagination()
{
    /*Set this function for pagination links*/
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array'
    ));
    if (is_array($page_format)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul class="page-devider">';
        echo '<li><span>' . $paged . ' of ' . $wp_query->max_num_pages . '</span></li>';
        foreach ($page_format as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}

/**
 * Convert Emotion Key to Chinese
 */
function test_key_to_chinese($text)
{
    $trans = array(
        ':neutral:' => '无感',
        ':twisted:' => '扭曲',
        ':arrow:' => '箭头',
        ':shock:' => '震惊',
        ':smile:' => '微笑',
        ':???:' => '疑惑',
        ':cool:' => '酷',
        ':evil:' => '恶魔',
        ':grin:' => '大笑',
        ':idea:' => '主意',
        ':oops:' => '脸红',
        ':razz:' => '讥笑',
        ':roll:' => '翻白眼',
        ':wink:' => '眨眼',
        ':cry:' => '哭',
        ':eek:' => '惊喜',
        ':lol:' => '奸',
        ':mad:' => '发疯',
        ':sad:' => '伤心',
        ':mrgreen:' => '绿脸',
    );

    foreach ($trans as $key => $chinese) {
        if ($text === $key) {
            return $chinese;
        }
    }

}

/**
 * Comment Emotion
 */
remove_action('init', 'smilies_init', 5);
add_action('init', 'test_smilies', 5);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
function test_smilies()
{
    global $wpsmiliestrans;
    $wpsmiliestrans = array(
        ':neutral:' => 'icon_neutral.gif',
        ':twisted:' => 'icon_twisted.gif',
        ':arrow:' => 'icon_arrow.gif',
        ':shock:' => 'icon_eek.gif',
        ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
        ':cool:' => 'icon_cool.gif',
        ':evil:' => 'icon_evil.gif',
        ':grin:' => 'icon_biggrin.gif',
        ':idea:' => 'icon_idea.gif',
        ':oops:' => 'icon_redface.gif',
        ':razz:' => 'icon_razz.gif',
        ':roll:' => 'icon_rolleyes.gif',
        ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
        ':mrgreen:' => 'icon_mrgreen.gif',
        '8-)' => 'icon_cool.gif',
        '8-O' => 'icon_eek.gif',
        ':-(' => 'icon_sad.gif',
        ':-)' => 'icon_smile.gif',
        ':-?' => 'icon_confused.gif',
        ':-D' => 'icon_biggrin.gif',
        ':-P' => 'icon_razz.gif',
        ':-o' => 'icon_surprised.gif',
        ':-x' => 'icon_mad.gif',
        ':-|' => 'icon_neutral.gif',
        ';-)' => 'icon_wink.gif',
        '8O' => 'icon_eek.gif',
        ':(' => 'icon_sad.gif',
        ':)' => 'icon_smile.gif',
        ':?' => 'icon_confused.gif',
        ':D' => 'icon_biggrin.gif',
        ':P' => 'icon_razz.gif',
        ':o' => 'icon_surprised.gif',
        ':x' => 'icon_mad.gif',
        ':|' => 'icon_neutral.gif',
        ';)' => 'icon_wink.gif',
        ':!:' => 'icon_exclaim.gif',
        ':?:' => 'icon_question.gif',
    );
    if (!get_option('use_smilies') or (empty($wpsmiliestrans))) return;
    $smilies = array_unique($wpsmiliestrans);
    $link = '';
    foreach ($smilies as $key => $smile) {
        $file = get_bloginfo('wpurl') . '/wp-includes/images/smilies/' . $smile;
        $value = " " . $key . " ";
        $img = "<img src=\"{$file}\" alt=\"{$key}\" />";
        //$imglink = htmlspecialchars($img);
        $chinese = test_key_to_chinese($key);
        $link .= "<a href=\"#commentform\" title=\"{$chinese}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$img}</a>&nbsp;";
    }

    return '<div>' . $link . '</div>';
}

/**
 * Comment List
 */
//function test_comment($comment, $args, $depth)
//{

//}

/**
 * Colorful Tag Cloud
 */
function test_colorCloud($text) {
    $text = preg_replace_callback('|<a (.+?)>|i', 'test_colorCloudCallback', $text);
    return $text;
}
function test_colorCloudCallback($matches) {
    $text = $matches[1];
    $color = dechex(rand(0,16777215));
    $pattern = '/style=(\'|\")(.*)(\'|\")/i';
    $text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
    return "<a $text>";
}
add_filter('wp_tag_cloud', 'test_colorCloud', 1);

?>

