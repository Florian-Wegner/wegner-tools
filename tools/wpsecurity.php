<?php
/** Backend Themes und Plugins - Editieren verbieten **/
define('DISALLOW_FILE_EDIT', true);

/** CSS-Dateien dequeuen und entfernen  **/
function wegnerDpDequeueUnusedStyles()
{
    //wp_dequeue_script( 'wp-mediaelement' );
    //wp_dequeue_script( 'mediaelement-and-player.min' );
}
add_action('wp_enqueue_scripts', 'wegnerDpDequeueUnusedStyles');
function wegnerDpDequeueToppostsStyles()
{
    //wp_dequeue_style( 'mediaelement' );
    //wp_deregister_style( 'mediaelement' );
    //wp_dequeue_style( 'wp-mediaelement' );
    //wp_deregister_style( 'wp-mediaelement' );
    wp_dequeue_style('wp-block-library');
}
add_action('wp_print_styles', 'wegnerDpDequeueToppostsStyles');

/** Hide Usernames from Classes & Hide WordPress Version in Sourcecode Head **/
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
remove_action('wp_head', 'wp_generator');

/** Schützen Sie Ihr Blog mit einem Plugin vor bösartigen URL-Anfragen **/
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

/** Deaktiviere Embeds in WordPress **/
function wegnerDisableEmbedsCodeInit()
{
    add_filter('embed_oembed_discover', '__return_false');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
    add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
    remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
}
add_action('init', 'wegnerDisableEmbedsCodeInit', 9999);

function wegnerDisableEmbedsTinyMcePlugin($plugins)
{
    return array_diff($plugins, array('wpembed'));
}
function wegnerDisableEmbedsRewrites($rules)
{
    foreach ($rules as $rule => $rewrite) {
        if (false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

/** XML-RPC Schnittstelle deaktivieren **/
add_filter('xmlrpc_enabled', '__return_false');
function wegnerWpsRemoveXPingback($headers)
{
    unset($headers['X-Pingback']);
    unset($headers['Pingback']);
    return $headers;
}
add_filter('wp_headers', 'wegnerWpsRemoveXPingback');

/** Add to .htaccess
<Files xmlrpc.php>
Order Deny,Allow
Deny from all
</Files>
 **/
