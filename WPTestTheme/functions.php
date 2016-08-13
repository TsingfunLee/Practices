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
function test_get_mydate()
{
    $date = the_date('m-d', '', '', FALSE);
    $dateArray = explode('-', $date);
    if ($dateArray[0] < 10) {
        $dateArray[0] = substr($dateArray[0], 1);
    }
    return $dateArray;
}

/**
 * Get Part Of The Content
 */
function test_get_content($id, $words = 300)
{
    $content = get_post($id)->post_content;
    $content = substr($content, 0, $words);
    return $content;
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
?>

