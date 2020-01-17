<?php

/** Validation Check*/

function multiform_registration_validation($username, $password, $email, $first_name, $last_name)
{
    global $reg_errors;
    $reg_errors = new WP_Error;
    if (empty($username) || empty($password) || empty($email) || empty($first_name) || empty($last_name)) {
        $reg_errors->add('field', 'Required form field is missing');
    } else {
        if (4 > strlen($username)) {
            $reg_errors->add('username_length', 'Username too short. At least 4 characters is required');
        }
        if (username_exists($username)) {
            $reg_errors->add('user_name', 'Sorry, that username already exists!');
        }
        if (5 > strlen($password)) {
            $reg_errors->add('password', 'Password length must be greater than 5');
        }

        if (!is_email($email)) {
            $reg_errors->add('email_invalid', 'Email is not valid');
        }
        if (email_exists($email)) {
            $reg_errors->add('email', 'Email Already in use');
        }
    }
}
/** Registration in WP*/
function multiform_enter($post_all_fields)
{
    global $wpdb;
    extract($post_all_fields);
    foreach ($post_all_fields as $key => $funnels) {
        if ($key == "features") {
            foreach ($post_all_fields['features'] as $key2 => $funnels2) {
                $post_feature[] = $funnels2;
            }
            if (count($post_feature) > 0) {
                $feature_imp = implode(",", $post_feature);
                $post_funnel["entry_features"] = $feature_imp;
            } else {
                $post_funnel["entry_features"] = '';
            }
        } else {
            $post_funnel["entry_" . $key] = $funnels;
        }
    }

    $tablename = $wpdb->prefix . 'funnels';
    $wpdb->insert($tablename, $post_funnel);
    $multiple_recipients = array(
        'codingsnippet@gmail.com',
        'superbwebdeveloper@gmail.com'
    );
    add_filter('wp_mail_content_type', 'set_html_content_type');
    function set_html_content_type()
    {
        return 'text/html';
    }
    $subject = "Cubical Calculator Result";
    $content =
        "First Name: <b>{$post_funnel['entry_first_name']}</b><br>" .
        "Last Name: <b>{$post_funnel['entry_last_name']}</b><br>" .
        "What's your email address?: <b>{$post_funnel['entry_email']}</b><br>" .
        "Approximately how many cubicles or modular furniture units do you need?: <b>{$post_funnel['entry_units']}</b><br>" .
        "Which of the following features are you interested in?: <b>{$post_funnel['entry_features']}</b><br>" .
        "How soon are you looking to have your cubicles delivered?: <b>{$post_funnel['entry_delivered']}</b><br>" .
        "What is your zip code?: <b>{$post_funnel['entry_zipcode']}</b><br>" .
        "Please describe any additional requirements or features you would prefer.: <b>{$post_funnel['entry_requirements']}</b><br>" .
        "Your Job Title: <b>{$post_funnel['entry_job_title']}</b><br>" .
        "Company Name: <b>{$post_funnel['entry_company_name']}</b><br>" .
        "Your Phone Number: <b>{$post_funnel['entry_phone_number']}</b><br>" .
        "Industry you work in: <b>{$post_funnel['entry_company_industry']}</b><br>" .
        "Street Address: <b>{$post_funnel['entry_street_address']}</b><br>" .
        "City: <b>{$post_funnel['entry_city']}</b><br>" .
        "State: <b>{$post_funnel['entry_state']}</b><br>" .
        "Zip Code: <b>{$post_funnel['entry_zip_code']}</b><br>";

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $status = wp_mail($multiple_recipients, $subject, $content, $headers);

    // Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
    remove_filter('wp_mail_content_type', 'set_html_content_type');

    // If status correct then redirect the user to the product page again
    if ($status) {
        $message_info = "Your information has been sent.";

        //  wp_redirect(get_permalink($post));
    } else {
        // if the status of the email is false do something
    }
}
