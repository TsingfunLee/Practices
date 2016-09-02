
<ul class="alert list-group myright">
            <a class="list-group-item active my-article-color">
                        <i class="icon-fire icon-large"></i> 最新文章
                        <span id="newhide"><i class="icon-angle-down icon-large myhiden" ></i></span>
                        <button class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
            </a>
     <div id="newcon">
            <?php
            $recent_posts = wp_get_recent_posts();
            foreach( $recent_posts as $recent ):
            $href=get_permalink($recent['ID']). '"title="Look'.esc_attr($recent["post_title"]);
            ?>
				
					<a href="<?php echo $href ?>" class='list-group-item'><?php echo $recent['post_title']; ?>
						<span class="badge"><?php echo test_get_post_views($recent['ID']); ?></span>
					</a>
				
			
		
            <?php endforeach; ?>
    </div>
  
</ul>