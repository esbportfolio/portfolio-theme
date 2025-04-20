<?php
/**
 * The template for displaying all single posts
 */

declare(strict_types=1);

get_header();

?>
                    <div class="col-12 col-lg-9">
<?php
if ( have_posts() ) {
	// If there are posts, create a Post Formatter object
	$post_formatter = new Esb_Post_Formatter(new Esb_Html_Helper);
	while ( have_posts() ) {
		the_post();
        echo $post_formatter->format_post(5);

        // If there are comments or if comments are open, insert the comments template
        if ( comments_open() || intval(get_comments_number()) > 0 ) {
            comments_template('/comments.php');
        }
	}
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
