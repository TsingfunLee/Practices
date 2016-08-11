<!-- Recommendation -->
<section class="row">
    <div class="col-md-12">
        <i class="fa fa-heart"></i>
        您可能也喜欢：
    </div>
    <div class="col-md-4">
        <?php
        $content = test_get_content(1, 120);
        echo "$content...";
        ?>
    </div>
    <div class="col-md-4">
        <?php
        $title = get_post(1)->post_title;
        if (strlen($title) > 20) {
            $title = substr($title, 0, 20);
            echo '<a href="#" rel="alternate">' . "$title" . '<span>...</span></a></br>';
        } else {
            echo '<a href="#" rel="alternate">' . "$title" . '</a></br>';
        }
        $content = test_get_content(1, 120);
        echo "$content...";
        ?>
    </div>
    <div class="col-md-4">
        <?php
        $content = test_get_content(1, 120);
        echo "$content...";
        ?>
    </div>
</section>
