<?php
/**
* WordPress Query Comprehensive Reference
* Compiled by Shafayet ()
* 
*
* CODEX: https://developer.wordpress.org/reference/classes/wp_query/#parameters
* Source: https://core.trac.wordpress.org/browser/tags/5.2/src/wp-includes/class-wp-query.php#L18
*/

/**
 * -- Parameters --
 * 01. Author Parameters
 * 02. Category Parameters
 * 03. Tag Parameters
 * 04. Taxonomy Parameters
 * 05. Search Parameters
 * 06. Post & Page Parameters
 * 07. Password Parameters
 * 08. Post Type Parameters
 * 09. Order & Orderby Parameters
 * 10. Date Parameters
 * 11. Custom Field (post meta) Parameters
 * 12. Permission Parameters
 * 13. Mime Type Parameters
 * 14. Caching Parameters
 * 15. Return Fields Parameter
 */

$args = array(
    
    /**
     * ================== 01 ==================
     * 
     * Author Parameters - Show posts associated with certain author.
     * https://developer.wordpress.org/reference/classes/wp_query/#author-parameters
     * */

    # 01. Display posts by author, using author id:
    'author'            => '1,2,3,',        //(int) - use author id [use minus (-) to exclude authors by ID ex. 'author' => '-1,-2,-3,']
    
    # 02. Display posts by author, using author 'user_nicename':
    'author_name'       => 'shafayet',       //(string) - use 'user_nicename' (NOT name)
    
    # 03. Display posts from several specific authors:
    'author'            => '2,6,17,38',     //
    
    # 04. Exclude Posts Belonging to an Author
    # Display all posts except those from an author(singular) by prefixing its id with a ‘-‘ (minus) sign:
    'author'            => -12,

    # 05. Display posts from multiple authors: (Multiple Author Handling)
    'author__in'        => array( 2, 6 ),   //(array) - use author id (available with Version 3.7).

    # 06. You can also exclude multiple author this way: (Multiple Author Handling)
    'author__not_in'    => array( 2, 6 ),   //(array)' - use author id (available with Version 3.7).



    /**
     * ================== 02 ==================
     * Category Parameters - Show posts associated with certain categories.
     * https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
     */
    'cat' => 5,//(int) - use category id.
    'category_name' => 'staff, news',          //(string) - Display posts that have these categories, using category slug.
    'category_name' => 'staff+news',           //(string) - Display posts that have "all" of these categories, using category slug.
    'category__and' => array( 2, 6 ),         //(array) - use category id.
    'category__in' => array( 2, 6 ),          //(array) - use category id.
    'category__not_in' => array( 2, 6 ),      //(array) - use category id.



    /**
     * ================== 03 ==================
     * Tag Parameters - Show posts associated with certain tags.
     * https://developer.wordpress.org/reference/classes/wp_query/#tag-parameters
     */
    'tag' => 'cooking',                       //(string) - use tag slug.
    'tag_id' => 5,                            //(int) - use tag id.
    'tag__and' => array( 2, 6),               //(array) - use tag ids.
    'tag__in' => array( 2, 6),                //(array) - use tag ids.
    'tag__not_in' => array( 2, 6),            //(array) - use tag ids.
    'tag_slug__and' => array( 'red', 'blue'), //(array) - use tag slugs.
    'tag_slug__in' => array( 'red', 'blue'),  //(array) - use tag slugs.



    /**
     * ================== 04 ==================
     * Taxonomy Parameters - Show posts associated with certain taxonomy.
     * https://developer.wordpress.org/reference/classes/wp_query/#taxonomy-parameters
     * 
     * Important Note: tax_query takes an array of tax query arguments arrays (it takes an array of arrays).
     * 
     * This construct allows you to query multiple taxonomies by using the relation parameter in the first (outer)
     * array to describe the boolean relationship between the taxonomy arrays.
     */
    'tax_query' => array(  //(array) - use taxonomy parameters (available with Version 3.1).
        'relation'  => 'AND',   //(string) -  The logical relationship between each inner taxonomy array when there is more than one. Possible values are 'AND', 'OR'.
        array(
            'taxonomy'          => 'color',                 //(string) - Taxonomy.
            'field'             => 'slug',                  //(string) - Select taxonomy term by ('term_id' - default | 'name' | 'slug' | 'term_taxonomy_id')
            'terms'             => array( 'red', 'blue' ),  //(int/string/array) - Taxonomy term(s).
            'include_children'  => true,                    //(bool) - Whether or not to include children for hierarchical taxonomies. Defaults to true.
            'operator'          => 'IN'                     //(string) - Operator to test. Possible values are ‘IN’, ‘NOT IN’, ‘AND’, ‘EXISTS’ and ‘NOT EXISTS’.
                                                            // Default value is 'IN'.
        ),
        array(
            'taxonomy'          => 'actor',
            'field'             => 'id',
            'terms'             => array( 103, 115, 206 ),
            'include_children'  => false,
            'operator'          => 'NOT IN'
        )
    ),



    /**
     * * ================== 05 ==================
     * Search Parameters - Show posts based on a keyword search.
     * https://developer.wordpress.org/reference/classes/wp_query/#search-parameters
     */
    's' => $s,            //(string) - Passes along the query string variable from a search. For example usage see: http://www.wprecipes.com/how-to-display-the-number-of-results-in-wordpress-search 
    'exact' => true,      //(bool) - flag to make it only match whole titles/posts - Default value is false. For more information see: https://gist.github.com/2023628#gistcomment-285118
    'sentence' => true,   //(bool) - flag to make it do a phrase search - Default value is false. For more information see: https://gist.github.com/2023628#gistcomment-285118



    /**
     * * ================== 06 ==================
     * Post & Page Parameters - Display content based on post and page parameters.
     * Remember that default post_type is only set to display posts but not pages.
     * https://developer.wordpress.org/reference/classes/wp_query/#post-page-parameters
     */

    'p' => 1,                               //(int) - use post id.
    'name' => 'hello-world',                //(string) - use post slug.
    'page_id' => 1,                         //(int) - use page id.
    'pagename' => 'sample-page',            //(string) - use page slug.
    'pagename' => 'contact_us/canada',      //(string) - Display child page using the slug of the parent and the child page, separated ba slash
    'post_parent' => 1,                     //(int) - use page id. Return just the child Pages. (Only works with heirachical post types.)
    'post_parent__in' => array(1,2,3),      //(array) - use post ids. Specify posts whose parent is in an array. NOTE: Introduced in 3.6 
    'post_parent__not_in' => array(1,2,3),  //(array) - use post ids. Specify posts whose parent is not in an array.
    'post__in' => array(1,2,3),             //(array) - use post ids. Specify posts to retrieve.
                                            // ATTENTION If you use sticky posts, they will be included (prepended!) in the posts you retrieve
                                            // whether you want it or not. To suppress this behaviour use ignore_sticky_posts
    'post__not_in' => array(1,2,3),         //(array) - use post ids. Specify post NOT to retrieve.
    
    //NOTE: you cannot combine 'post__in' and 'post__not_in' in the same query



    /**
     * * ================== 07 ==================
     * Password Parameters - Show content based on post and page parameters.
     * Remember that default post_type is only set to display posts but not pages.
     * https://developer.wordpress.org/reference/classes/wp_query/#password-parameters
     */
    # 01. Display only password protected posts:
    'has_password'  => true,            //(bool) - 'true' for posts with passwords
                                        //(bool) - 'false' for posts without passwords
                                        //(bool) - 'null' for all posts with and without passwords 
    # 02. Display only posts with and without passwords:
    'post_password' => 'multi-pass',    //(string) - show posts with a particular password (available with Version 3.9)
    
    # 03. Display posts with a particular password:
    'post_password' => 'zxcvbn',



    /**
     * ================== 08 ==================
     * Post Type Parameters - Show posts associated with certain type.
     * https://developer.wordpress.org/reference/classes/wp_query/#post-type-parameters
     */
    'post_type' => array(       //(string / array) - use post types. Retrieves posts by Post Types, default value is 'post';
        'post',             // - a post.
        'page',             // - a page.
        'revision',         // - a revision.
        'attachment',       // - an attachment. The default WP_Query sets 'post_status'=>'published',
                            // but atchments default to 'post_status'=>'inherit' so you'll need to set the status to 'inherit' or 'any'.
        'my-post-type',     // - Custom Post Types (e.g. movies)
        'nav_menu_item',    // - a navigation menu item
        'custom-post',      // Custom Post Types (e.g. movies)
    ),
    # -- OR --
    # NOTE: The 'any' keyword available to both post_type and post_status queries cannot be used within an array. 
    'post_type' => 'any',   // - retrieves any type except revisions and types with 'exclude_from_search' set to true.



    /**
     * Status Parameters - Show posts associated with certain post status.
     * https://developer.wordpress.org/reference/classes/wp_query/#status-parameters
     */
    'post_status' => array(     //(string / array) - use post status. Retrieves posts by Post Status, default value i'publish'.         
        'publish',          // - a published post or page.
        'pending',          // - post is pending review.
        'draft',            // - a post in draft status.
        'auto-draft',       // - a newly created post, with no content.
        'future',           // - a post to publish in the future.
        'private',          // - not visible to users who are not logged in.
        'inherit',          // - a revision. see get_children.
        'trash'             // - post is in trashbin (available with Version 2.9).
    ),
    # -- OR --
    # NOTE: The 'any' keyword available to both post_type and post_status queries cannot be used within an array. 
    'post_status' => 'any',  // - retrieves any status except those from post types with 'exclude_from_search' set to true.


    /**
     * Pagination Parameters
     * https://developer.wordpress.org/reference/classes/wp_query/#pagination-parameters
     */
    'nopaging'              => true,       // (boolean) – show all posts or use pagination. Default value is ‘false’, use paging.
    'posts_per_page'        => 10,         // (int) - number of post to show per page (available with Version 2.1). Use 'posts_per_page'=1 to show all posts (the 'offset' parameter is ignored with a -1 value). Note if the query is in a feed, wordpress overwrites this parameter with the stored 'posts_per_rss' option. Treimpose the limit, try using the 'post_limits' filter, or filter 'pre_option_posts_per_rss' and return -1
    'posts_per_archive_page'=> 10,         // (int) - number of posts to show per page - on archive pages only. Over-rides showposts anposts_per_page on pages where is_archive() or is_search() would be true
    'nopaging'              => false,      // (bool) - show all posts or use pagination. Default value is 'false', use paging.
    'paged'                 => get_query_var('paged'), //(int) - number of page. Show the posts that would normally show up just on page X when usinthe "Older Entries" link.
                                            //NOTE: Use get_query_var('page'); if you want your query to work in a Page template that you've set as your static front page. The query variable 'page' holds the pagenumber for a single paginated Post or Page that includes the <!--nextpage--> Quicktag in the post content.
                                            // This whole paging thing gets tricky. Some links to help you out:
                                            // http://codex.wordpress.org/Function_Reference/next_posts_link#Usage_when_querying_the_loop_with_WP_Query
                                            // http://codex.wordpress.org/Pagination#Troubleshooting_Broken_Pagination

    'offset' => 3,                          // (int) - number of post to displace or pass over. 
                                            // Warning: Setting the offset parameter overrides/ignores the paged parameter and breaks pagination. for a workaround see: http://codex.wordpress.org/Making_Custom_Queries_using_Offset_and_Pagination
                                            // The 'offset' parameter is ignored when 'posts_per_page'=>-1 (show all posts) is used.

    'page' => get_query_var('page'),        // (int) - number of page for a static front page. Show the posts that would normally show up just on page X of a Static Front Page.
                                            //  NOTE: The query variable 'page' holds the pagenumber for a single paginated Post or Page that includes the <!--nextpage--> Quicktag in the post content.
    'ignore_sticky_posts' => false,         // (boolean) - ignore sticky posts or not (available with Version 3.1, replaced caller_get_posts parameter). Default value is 0 - don't ignore sticky posts. Note: ignore/exclude sticky posts being included at the beginning of posts returned, but the sticky post will still be returned in the natural order of that list of posts returned.



    /**
     * ================== 09 ==================
     * Order & Orderby Parameters - Sort retrieved posts.
     * https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
     */
    'order' => 'DESC',                      //(string) - Designates the ascending or descending order of the 'orderby' parameter. Default to 'DESC'.
                                              //Possible Values:
                                              //'ASC' - ascending order from lowest to highest values (1, 2, 3; a, b, c).
                                              //'DESC' - descending order from highest to lowest values (3, 2, 1; c, b, a).
    'orderby' => 'date',                    //(string) - Sort retrieved posts by parameter. Defaults to 'date'. One or more options can be passed. EX: 'orderby' => 'menu_order title'
                                              //Possible Values:
                                              //'none' - No order (available with Version 2.8).
                                              //'ID' - Order by post id. Note the captialization.
                                              //'author' - Order by author.
                                              //'title' - Order by title.
                                              //'name' - Order by post name (post slug).
                                              //'date' - Order by date.
                                              //'modified' - Order by last modified date.
                                              //'parent' - Order by post/page parent id.
                                              //'rand' - Random order.
                                              //'comment_count' - Order by number of comments (available with Version 2.9).
                                              //'menu_order' - Order by Page Order. Used most often for Pages (Order field in the EdiPage Attributes box) and for Attachments (the integer fields in the Insert / Upload MediGallery dialog), but could be used for any post type with distinct 'menu_order' values (theall default to 0).
                                              //'meta_value' - Note that a 'meta_key=keyname' must also be present in the query. Note alsthat the sorting will be alphabetical which is fine for strings (i.e. words), but can bunexpected for numbers (e.g. 1, 3, 34, 4, 56, 6, etc, rather than 1, 3, 4, 6, 34, 56 as yomight naturally expect).
                                              //'meta_value_num' - Order by numeric meta value (available with Version 2.8). Also notthat a 'meta_key=keyname' must also be present in the query. This value allows for numericasorting as noted above in 'meta_value'.
                                              //'title menu_order' - Order by both menu_order AND title at the same time. For more info see: http://wordpress.stackexchange.com/questions/2969/order-by-menu-order-and-title
                                              //'post__in' - Preserve post ID order given in the post__in array (available with Version 3.5)



    /**
     * ================== 10 ==================
     * Date Parameters - Show posts associated with a certain time and date period.
     * https://developer.wordpress.org/reference/classes/wp_query/#date-parameters
     */
    'year'      => 2014,    //(int) - 4 digit year (e.g. 2011).
    'monthnum'  => 4,       //(int) - Month number (from 1 to 12).
    'w'         =>  25,     //(int) - Week of the year (from 0 to 53). Uses the MySQL WEEK command. The mode is dependenon the "start_of_week" option.
    'day'       => 17,      //(int) - Day of the month (from 1 to 31).
    'hour'      => 13,      //(int) - Hour (from 0 to 23).
    'minute'    => 19,      //(int) - Minute (from 0 to 60).
    'second'    => 30,      //(int) - Second (0 to 60).
    'm'         => 201404,  //(int) - YearMonth (For e.g.: 201307).

    'date_query'=> array(   //(array) - Date parameters (available with Version 3.7).
                            //these are super powerful. check out the codex for more comprehensive code examples http://codex.wordpress.org/Class_Reference/WP_Query#Date_Parameters
        array(
            'year'      => 2014,                //(int) - 4 digit year (e.g. 2011).
            'month'     => 4,                   //(int) - Month number (from 1 to 12).
            'week'      => 31,                  //(int) - Week of the year (from 0 to 53).
            'day'       => 5,                   //(int) - Day of the month (from 1 to 31).
            'hour'      => 2,                   //(int) - Hour (from 0 to 23).
            'minute'    => 3,                   //(int) - Minute (from 0 to 59).
            'second'    => 36,                  //(int) - Second (0 to 59).
            'after'     => 'January 1st, 2013', //(string/array) - Date to retrieve posts after. Accepts strtotime()-compatible string, or array of 'year', 'month', 'day'
            'before'    => array(               //(string/array) - Date to retrieve posts after. Accepts strtotime()-compatible string, or array of 'year', 'month', 'day'
                'year'      => 2013,                //(string) Accepts any four-digit year. Default is empty.
                'month'     => 2,                   //(string) The month of the year. Accepts numbers 1-12. Default: 12.
                'day'       => 28,                  //(string) The day of the month. Accepts numbers 1-31. Default: last day of month.
            ), // before
            'inclusive' => true,        //(boolean) - For after/before, whether exact value should be matched or not'.
            'compare'   =>  '=',        //(string) - Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN',
                                    // 'BETWEEN', 'NOT BETWEEN', 'EXISTS' (only in WP >= 3.5), and 'NOT EXISTS' (also only in WP >= 3.5). Default value is '='
            'column'    => 'post_date', //(string) - Column to query against. Default: 'post_date'.
            'relation'  => 'AND',       //(string) - OR or AND, how the sub-arrays should be compared. Default: AND.
        ),
    ), // date_query



    /**
     * ================== 11 ==================
     * Custom Field (post meta) Parameters - Show posts associated with a certain custom field.
     * https://developer.wordpress.org/reference/classes/wp_query/#custom-field-post-meta-parameters
     */
    'meta_key'      => 'key',         //(string) - Custom field key.
    'meta_value'    => 'value',       //(string) - Custom field value.
    'meta_value_num'=> 10,            //(number) - Custom field value.
    'meta_compare'  => '=',           //(string) - Operator to test the 'meta_value'. Possible values are '!=', '>', '>=', '<', or ='. Default value is '='.
    'meta_query'    => array(         //(array) - Custom field parameters (available with Version 3.1).
        'relation'   => 'AND',        //(string) - Possible values are 'AND', 'OR'. The logical relationship between each inner meta_query array when there 
                                      // is more than one. Do not use with a single inner meta_query array.
        array(
            'key'       => 'color',   //(string) - Custom field key.
            'value'     => 'blue',    //(string/array) - Custom field value (Note: Array support is limited to a compare value of 'IN', 'NOT IN', 'BETWEEN'
                                      // or 'NOT BETWEEN') Using WP < 3.9? Check out this page for details: 
                                      // http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
            'type'      => 'CHAR',    //(string) - Custom field type. Possible values are 'NUMERIC', 'BINARY', 'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED',
                                      // 'TIME', 'UNSIGNED'. Default value is 'CHAR'. The 'type' DATE works with the 'compare' value BETWEEN only if the date is 
                                      // stored at the format YYYYMMDD and tested with this format.
                                      //NOTE: The 'type' DATE works with the 'compare' value BETWEEN only if the date is stored at the format YYYYMMDD and tested with this format.
            'compare'   => '='        //(string) - Operator to test. Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN',
                                      // 'NOT BETWEEN', 'EXISTS' (only in WP >= 3.5), and 'NOT EXISTS' (also only in WP >= 3.5). Default value is '='.
        ),
        array(
            'key'       => 'price',
            'value'     => array( 1,200 ),
            'compare'   => 'NOT LIKE'
        )
    ), 



    /**
     * ================== 12 ==================
     * Permission Parameters - Show posts if user has the appropriate capability
     * https://developer.wordpress.org/reference/classes/wp_query/#permission-parameters
     *  
     */
    # Display published posts, as well as private posts, if the user has the appropriate capability
    'perm' => 'readable',    //(string) Possible values are 'readable', 'editable'



    /**
     * ================== 13 ==================
     * Mime Type Parameters - Used with the attachments post type.
     * https://developer.wordpress.org/reference/classes/wp_query/#mime-type-parameters
     */
    'post_mime_type' =>  'image/gif', // (string/array) – Allowed mime types. 'image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/tiff', 'image/x-icon'
     # Note:  To exclude certain mime types you first need to get all mime types using get_allowed_mime_types() and run a difference between arrays of what you want and the allowed mime types with array_diff().



    /**
     * ================== 14 ==================
     * Caching Parameters - Stop the data retrieved from being added to the cache.
     * https://developer.wordpress.org/reference/classes/wp_query/#caching-parameters
     */
    # NOTE Caching is a good thing. Setting these to false is generally not advised.
    'cache_results' => true,                //(bool) Default is true - Post information cache.
    'update_post_term_cache' => true,       //(bool) Default is true - Post meta information cache.
    'update_post_meta_cache' => true,       //(bool) Default is true - Post term information cache.
    'no_found_rows' => false,               //(bool) Default is false. WordPress uses SQL_CALC_FOUND_ROWS in most queries in order to implement pagination.
                                            // Even when you donтАЩt need pagination at all. By Setting this parameter to true you are telling wordPress not
                                            // to count the total rows and reducing load on the DB. Pagination will NOT WORK when this parameter is set to true.
                                            // For more information see: http://flavio.tordini.org/speed-up-wordpress-get_posts-and-query_posts-functions
    


    /**
     * ================== 15 ==================
     * Return Fields Parameter - Set return values.
     * https://developer.wordpress.org/reference/classes/wp_query/#return-fields-parameter
     * https://gist.github.com/luetkemj/2023628/#comment-1003542
     */
    'fields' => 'ids'                       //(string) - Which fields to return. All fields are returned by default. 
                                              //Possible values: 
                                              //'ids'        - Return an array of post IDs. 
                                              //'id=>parent' - Return an associative array [ parent => ID, тАж ].
                                              //Passing anything else will return all fields (default) - an array of post objects.


);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
      $the_query->the_post();
	  // Do Stuff
	} // end while
} // endif

// Reset Post Data
wp_reset_postdata();
