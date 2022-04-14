<?php
/**
 * Plugin Name:  Wegner Tools
 * Plugin URI:   https://wordpress.org/plugins/wegner-tool/
 * Description:  A small tools for enabling and disabling code snippets via checkboxes
 * Author:       Florian Wegner
 * Author URI:   https://wwww.von-wegner.de/
 * Version:      0.8.2
 * Text Domain:  wegner-tools
 *
 * @package    wegner-tools
 * @author     Florian Wegner <info@von-wegner.de>
 * @copyright  Copyright 2020 Florian Wegner
 * @license    http://www.gnu.org/licenses/gpl.txt GPL 2.0
 * @link       https://wordpress.org/plugins/wegner-tools/
 */

//namespace Wegner;

if (!defined('ABSPATH')) {
    exit;
}

// add Settings link
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'nc_settings_link');
function ncSettingsLink($links)
{
    $url = esc_url(add_query_arg(
        'page',
        'wegner-tools',
        get_admin_url() . 'admin.php'
    ));
    $settings_link = "<a href='$url'>" . __('Settings') . '</a>';
    array_push(
        $links,
        $settings_link
    );
    return $links;
}

// start Plugin
require_once __DIR__ . '/settingsPage.php';
$wegner_tools_options = get_option('wegner_tools_option_name'); // Array of All Options

// check DB option exist
if ($wegner_tools_options !== null && $wegner_tools_options !== false) {
    // Options get end embed functions
    $wp_security_functions_0 = $wegner_tools_options['wp_security_functions_0']; // WP Security
    $rss_feed_contains_divi_projects_1 = $wegner_tools_options['rss_feed_contains_divi_projects_1']; // Feed include Divi Projects
    $divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2 = $wegner_tools_options['divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2']; // Divi Image Auto-Update Alt & Title
    $rename_divi_projects_3 = $wegner_tools_options['rename_divi_projects_3']; // Divi Rename Projects

    if ($wp_security_functions_0) {
        require_once __DIR__ . '/tools/wpsecurity.php';
    }
    if ($rss_feed_contains_divi_projects_1) {
        require_once __DIR__ . '/tools/feed-include-divi-projects.php';
    }
    if ($divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2) {
        require_once __DIR__ . '/tools/divi-image-auto-update.php';
    }
    if ($rename_divi_projects_3) {
        require_once __DIR__ . '/tools/divi-rename-projects.php';
    }
} else {
    // Empty options
    $wegner_tools_options = array();
    $wegner_tools_options['wp_security_functions_0'] = "wp_security_functions_0"; // WP Security
    $wegner_tools_options['rss_feed_contains_divi_projects_1'] = "rss_feed_contains_divi_projects_1"; // Feed include Divi Projects
    $wegner_tools_options['divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2'] = "divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2"; // Divi Image Auto-Update Alt & Title
    $wegner_tools_options['rename_divi_projects_3'] = null; // Divi Rename Projects

    if (strpos(get_locale(), "de") !== false) {
        $wegner_tools_options['rename_divi_projects_plural_name_4'] = 'Projekte'; // Divi Rename Projects - Plural Name
        $wegner_tools_options['rename_divi_projects_singular_name_5'] = 'Projekt'; // Divi Rename Projects - Singular Name
        $wegner_tools_options['rename_divi_projects_slug_6'] = "projekt"; // Divi Rename Projects - Slug
        $wegner_tools_options['divi_rename_projects_category_name_7'] = 'Projekt Kategorie'; // Divi Rename Projects - Category Name
        $wegner_tools_options['rename_divi_projects_category_slug_8'] = 'projekt-kategorie'; // Divi Rename Projects - Category Slug
        $wegner_tools_options['rename_divi_projects_tag_name_9'] = 'Projekt Tag'; // Divi Rename Projects - Tag Name
        $wegner_tools_options['rename_divi_projects_tag_slug_10'] = 'projekt-tag'; // Divi Rename Projects - Tag Slug
    } else {
        $wegner_tools_options['rename_divi_projects_plural_name_4'] = 'Projects'; // Divi Rename Projects - Plural Name
        $wegner_tools_options['rename_divi_projects_singular_name_5'] = 'Project'; // Divi Rename Projects - Singular Name
        $wegner_tools_options['rename_divi_projects_slug_6'] = "projects"; // Divi Rename Projects - Slug
        $wegner_tools_options['divi_rename_projects_category_name_7'] = 'Project Category'; // Divi Rename Projects - Category Name
        $wegner_tools_options['rename_divi_projects_category_slug_8'] = 'project-category'; // Divi Rename Projects - Category Slug
        $wegner_tools_options['rename_divi_projects_tag_name_9'] = 'Project Tag'; // Divi Rename Projects - Tag Name
        $wegner_tools_options['rename_divi_projects_tag_slug_10'] = 'project-tag'; // Divi Rename Projects - Tag Slug
    }

    echo update_option('wegner_tools_option_name', $wegner_tools_options);
}

// END
