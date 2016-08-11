<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="fa fa-fire"></i>最新评论</h5>
        <i class="fa fa-chevron-circle-up"></i>
        <i class="fa fa-times-circle"></i>
    </div>
    <div class="panel-body">
        <?php
        $comments= get_comments();
        foreach ($comments as $com):
        ?>
        <ul class="list-group">
            <li class="list-group-item">
                <span><?php echo get_avatar($com->comment_author_email,32); ?></span>
                <a href="<?php test_get_comment_link($com); ?>"><?php echo $com->comment_content; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>