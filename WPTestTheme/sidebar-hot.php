<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="fa fa-fire"></i>最热文章</h5>
        <i class="fa fa-chevron-circle-up"></i>
        <i class="fa fa-times-circle"></i>
    </div>
    <div class="panel-body">
        <?php
        $pop = $wpdb->get_results("SELECT post_title, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' AND post_password='' ORDER BY comment_count DESC LIMIT 8");
        foreach ($pop as $post):
        ?>
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><?php echo $post->comment_count; ?></span>
                <?php echo $post->post_title; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>