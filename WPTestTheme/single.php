<?php get_header(); ?>

    <div class="col-md-8" role="main">
        <article>
            <!-- Content -->
            <?php while (have_posts()) :
            the_post(); ?>
            <?php test_set_post_views(get_the_ID()); ?>
            <?php
            get_template_part('content');
            ?>
            <!-- Preview And Next -->
            <div>
                <?php previous_post_link('%link','上一篇'); ?>
            </div>
            <div>
                <?php next_post_link('%link','下一篇'); ?>
            </div>
            <!-- Copyright -->
            <div role="copyright">
                <p>版权属于：<a href="<?php bloginfo('url'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <p>原文地址：<a href="<?php echo esc_url(get_permalink()); ?>"
                           rel="bookmark"><?php echo esc_url(get_permalink()); ?></a></p>
                <p>转载时必须以链接形式注明原始出处及本声明。</p>
            </div>
            <!-- Share -->
            <div class="bdsharebuttonbox">
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
        </article>

        <!-- Advertisement -->
        <img src="" alt="广告位">

        <!-- Recommendation -->
        <?php get_template_part('single-recommend'); ?>
        <!-- Comment -->
        <?php comments_template(); ?>
        <?php endwhile; ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>