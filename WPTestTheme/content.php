<article id="post-<?php the_ID(); ?>">
    <!-- Date -->  <!-- 主页面显示 -->
    <div class="jumbotron mywidth">
        <?php
        if (!is_single()) {
            ?>
            <div class="post-date divdate">
                <?php
                $dateArray = test_get_date();
                echo '<p class="post-date-month mymouth">' . "$dateArray[0]月</p></br>" . '<p class="post-date-day myday">' . "$dateArray[1]</p>";
                ?>
            </div>
        <?php } ?>


        <!-- Title -->
        <header class="post-header">

            <?php
            the_title(sprintf('<h2 class="post-title mycenter"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
            ?>

        </header>

        <div class="post-tag mycenter">
            <!-- Date -->  <!-- 单页面显示 -->
            <?php if (is_single()) { ?>
                <span class="post-tag-date  label label-danger  mylabel">
                <i class="icon-tags icon-large"></i>
                    <?php
                    $dateArray = test_get_date();
                    echo "$dateArray[0]-$dateArray[1]";
                    ?>
            </span>
            <?php } ?>
            <!-- Tags -->
            <span class="post-tag-tags label label-danger  mylabel">
            <?php
            $posttags = get_the_tags();
            if ($posttags) { ?>
                <i class="icon-tags icon-large"></i>
                <?php
                foreach ($posttags as $tag) {
                    echo "$tag->name";
                }
            }
            ?>
        </span>
            <!-- Author -->
            <span class="post-author label label-danger  mylabel">
            <i class="icon-user icon-large"></i>
                <?php
                the_author();
                ?>
        </span>
            <!-- Views -->
            <span class="post-views label label-danger  mylabel">
            <i class="icon-eye-open icon-large"></i>
                <?php
                $views = test_get_post_views(get_the_ID());
                echo "$views";
                ?>
    </span>
        </div>

        <!-- Content -->
        <section class="post-content jumbotron mycontent section-p">

            <p>

                <?php
                if (is_single()) {
                    the_content();
                } else {
                    test_excerpt();
                }
                ?>
            </p>

        </section>

        <!-- Read All -->
        <?php if (!is_single()) { ?>
            <!--  <footer class="post-read">  -->
            <!-- <button class="btn btn-primary btn-red  myhui-right " type="button"> -->
            <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary btn-red  myhui-right">
                阅读全文<span class="badge myfont-red"><?php echo $post->comment_count; ?></span></a>
            <!-- </button> -->

            <!--  </footer> -->
        <?php } ?>

        <?php if (is_single()){ ?>
        <!-- Preview And Next -->
        <?php
        if (get_previous_post()) {
            echo '<div  class="btn btn-primary btn-before">';
            previous_post_link('%link', '上一篇');
            echo '</div>';
        }
        if (get_next_post()){
            echo '<div  class="btn btn-primary btn-before">';
            next_post_link('%link', '下一篇');
            echo '</div>';
        }
        ?>

    <!-- Copyright -->
    <div role="copyright" class="jumbotron my-copyright">
        <p class="font-right">版权属于：<a href="<?php bloginfo('url'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <p class="font-right">原文地址：<a href="<?php echo esc_url(get_permalink()); ?>"
                                      rel="bookmark"><?php echo esc_url(get_permalink()); ?></a></p>
        <p class="font-right">转载时必须以链接形式注明原始出处及本声明。</p>
    </div>
    <!-- Share -->
    <div class="bdsharebuttonbox c-share">
        <a href="#" class="bds_more" data-cmd="more"></a>
        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
        <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
    </div>
    <script>window._bd_share_config = {
            "common": {
                "bdSnsKey": {},
                "bdText": "",
                "bdMini": "2",
                "bdMiniList": false,
                "bdPic": "",
                "bdStyle": "1",
                "bdSize": "24"
            }, "share": {}
        };
        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
    </script>
        <?php } ?>

</article><!-- .content -->