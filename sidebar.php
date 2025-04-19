<?php
/**
 * The template for displaying the sidebar
 */

declare(strict_types=1);

// Display categories
if (get_categories()) {
?>
								<div class="mb-4">
									<h5>Categories</h5>
									<ul class="list-unstyled">
<?php
    wp_list_categories(array(
        'show_count' => true,
        'title_li' => '',
        'walker' => new Esb_Cat_Walker(new Esb_Html_Helper(), 10)
    ));
?>
                                    </ul>
								</div>
<?php
}

// Display tags
// The get_tags function can return a WP_Error object under certain conditions,
// which is why we need extra error handling here that's not needed for get_categories.
if ( !is_wp_error(get_tags()) && get_tags() ) {
?>
								<div class="mb-4">
									<h5>Tags</h5>
									<div>
<?php
    
    // Note: Remember this section is within an 'if' statement so everything is locally scoped

    function format_tag(WP_Term $tag): string {
        /**
         * Formats a given tag as a badge. Used as a callback by the array map.
         * 
         * @param WP_Term   $tag     Object containing the tag to be formatted
         * 
         * @return          String with tag formatted as a badge.
         */
        
        // Create an HTML helper
        $html_helper = new Esb_Html_Helper();

        // Create the link tags to go inside the badges
        $a_tag = $html_helper->create_html_tag(
            tag_type: 'a',
            inner_html: $tag->name,
            classes: array('text-decoration-none', 'link-light'),
            attr: array('href' => get_tag_link($tag->term_id))
        );

        // Return the badges
        return $html_helper->create_html_tag(
            tag_type: 'span',
            inner_html: $a_tag,
            classes: array('badge', 'bg-secondary')
        );
    }

    // Map over the array of tags to format each one as a badge
    $span_array = array_map('format_tag', get_tags());

    // Create a spacing string for use in this function
    $indent = str_repeat(T, 10);

    // Output span tags, adding spacing to the HTML
    echo $indent . implode(' ' . N . $indent, $span_array) . N;
?>
                                    </div>
                                </div>
<?php
}
