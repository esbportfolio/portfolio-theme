<?php
/**
 * The template for displaying pages (i.e. posts with the type 'page')
 * (A page is considered a type of post in WordPress)
 */

declare(strict_types=1);

get_header();

?>
                    <h1 class="my-3"><?php echo get_the_title(); ?></h1>
                    <div class="col-12 col-lg-9">
						<div class="card mb-3">
							<div class="card-body"><?php the_content(); ?>
							</div>
						</div>
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
