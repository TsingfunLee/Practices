<ul class="alert list-group myright">
            <a class="list-group-item active my-article-color">
                        <i class="icon icon-comments"></i> 最新评论
                        <span id="arghide"><i class="icon-angle-down icon-large myhiden" ></i></span>
                        <button class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
            </a>
           
        <?php
        $comments= get_comments();
        foreach ($comments as $com):
        ?>
        <div id="argcon">
            <li class="list-group-item argue-all">
                <span class="argue-icon"><?php echo get_avatar($com->comment_author_email,32); ?></span>
                <div class="argue-con">
				<a href="<?php test_get_comment_link($com); ?>">
				<?php echo $com->comment_content; ?>
				</a>
				</div>
            </li>
            <?php endforeach; ?>
        
    </div>
</ul>