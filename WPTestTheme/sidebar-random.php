<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="fa fa-refresh"></i>随机文章</h5>
        <i class="fa fa-chevron-circle-up"></i>
        <i class="fa fa-times-circle"></i>
    </div>
    <div class="panel-body">
        <?php
        $random=get_posts(array('numberposts' => 8, 'orderby' =>'rand','post_status' => 'publish'));
        foreach ($random as $post):
        ?>
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><?php echo test_get_post_views($post->ID); ?></span>
                <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>
</div>