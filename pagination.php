<?php
/**
 * The template for displaying pagination
 * 
 * This should always be called inside a conditional statement, since the pagination section
 * shouldn't be created if it isn't necessary.  Variables in this file should be scoped
 * to that conditional and should *not* be global.
 */

declare(strict_types=1);

?>
                        <nav aria-label="Page Navigation">
                            <ul class="pagination">
<?php
$pagination_formatter = new Esb_Pagination_Formatter($wp_query, new Esb_Html_Helper());
echo $pagination_formatter->format_links(8);
?>
                            </ul>
                        </nav>
