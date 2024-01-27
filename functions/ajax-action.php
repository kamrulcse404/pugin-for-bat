<?php

function get_products_by_taxonomy()
{

    $formdata = [];
    wp_parse_str($_POST['get_products_by_taxonomy'], $formdata);

    // print_r($formdata);

    $selected_size = '';
    if (isset($formdata['size']) && $formdata['size'] != "") {
        $selected_size = array(
            array(
                'taxonomy' => 'size',
                'field' => 'term_id',
                'terms' => $formdata['size'],
            ),
        );
    }


    $selected_weight = '';
    if (isset($formdata['weight']) && $formdata['weight'] != "") {
        $selected_weight = array(
            array(
                'taxonomy' => 'weight',
                'field' => 'term_id',
                'terms' => $formdata['weight'],
            ),
        );
    }


    $selected_position = '';
    if (isset($formdata['position']) && $formdata['position'] != "") {
        $selected_position = array(
            array(
                'taxonomy' => 'position',
                'field' => 'term_id',
                'terms' => $formdata['position'],
            ),
        );
    }


    $selected_shape = '';
    if (isset($formdata['shape']) && $formdata['shape'] != "") {
        $selected_shape = array(
            array(
                'taxonomy' => 'shape',
                'field' => 'term_id',
                'terms' => $formdata['shape'],
            ),
        );
    }


    $selected_scoop = '';
    if (isset($formdata['scoop']) && $formdata['scoop'] != "") {
        $selected_scoop = array(
            array(
                'taxonomy' => 'scoop',
                'field' => 'term_id',
                'terms' => $formdata['scoop'],
            ),
        );
    }


    $selected_edge_shape = '';
    if (isset($formdata['edge_shape']) && $formdata['edge_shape'] != "") {
        $selected_edge_shape = array(
            array(
                'taxonomy' => 'edge_shape',
                'field' => 'term_id',
                'terms' => $formdata['edge_shape'],
            ),
        );
    }


    $selected_toe_size = '';
    if (isset($formdata['toe_size']) && $formdata['toe_size'] != "") {
        $selected_toe_size = array(
            array(
                'taxonomy' => 'toe_size',
                'field' => 'term_id',
                'terms' => $formdata['toe_size'],
            ),
        );
    }



    $posts = new WP_Query(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
            $selected_size,
            $selected_weight,
            $selected_position,
            $selected_shape,
            $selected_scoop,
            $selected_edge_shape,
            $selected_toe_size,
        )
    ));


    // echo '<pre>' ; 
    // print_r($posts) ;


    if ($posts->have_posts()) {
        while ($posts->have_posts()) {


            $posts->the_post();
            $product = wc_get_product(get_the_ID());


            // echo '<pre>' ; 
            // print_r(the_title()) ;

?>

            <div class="my_single_product" style="margin-bottom: 20px;">
                <div class="single_product_img">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </div>
                <div class="single_product_details">
                    <h3><?php the_title(); ?></h3>
                    <p>Description: <?php echo wp_trim_words(get_post_field('post_content', get_the_ID()), 15); ?></p>
                    <p>Price: <?php echo $product->get_price_html(); ?></p>
                    <p class="btn btn-primary" id="customBatBtn">Email for custom bat</p>
                </div>
            </div>

<?php
        }

        wp_reset_postdata();
    }


    wp_die();
}

add_action('wp_ajax_get_products_by_taxonomy', 'get_products_by_taxonomy');
add_action('wp_ajax_nopriv_get_products_by_taxonomy', 'get_products_by_taxonomy');
