<?php get_header(); ?>

    <div class="row">
        <div class="col-md-8" role="main">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('content', get_post_format());
                }
            } else {
                ?>
                <article>
                    <h1>很抱歉，没有找到任何内容。</h1>
                </article>
            <?php } ?>
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>