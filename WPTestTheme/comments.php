<div class="col-md-12">

    <div>
        <?php
        $count = get_comments_number();
        ?>
        <i class="fa fa-comments"></i>
        共<?php echo "$count"; ?>条评论
    </div>

    <?php if (have_comments()) : ?>
        <ul>
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 70,
            ));
            ?>
        </ul>
    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.'); ?></p>
    <?php else:
        $title_reply='
            <div class="title_reply">
            <i class="fa fa-pencil"></i>
            欢迎留言
            </div>';
        $comment_before = '        
        <div class="row">
            <div class="col-md-4">
                <p><input type="text" name="author" value="*昵称" tabindex="1"/><span><i class="fa fa-user"></i></span></p>
            </div>
            <div class="col-md-4">
                <p><input type="text" name="email" value="*邮箱" tabindex="2"/><span><i class="fa fa-envelop-o"></i></span></p>
            </div>
            <div class="col-md-4">
                <p><input type="text" name="email" value="网站" tabindex="3"/><span><i class="fa fa-link"></i></span></p>
            </div>
        </div>';
        $array = array(
            'fields' => apply_filters('comment_form_default_fields', $fields),
            'comment_field' => '<textarea id="comment" name="comment" cols="100″ rows="20″ aria-required="true" placeholder="赶快发表你的见解吧！"></textarea>',
            'must_log_in' => '',
            'logged_in_as' => '',
            'comment_notes_before' => "$comment_before",
            'comment_notes_after' => '',
            'id_form' => '',
            'id_submit' => 'submit',
            'title_reply' => "$title_reply",
            'title_reply_to' => __(''),
            'cancel_reply_link' => __(''),
            'label_submit' => __('Post Comment'),
        );
        comment_form($array);
        endif; ?>
</div>