<?php
    $smiles=test_smilies();
    $title_reply='
            <p class="title_reply youwel">
            <i class="icon icon-pencil"></i>
            欢迎留言
            </p>';
    $comment_field = '
        <div class="row youmes">
           <div class="col-md-4">
                <p class="mes-sing"><span class="mes-span addwidth"><i class="icon icon-user icon-large"></i></span>
                    <input type="text" id="author" name="author" placeholder="*昵称" value="" tabindex="1"/>
                </p>
            </div>

            <div class="col-md-4">
                <p  class="mes-sing"><span class="mes-span"><i class="icon icon-envelope"></i></span>
                    <input type="text" id="email" name="email" placeholder="*邮箱" value="" tabindex="2"/>
                </p>
            </div>
            <div class="col-md-4">
                <p  class="mes-sing"><span class="mes-span"><i class="icon icon-link"></i></span>
                    <input type="text" id="url" name="url" placeholder="*网站" value="" tabindex="3"/>
                </p>
            </div>
        </div>'."$smiles".'
        <textarea class="youtext arguearea" id="comment" name="comment" cols="95″ rows="40″ aria-required="true" placeholder="赶快发表你的见解吧！"></textarea>
    ';
    $comment_before = "$smiles";
    $array = array(
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' => "$comment_field",
        'must_log_in' => '',
        'logged_in_as' => '',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'id_form' => 'comment-form',
        'id_submit' => 'submit',
        'title_reply' => "$title_reply",
        'title_reply_to' => __(''),
        'cancel_reply_link' => __(''),
        'label_submit' => __('Post Comment'),
    );

    comment_form($array);
?>