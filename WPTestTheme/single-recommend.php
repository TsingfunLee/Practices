<!-- Recommendation -->
<section class="row">
    <div class="col-md-12">
        <i class="fa fa-heart"></i>
        您可能也喜欢：
    </div>
    <?php
    $my_query = test_get_recommend_posts();
    if ($my_query->have_posts()) {
        while ($my_query->have_posts()) : $my_query->the_post();
            ?>
            <div class="col-md-4">
                <?php
                $title = get_the_title();
                if (strlen($title) > 20) {
                    $title = substr($title, 0, 20);
                    echo '<a href="#" rel="bookmark">' . "$title" . '<span>...</span></a></br>';
                } else {
                    echo '<a href="#" rel="bookmark">' . "$title" . '</a></br>';
                }
                $content = test_get_content(get_the_ID(), 120);
                echo "$content...";
                ?>
            </div>
            <div class="col-md-4">
                <?php
                $title = get_the_title();
                if (strlen($title) > 20) {
                    $title = substr($title, 0, 20);
                    echo '<a href="#" rel="bookmark">' . "$title" . '<span>...</span></a></br>';
                } else {
                    echo '<a href="#" rel="bookmark">' . "$title" . '</a></br>';
                }
                $content = test_get_content(get_the_ID(), 120);
                echo "$content...";
                ?>
            </div>
            <div class="col-md-4">
                <?php
                $title = get_the_title();
                if (strlen($title) > 20) {
                    $title = substr($title, 0, 20);
                    echo '<a href="#" rel="bookmark">' . "$title" . '<span>...</span></a></br>';
                } else {
                    echo '<a href="#" rel="bookmark">' . "$title" . '</a></br>';
                }
                $content = test_get_content(get_the_ID(), 120);
                echo "$content...";
                ?>
            </div>
        <?php endwhile;
    } ?>
</section>
