
   <ul class="alert list-group myright">
            <a  class="list-group-item active my-article-color">
                 <i class="icon-refresh icon-large"></i> 随机文章
				 <span id="ranhide"><i class="icon-angle-down icon-large myhiden" ></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </a>
		<div id="rancon">
			<?php
			$random=get_posts(array('numberposts' => 8, 'orderby' =>'rand','post_status' => 'publish'));
			foreach ($random as $post):
			?>
				<a href="<?php echo get_permalink($post->ID); ?>"  class="list-group-item">
					<span class="badge"><?php echo test_get_post_views($post->ID); ?></span><?php echo $post->post_title; ?>
				</a>
			<?php endforeach; ?>
			
		</div>
	 </ul>
