	</div><!-- .site-content -->

	<footer class="col-md-12" role="copyright">
		<p>
			Copyright©2016 Alex's Blog. All Rights Reserved. Theme By Test.
			<span>访问：<?php test_site_views(); ?>次</span>
			<span>文章：<?php test_get_posts_counts(); ?>篇</span>
            <span>评论：<?php test_get_comments_counts(); ?>条</span>
		</p>
	</footer>

</div><!-- .site -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script>
        $('#navTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>
</body>
</html>