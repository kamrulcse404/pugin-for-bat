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

                    <!-- <p><a href="mailto:someone@example.com" class="btn btn-primary" id="customBatBtn">Email for custom bat</a></p> -->
                    <p class="btn btn-primary" id="customBatBtn">Email for custom bat</p>
                </div>
            </div>

    <?php
        }

        wp_reset_postdata();
    }

    ?>


    <!-- Example modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Custom Bat Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="customBatForm" ajax_url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                    </form>
                </div> <!-- Move the closing div tag for the form here -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" id="sendEmailBtn">Send Email</button>
                </div>
            </div>
        </div>
    </div>






<?php


    wp_die();
}

add_action('wp_ajax_get_products_by_taxonomy', 'get_products_by_taxonomy');
add_action('wp_ajax_nopriv_get_products_by_taxonomy', 'get_products_by_taxonomy');




function get_custom_form_email()
{
    // Check if the necessary data is present in the POST request
    if (isset($_POST['name']) && isset($_POST['email'])) {
        // Sanitize the form input values
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);

        // Compose the email subject and message
        $subject = 'Custom Bat Form Submission';
        $body = "Name: $name\n";
        $body .= "Email: $email\n";

        // Email headers
        $headers = array('Content-Type: text/html; charset=UTF-8');

        // Replace the following with your Mailtrap SMTP settings
        $mailtrap_username = 'dd723a540dede2';
        $mailtrap_password = '8eb1242054fc0a';
        $mailtrap_host = 'sandbox.smtp.mailtrap.io';
        $mailtrap_port = 2525; // You can try different ports: 25, 465, 587, or 2525

        // Set up Mailtrap as the mailer
        add_action('phpmailer_init', function ($phpmailer) use ($mailtrap_username, $mailtrap_password, $mailtrap_host, $mailtrap_port) {
            $phpmailer->isSMTP();
            $phpmailer->Host = $mailtrap_host;
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = $mailtrap_port;
            $phpmailer->Username = $mailtrap_username;
            $phpmailer->Password = $mailtrap_password;
            $phpmailer->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' based on your Mailtrap settings
        });

        $to = 'your_email@example.com'; // Replace with your actual email address

        // Send the email
        if (wp_mail($to, $subject, $body, $headers)) {
            // Send JSON success response
            wp_send_json_success(array('message' => 'Thank you for contacting us. We will get back to you soon'));
        } else {
            // Send JSON error response
            wp_send_json_error(array('message' => 'Error sending email. Please try again later.'));
        }
    }

    wp_die();
}

add_action('wp_ajax_get_custom_form_email', 'get_custom_form_email');
add_action('wp_ajax_nopriv_get_custom_form_email', 'get_custom_form_email');
