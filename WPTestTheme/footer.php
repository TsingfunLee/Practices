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
	 <script src="<?php echo get_template_directory_uri(); ?>/js/mymove.js"></script>
    <script>
        $('#navTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>
	<script>
    $('input').focus(function(){
        $(this).css('outline','none');//answer1
    })
	$('a').focus(function(){
        $(this).css('outline','none');//answer1
    })
	$('p').focus(function(){
        $(this).css('color','red');//answer1
    })
    $('textarea').focusin(function(){
        $(this).css('outline','none');
        $(this).css( "border", "none" );
        $(this).css( "border", "2px solid #d9534f" );
    })
    $('textarea').focusout(function(){
        $(this).css( "border", "none" );
        $(this).css( "border", "2px solid #C1C1C1" );
    })
	</script>
</body>
</html>