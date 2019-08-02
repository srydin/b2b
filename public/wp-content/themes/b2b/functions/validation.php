<?php

// adapted from kevin skoglund

// is_blank('abcd')
// * validate data presence
// * uses trim() so empty spaces don't count
// * uses === to avoid false positives
// * better than empty() which considers "0" to be empty
function is_blank($value) {
    return !isset($value) || trim($value) === '';
}

// has_presence('abcd')
function has_presence($value) {
    return !is_blank($value);
}

// has_length_greater_than('abcd', 3)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
}

// has_length_less_than('abcd', 5)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
}

// has_valid_email_format('nobody@nowhere.com')
// * validate correct format for email addresses
// * format: [chars]@[chars].[2+ letters]
// * preg_match is helpful, uses a regular expression
//    returns 1 for a match, 0 for no match
//    http://php.net/manual/en/function.preg-match.php
function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
}

function validate_review_data($args=[]){
    $_SESSION['errors'] = "";
    $return = true;
    if ( has_length_less_than( $args['review_text_unmoderated'], Review::MIN_REVIEW_LENGTH_CHARS ) ){
        $_SESSION['errors'] .= "Please lengthen your review. ";
        $return = false;
    }

    if ( has_length_less_than( $args['first_name'], 2 ) ){
        $_SESSION['errors'] .= "Please add your complete first name. ";
        $return = false;
    } // etc

    if ( has_length_less_than( $args['last_name'], 2 ) ){
        $_SESSION['errors'] .= "Please add your complete last name. ";
        $return = false;
    } // etc

    if ( !has_valid_email_format( $args['email']) ){
        $_SESSION['errors'] .= "Please add a valid email. ";
        $return = false;
    } // etc

    if ( has_length_less_than( $args['city'], 2 ) ){
        $_SESSION['errors'] .= "Please add your complete city name. ";
        $return = false;
    } // etc

    if ( has_length_less_than( $args['state'], 2 ) ){
        $_SESSION['errors'] .= "Please add your state name. ";
        $return = false;
    } // etc

    return $return;
}