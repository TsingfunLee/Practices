<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">最新文章</h5>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <?php
            $recent_posts = wp_get_recent_posts();
            foreach( $recent_posts as $recent ):
            $href=get_permalink($recent['ID']). '"title="Look'.esc_attr($recent["post_title"]);
            ?>
                <li class="list-group-item">
                    <span class="badge"><?php echo test_get_post_views($recent['ID']); ?></span>
                    <a href="<?php echo $href ?>"><?php echo $recent['post_title']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>