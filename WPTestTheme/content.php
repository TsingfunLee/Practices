<article>
    <!-- Date -->  <!-- 主页面显示 -->
    <?php
    if (!is_single()) {
        ?>
        <div class="post-date">
            <?php
            $dateArray = test_get_mydate();
            echo '<span class="post-date-month">' . "$dateArray[0]月</span></br>" . '<span class="post-date-day">' . "$dateArray[1]</span>";
            ?>
        </div>
    <?php } ?>

    <!-- Title -->
    <header class="post-header">
        <?php
        the_title(sprintf('<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
        ?>
    </header>

    <div class="post-tag">
        <!-- Date -->  <!-- 单页面显示 -->
        <?php if (is_single()) { ?>
            <span class="post-tag-date">
                <i class="fa fa-tags"></i>
                <?php
                $dateArray = test_get_mydate();
                echo "$dateArray[0]-$dateArray[1]";
                ?>
            </span>
        <?php } ?>
        <!-- Tags -->
        <span class="post-tag-tags">
            <?php
            $posttags = get_the_tags();
            if ($posttags) { ?>
            <i class="fa fa-tags"></i>
            <?php
                foreach ($posttags as $tag) {
                    echo "$tag->name";
                }
            }
            ?>
        </span>
        <!-- Author -->
        <span class="post-author">
            <i class="fa fa-user"></i>
            <?php
            the_author();
            ?>
        </span>
        <!-- Views -->
        <span class="post-views">
            <i class="fa fa-eye"></i>
            <?php
            $views = test_get_post_views(get_the_ID());
            echo "$views";
            ?>
    </span>
    </div>

    <!-- Content -->
    <section class="post-content">
        <?php
        if (is_single()) {
            the_content();
        } else {
            $content = test_get_content(get_the_ID(),350);
            echo "$content...";
        }
        ?>
    </section>

    <!-- Read All -->
    <?php if (!is_single()){ ?>
    <footer>
        <a href="<?php echo esc_url(get_permalink()); ?>">阅读全文</a>
    </footer>
    <?php } ?>
</article><!-- .content -->