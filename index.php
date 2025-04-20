<?php
/**
 * The main template file
 *
 * This acts as a fallback if no other templates are used.  It is also specifically used for the main blog page.
 */

declare(strict_types=1);

get_header();

?>
                    <h1 class="my-3">All Posts</h1>
                    <div class="col-12 col-lg-9">
<?php
if ( have_posts() ) {
	// If there are posts, create a Post Formatter object
	$post_formatter = new Esb_Post_Formatter(new Esb_Html_Helper);
	while ( have_posts() ) {
		the_post();
        echo $post_formatter->format_post(5, true);
	}
} else {
    ?>
						<p>No posts yet, but check back to see what's coming soon!</p>
						<p><a href="<?php echo get_site_url(); ?>">Return Home</a></p>
    <?php
}

if ( $wp_query->max_num_pages > 1 ) {
    get_template_part('pagination');
}
?>
                    </div>
					<div class="col-12 col-lg-3">
						<div class="card mb-3">
							<div class="card-body">
<?php get_sidebar(); ?>
							</div>
						</div>
					</div>
<?php

get_footer();
