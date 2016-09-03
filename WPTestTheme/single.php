<?php get_header(); ?>

    <div class="col-md-8" role="main">

            <!-- Content -->
            <?php while (have_posts()) :
            the_post(); ?>
            <?php test_set_post_views(get_the_ID()); ?>
            <?php
            get_template_part('content');
            ?>
           
        <!-- Advertisement -->
        <div class="sing-ad">
            <img src="<?php echo get_template_directory_uri(); ?>/img/ad.jpg" alt="广告位">
        </div>

        <!-- Recommendation -->
        <?php get_template_part('single-recommend'); ?>
        <!-- Comment -->
        <?php comments_template(); ?>
        <?php endwhile; ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>