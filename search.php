<?php
/**
 * The template for displaying search results pages
 */

declare(strict_types=1);

get_header();

?>
                    <h1 class="my-3"><?php printf('Results For: “%s”', get_search_query()); ?></h1>
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
						<p>Your search returned no results. Please try again.</p>
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
