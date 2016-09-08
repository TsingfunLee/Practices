<?php
/*
* Template Name: Test
*/
?>
<?php
get_header();?>

<div class="row">
	<div class="col-md-8  ">
		<div class='about-me'>
			<h2>About Me</h2>
			<p>一个普通的程序员</p>
			<h3>联系方式:</h3>
			<p><span>email:</span> zhoujiangbohai@163.com</p>
		</div>

		<?php comments_template(); ?>
	</div>
	
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>