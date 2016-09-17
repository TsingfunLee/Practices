	</div><!-- .site-content -->

	<footer class="col-md-12 myfoot" role="copyright">
		<p>
			Copyright©2016 Alex's Blog. All Rights Reserved. Theme By Test.

			<a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备12040927号.
			</a>Theme By YeahZan.
			<a href="http://tongji.baidu.com" target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/img/21.gif"/></a>
		
			<span>访问：<?php test_site_views(); ?>次</span>
			<span>文章：<?php test_get_posts_counts(); ?>篇</span>
            <span>评论：<?php test_get_comments_counts(); ?>条</span>
		</p>
	</footer>
	<div id="gotoTop">
		<i class="icon  icon-chevron-up icon-2x"></i>
	</div>

</div><!-- .site -->
	<!-- <script src="http://code.jquery.com/jquery.js"></script> -->


    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	 <script src="<?php echo get_template_directory_uri(); ?>/js/mainMove.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/readMore.js"></script>
    <script>
        $('#navTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>

</body>
</html>