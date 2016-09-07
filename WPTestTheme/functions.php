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
    global $wpdb;
    //链接数据库
    //$conn=mysqli_connect("localhost","wordpress","123456");
    //if(!$conn){
    //die("链接失败".mysqli_errno());
    //}
    //选择数据库
    //mysqli_select_db($conn,"wordpress") or die(mysqli_errno());
    //从数据库中获取访问数
    $sql = "select * from db_stats";
    $views = $wpdb->get_var($sql);
    $views++;
    //$row=mysqli_fetch_row($res);
    //$row[0]++;
    //将访客数添加到数据库中
    $sql = "insert into db_stats ";
    $wpdb->query($sql);
    //mysqli_query($conn,$sql);
    echo "$views";
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
function test_excerpt( $length=300, $more = '&hellip;', $echo = true ){
    static $excerpt_length, $excerpt_more;

    $current_filter = current_filter();
    if( $current_filter == 'excerpt_length' ) return $excerpt_length;
    if( $current_filter == 'excerpt_more'   ) return $excerpt_more;

    $excerpt_length = $length;
    $excerpt_more   = $more;

    $callable = __FUNCTION__;
    add_filter( 'excerpt_length', $callable, 18 );
    add_filter( 'excerpt_more',   $callable, 18 );

    $excerpt = $echo ? the_excerpt() : get_the_excerpt();

    remove_filter( 'excerpt_length', $callable, 18 );
    remove_filter( 'excerpt_more',   $callable, 18 );

    unset( $excerpt_length, $excerpt_more );
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
function test_get_recommend_posts(){
    $tags = get_the_tags(); 
    $tag = $tags[0]->name;
    $args=array(
      'tag' => $tag,
      'showposts'=>3,
	  'caller_get_posts'=>1
   );

   $my_query = new WP_Query($args);
    return $my_query;
}

/*
 * Load More
 */
function skt_girlie_pagination() {
    /*Set this function for pagination links*/
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}

/**
 * Comment Emotion
 */
function test_smilies() {
    global $wpsmiliestrans;
    $wpsmiliestrans = array(
        ':neutral:' => "\xf0\x9f\x98\x90",
        ':twisted:' => "\xf0\x9f\x98\x88",
        ':arrow:' => "\xe2\x9e\xa1",
        ':shock:' => "\xf0\x9f\x98\xaf",
        ':smile:' => "\xf0\x9f\x99\x82",
        ':???:' => "\xf0\x9f\x98\x95",
        ':cool:' => "\xf0\x9f\x98\x8e",
        ':evil:' => "\xf0\x9f\x91\xbf",
        ':grin:' => "\xf0\x9f\x98\x80",
        ':idea:' => "\xf0\x9f\x92\xa1",
        ':oops:' => "\xf0\x9f\x98\xb3",
        ':razz:' => "\xf0\x9f\x98\x9b",
        ':roll:' => "\xf0\x9f\x99\x84",
        ':wink:' => "\xf0\x9f\x98\x89",
        ':cry:' => "\xf0\x9f\x98\xa5",
        ':eek:' => "\xf0\x9f\x98\xae",
        ':lol:' => "\xf0\x9f\x98\x86",
        ':mad:' => "\xf0\x9f\x98\xa1",
        ':sad:' => "\xf0\x9f\x99\x81",
        '8-)' => "\xf0\x9f\x98\x8e",
        '8-O' => "\xf0\x9f\x98\xaf",
        ':-(' => "\xf0\x9f\x99\x81",
        ':-)' => "\xf0\x9f\x99\x82",
        ':-?' => "\xf0\x9f\x98\x95",
        ':-D' => "\xf0\x9f\x98\x80",
        ':-P' => "\xf0\x9f\x98\x9b",
        ':-o' => "\xf0\x9f\x98\xae",
        ':-x' => "\xf0\x9f\x98\xa1",
        ':-|' => "\xf0\x9f\x98\x90",
        ';-)' => "\xf0\x9f\x98\x89",
        // This one transformation breaks regular text with frequency.
        //     '8)' => "\xf0\x9f\x98\x8e",
        '8O' => "\xf0\x9f\x98\xaf",
        ':(' => "\xf0\x9f\x99\x81",
        ':)' => "\xf0\x9f\x99\x82",
        ':?' => "\xf0\x9f\x98\x95",
        ':D' => "\xf0\x9f\x98\x80",
        ':P' => "\xf0\x9f\x98\x9b",
        ':o' => "\xf0\x9f\x98\xae",
        ':x' => "\xf0\x9f\x98\xa1",
        ':|' => "\xf0\x9f\x98\x90",
        ';)' => "\xf0\x9f\x98\x89",
        ':!:' => "\xe2\x9d\x97",
        ':?:' => "\xe2\x9d\x93",
    );
    if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
    $smilies = array_unique($wpsmiliestrans);
    $link='';
    foreach ($smilies as $key => $smile) {
        //$file = get_bloginfo('wpurl').'/wp-includes/images/smilies/'.$smile;
        $value = " ".$key." ";
        //$img = "<img src=\"{$file}\" alt=\"{$smile}\" />";
        //$imglink = htmlspecialchars($img);
        $link .= "<a href=\"#commentform\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$smile}</a>&nbsp;";
    }

    return '<div>'.$link.'</div>';
}
?>

