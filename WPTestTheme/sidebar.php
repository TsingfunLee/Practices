<div class="col-md-4" role="complementary">

    <?php
    if (is_single()){
        get_template_part('sidebar-new');
    }
    get_template_part('sidebar-hot');
    get_template_part('sidebar-category');
    get_template_part('sidebar-random');
    get_template_part('sidebar-comment');
    if (!is_single()){
        get_template_part('sidebar-ad');
    }
    ?>

</div>