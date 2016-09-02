
	
   <ul class="alert list-group myright">

                <a  class="list-group-item active my-article-color">
                 <i class="icon-refresh icon-large"></i> 最热文章
				 <span id="hothide"><i class="icon-angle-down icon-large myhiden" ></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </a>
				
		<div id="hotcon">
			<?php
			$pop = $wpdb->get_results("SELECT ID,post_title, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' AND post_password='' ORDER BY comment_count DESC LIMIT 8");
			foreach ($pop as $post):
			?>
		   
				<a href="<?php echo get_permalink($post->ID); ?>" class='list-group-item'>
					<span class="badge"><?php echo $post->comment_count; ?></span>
					<?php echo $post->post_title; ?>
				</a>
				
				<!---<a href="<?php echo get_permalink($post->ID); ?>"  class="list-group-item">
					<span class="badge"><?php echo test_get_post_views($post->ID); ?></span><?php echo $post->post_title; ?>
				</a>--->
				
				<?php endforeach; ?>
		  
		</div>
	 </ul>
