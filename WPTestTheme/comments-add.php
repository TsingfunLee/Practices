<?php
    $smiles=test_smilies();
    $title_reply='
            <div class="title_reply youwel">
            <i class="icon icon-pencil"></i>
            欢迎留言
            </div>';
    $comment_before = '        
        <div class="row youmes">
           <div class="col-md-4">
                <div class="mes-sing"><span class="mes-span addwidth"><i class="icon icon-user icon-large"></i></span>
                    <input type="text" name="author" value="*昵称" tabindex="1"/>
                </div>
            </div>

            <div class="col-md-4">
                <div  class="mes-sing"><span class="mes-span"><i class="icon icon-envelope"></i></span>
                    <input type="text" name="email" value="*邮箱" tabindex="2"/>
                </div>
            </div>
            <div class="col-md-4">
                <div  class="mes-sing"><span class="mes-span"><i class="icon icon-link"></i></span>
                    <input type="text" name="email" value="网站" tabindex="3"/>
                </div>
            </div>'."$smiles".'
                      
        </div>';
    $array = array(
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' => '<div class="arguearea"><textarea class="youtext" id="comment" name="comment" cols="200″ rows="40″ aria-required="true" placeholder="赶快发表你的见解吧！"></textarea></div>',
        'must_log_in' => '',
        'logged_in_as' => '',
        'comment_notes_before' => "$comment_before",
        'comment_notes_after' => '',
        'id_form' => 'comment',
        'id_submit' => 'submit',
        'title_reply' => "$title_reply",
        'title_reply_to' => __(''),
        'cancel_reply_link' => __(''),
        'label_submit' => __('Post Comment'),
    );

    comment_form($array);
?>