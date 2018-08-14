<?php
 
//
// Sanitize all dangerous PHP super globals.
//
// The FILTER_SANITIZE_STRING filter removes tags and remove or encode special
// characters from a string.
//
// Possible options and flags:
//
//   FILTER_FLAG_NO_ENCODE_QUOTES - Do not encode quotes
//   FILTER_FLAG_STRIP_LOW        - Remove characters with ASCII value < 32
//   FILTER_FLAG_STRIP_HIGH       - Remove characters with ASCII value > 127
//   FILTER_FLAG_ENCODE_LOW       - Encode characters with ASCII value < 32
//   FILTER_FLAG_ENCODE_HIGH      - Encode characters with ASCII value > 127
//   FILTER_FLAG_ENCODE_AMP       - Encode the "&" character to &amp;
//
//
// <?php
//
// // Variable to check
// $str = "<h1>Hello WorldÆØÅ!</h1>";
//
// // Remove HTML tags and all characters with ASCII value > 127
// $newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
// echo $newstr;
//  -> Hello World!
//
//
 
foreach ($_GET as $key => $value)
{
    $_GET[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING);
}
 
foreach ($_POST as $key => $value)
{
    $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
}
 
foreach ($_COOKIE as $key => $value)
{
    $_COOKIE[$key] = filter_input(INPUT_COOKIE, $key, FILTER_SANITIZE_STRING);
}
 
foreach ($_SERVER as $key => $value)
{
    $_SERVER[$key] = filter_input(INPUT_SERVER, $key, FILTER_SANITIZE_STRING);
}
 
foreach ($_ENV as $key => $value)
{
    $_ENV[$key] = filter_input(INPUT_ENV, $key, FILTER_SANITIZE_STRING);
}
 
$_REQUEST = array_merge($_GET, $_POST);

unction my_sanitize_number($number) {
    return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
}

function my_sanitize_decimal($decimal) {
    return filter_var($decimal, FILTER_SANITIZE_NUMBER_FLOAT);
}

function my_sanitize_string($string) {
    $string = strip_tags($string);
    $string = addslashes($string);
    return filter_var($string, FILTER_SANITIZE_STRING);
}

function my_sanitize_html($string) {
    $string = strip_tags($string, '<a><strong><em><hr><br><p><u><ul><ol><li><dl><dt><dd><table><thead><tr><th><tbody><td><tfoot>');
    $string = addslashes($string);
    return filter_var($string, FILTER_SANITIZE_STRING);
}

function my_sanitize_url($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
}

function my_sanitize_slug($string) {
    $string = str_slug($string);
    return filter_var($string, FILTER_SANITIZE_URL);
}

function my_sanitize_email($string) {
    return filter_var($string, FILTER_SANITIZE_EMAIL);
}