<?php
/**
 * Walker for handling navigation header menus. Extended from Walker_Nav_Menu via Esb_Nav_Walker.
 */

declare(strict_types=1);

class Esb_Cat_Walker extends Walker_Category {

    // Dependency injection
    public function __construct(protected Esb_Html_Helper $html_helper, protected int $base_indent = 0) {}

    public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        /**
         * Start of each element.  Abstract class in extending class, so much match that format
         * and cannot specify types.
         * 
         * @param string                $output             Output of walker. Passed by reference so all functions in class affect it.
         * @param object                $data_object        WP_Term object for current category.
         * @param int                   $depth              Current depth of walker. Starts at 0 for level of first items.
         * @param null|array|object     $args               Arguments.  This will be an object if invoked with wp_nav_walker but an array
         *                                                  for other uses.
         * @param int                   $current_objct_id   Current object ID, but not passed in by default.
         */

        // Set basic data
        $cat_title = $data_object->name;
        $cat_url = get_category_link($data_object->term_id);
        $cat_count = $data_object->count;

        // Get a formatted anchor tag
        $a_tag = $this->html_helper->create_html_tag(
            tag_type: 'a',
            inner_html: "$cat_title ($cat_count)",
            classes: array('text-decoration-none', 'link-dark'),
            attr: array('href' => $cat_url)
        );

        // Get a formatted list item tag
        // We use the array format since we only need the opening tag
        $li_tag_array = $this->html_helper->create_html_tag(
            tag_type: 'li',
            return_str: false
        );

        // Inserts tags into the output
        $output .= str_repeat(T, $this->base_indent + $depth) . $li_tag_array['start'] . $a_tag;

    }

}