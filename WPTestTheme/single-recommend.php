<!-- Recommendation -->

     <div class="youlove">
        <i class="icon icon-heart"></i>
        您可能也喜欢：
     </div>
	<section class="row you-love-art">
    <?php
    $my_query = test_get_recommend_posts();
    if ($my_query->have_posts()) {
        while($my_query->have_posts()):$my_query->the_post();
            ?>
            <div class="col-md-4">
				<div class="art-single">
					<?php
					$title = get_the_title();
					if (strlen($title) > 20) {
						$title = substr($title, 0, 20);
						$href = get_permalink();
						echo '<h2><a href="'."$href".'" rel="bookmark">' . "$title" . '...</a></h2>';
					} else {
						echo '<h2><a href="'."$href".'" rel="bookmark">' . "$title" . '</a></h2>';
					}
					$content = test_get_content(get_the_ID(), 120);
					echo "<p>$content...</p>";
					?>
					<a class="reading-all" href="<?php echo "$href"; ?>">
                            阅读全文
                    </a>
				</div>
            </div>
        <?php endwhile; } ?>
</section>
