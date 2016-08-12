<?php
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
?>