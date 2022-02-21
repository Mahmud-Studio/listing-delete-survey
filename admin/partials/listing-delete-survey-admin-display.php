<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 */
?>

<div class="wrap">

    <h1>Listing Delete Survey</h1>

<?php

    global $wpdb;
    $table_name = $wpdb->prefix . "listing_delete_survey";
    $results = $wpdb->get_results( "SELECT * FROM $table_name ");

    $results_per_page = 20;  
    $number_of_result = $wpdb->num_rows;  

    $number_of_page = ceil ($number_of_result / $results_per_page);  

    //determine which page number visitor is currently on  
    if (!isset ($_GET['paged']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['paged'];  
    }  

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  

    $results = $wpdb->get_results( 
        $wpdb->prepare("SELECT * FROM $table_name ORDER BY date DESC LIMIT %d , %d", $page_first_result, $results_per_page)
    );

?>
    <table class="wp-list-table widefat fixed striped table-view-list pages">
        <thead>
            <tr>
                <th>Username</th>
                <th>Author Name</th>
                <th>Email</th>
                <th>Listing Name</th>
                <th>Reason</th>
                <th>Date</th>
            </tr>

        </thead>
        <tbody>
            <?php

    foreach($results as $data) {

        $user = get_userdata($data->user_id);

        echo "
        <tr>
        <td> <a target='_blank' href='" .get_author_posts_url($data->user_id) ."'>" 
        .$user->user_login ."</a></td>
        <td>" .$user->first_name ." " .$user->last_name ."</td>
        <td>" .$user->user_email ."</td>
        <td>" .$data->title ."</td>
        <td>" .$data->survey ."</td>
        <td>" .$data->date . "</td>
        </tr>
            ";

    } ?>
        </tbody>
    </table>

    <div class="tablenav bottom">
        <!-- Jump Any Page -->
        <form class="alignleft actions bulkactions" action="<?php echo admin_url( "/edit.php"); ?>">
            <input type="hidden" name="post_type" value="rtcl_listing">
            <input type="hidden" name="page" value="listing-delete-survey">
            <input name="paged" min="1" value="<?php echo $page; ?>" max="<?php echo $number_of_page; ?>" type="number">
        <input type="submit" class="button button-primary" value="Jump">
        </form>

        <div class="tablenav-pages">
            <span class="displaying-num"><?php echo $number_of_result; ?> items</span>
            <span class="pagination-links">

            <?php if($page > 1) {; ?>

             <a class="prev-page button" href="<?php echo admin_url( "/edit.php?post_type=rtcl_listing&amp;page=listing-delete-survey&amp;paged=" .$page-1 );  ?>"><span class="screen-reader-text">Previous page</span> <span aria-hidden="true">‹</span>
            </a>
            <?php } else { ?>
                <span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
            <?php } ?>

                <span id="table-paging" class="paging-input">
                    <span class="tablenav-paging-text"> <?php echo $page; ?> of <span class="total-pages"><?php echo $number_of_page ?> </span></span>
                </span>

                <?php if($page < $number_of_page ) {; ?>
                <a class="next-page button" href="<?php echo admin_url( "/edit.php?post_type=rtcl_listing&amp;page=listing-delete-survey&amp;paged=" .$page+1 ); ?>"><span class="screen-reader-text">Next page</span> <span aria-hidden="true">›</span>
                </a>
            <?php } else { ?>
                <span class="tablenav-pages-navspan button disabled" aria-hidden="true">›</span>
            <?php } ?>

            </span>
        </div>
        <br class="clear">
    </div>

</div>