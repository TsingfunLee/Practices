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

    <?php get_template_part('comments-add'); ?>
</div>