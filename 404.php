<?php
/**
 * The template for displaying 404 pages (not found)
 */

declare(strict_types=1);

get_header();

?>
                    <h1 class="my-3">Page Not Found</h1>
                    <div class="col-12 col-lg-9">
						<p>The page you requested could not be found.  Please try again.</p>
						<p><a href="<?php echo get_site_url(); ?>">Return Home</a></p>
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
