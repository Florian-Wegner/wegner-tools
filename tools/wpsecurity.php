<?php
/** Backend themes and plugins - disallow editing **/
define('DISALLOW_FILE_EDIT', true);

/** Hide Usernames from Classes **/
function wegnerAndysRemoveCommentAuthorClass($classes)
{
    foreach ($classes as $key => $class) {
        if (strstr($class, "comment-author-")) {
            unset($classes[$key]);
        }
    }
    return $classes;
}
add_filter('comment_class', 'wegnerAndysRemoveCommentAuthorClass');

/** Hide WordPress Version in Sourcecode Head **/
remove_action('wp_head', 'wp_generator');

/** Protect your blog from malicious URL requests with a plugin **/
global $user_ID;
if ($user_ID) {
    if (!current_user_can('level_10')) {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
            strpos($_SERVER['REQUEST_URI'], "eval(") ||
            strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
            strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            strpos($_SERVER['REQUEST_URI'], "base64")) {
            @header("HTTP/1.1 414 Request-URI Too Long");
            @header("Status: 414 Request-URI Too Long");
            @header("Connection: Close");
            @exit;
        }
    }
}

/** Disable WordPress Embeds **/
function wegnerDisableEmbedsCodeInit()
{
    add_filter('embed_oembed_discover', '__return_false');
    add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
    remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'wegnerDisableEmbedsCodeInit', 9999);

/** Disable XML-RPC interface **/
add_filter('xmlrpc_enabled', '__return_false');

/** Disable XPingback **/
function wegnerWpsRemoveXPingback($headers)
{
    unset($headers['X-Pingback']);
    unset($headers['Pingback']);
    return $headers;
}
add_filter('wp_headers', 'wegnerWpsRemoveXPingback');
