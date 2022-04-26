<?php
/**
 * Plugin Name:  Wegner Tools
 * Plugin URI:   https://wordpress.org/plugins/wegner-tool/
 * Description:  A small tools for enabling and disabling code snippets via checkboxes
 * Author:       Florian Wegner
 * Author URI:   https://wwww.von-wegner.de/
 * Version:      1.0.2
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

/** start main Plugin **/
$wegner_plugin_version = '1.0.2';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/settingsPage.php';

// check DB option exist
$wegner_tools_options = get_option('wegner_tools_option_name');
if ($wegner_tools_options !== null && $wegner_tools_options !== false) {
    if (wegnerCheckValidOption("wp_security_functions_0")) {
        // WP Security
        require_once __DIR__ . '/tools/wpsecurity.php';
    }
    if (wegnerCheckValidOption("rss_feed_contains_divi_projects_1")) {
        // Feed include Divi Projects
        require_once __DIR__ . '/tools/feed-include-divi-projects.php';
    }
    if (wegnerCheckValidOption("divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2")) {
        // Divi Image Auto-Update Alt & Title
        require_once __DIR__ . '/tools/divi-image-auto-update.php';
    }
    if (wegnerCheckValidOption("rename_divi_projects_3")) {
        // Divi Rename Projects
        require_once __DIR__ . '/tools/divi-rename-projects.php';
    }
} else {
    // Empty options
    $wegner_tools_options = array();
    $wegner_tools_options['wegner_plugin_version'] = $wegner_plugin_version;
    $wegner_tools_options['wp_security_functions_0'] = "wp_security_functions_0"; // WP Security
    $wegner_tools_options['rss_feed_contains_divi_projects_1'] = "rss_feed_contains_divi_projects_1"; // Feed include Divi Projects
    $wegner_tools_options['divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2'] = "divi_builder_changes_to_images_are_automatically_reflected_in_the_media_2"; // Divi Image Auto-Update Alt & Title
    $wegner_tools_options['rename_divi_projects_3'] = null; // Divi Rename Projects
    update_option('wegner_tools_option_name', $wegner_tools_options);
}
/** end main Plugin **/

/** Write Unset Options (Text Input) **/
if (strpos(get_locale(), "de") !== false) {
    wegnerWriteUnsetOption('rename_divi_projects_plural_name_4', 'Projekte'); // Divi Rename Projects - Plural Name
    wegnerWriteUnsetOption('rename_divi_projects_singular_name_5', 'Projekt'); // Divi Rename Projects - Singular Name
    wegnerWriteUnsetOption('rename_divi_projects_slug_6', 'projekte'); // Divi Rename Projects - Slug
    wegnerWriteUnsetOption('divi_rename_projects_category_name_7', 'Projekt Category'); // Divi Rename Projects - Category Name
    wegnerWriteUnsetOption('rename_divi_projects_category_slug_8', 'projekt-category'); // Divi Rename Projects - Category Slug
    wegnerWriteUnsetOption('rename_divi_projects_tag_name_9', 'Projekt Tag'); // Divi Rename Projects - Tag Name
    wegnerWriteUnsetOption('rename_divi_projects_tag_slug_10', 'projekt-tag'); // Divi Rename Projects - Tag Slug
    wegnerWriteUnsetOption('rename_divi_projects_menu_icon_11', 'dashicons-marker'); // Divi Rename Projects - menue icon
} else {
    wegnerWriteUnsetOption('rename_divi_projects_plural_name_4', 'Projects'); // Divi Rename Projects - Plural Name
    wegnerWriteUnsetOption('rename_divi_projects_singular_name_5', 'Project'); // Divi Rename Projects - Singular Name
    wegnerWriteUnsetOption('rename_divi_projects_slug_6', 'projects'); // Divi Rename Projects - Slug
    wegnerWriteUnsetOption('divi_rename_projects_category_name_7', 'Project Category'); // Divi Rename Projects - Category Name
    wegnerWriteUnsetOption('rename_divi_projects_category_slug_8', 'project-category'); // Divi Rename Projects - Category Slug
    wegnerWriteUnsetOption('rename_divi_projects_tag_name_9', 'Project Tag'); // Divi Rename Projects - Tag Name
    wegnerWriteUnsetOption('rename_divi_projects_tag_slug_10', 'project-tag'); // Divi Rename Projects - Tag Slug
    wegnerWriteUnsetOption('rename_divi_projects_menu_icon_11', 'dashicons-marker'); // Divi Rename Projects - menue icon
}

/** add Settings link **/
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wegnerPluginLinkSettings');
function wegnerPluginLinkSettings($links)
{
    $new = array(
        'wegner-settings' => sprintf(
            '<a href="%s">%s</a>',
            esc_url(admin_url('options-general.php?page=wegner-tools')),
            esc_html__('Settings', 'wegner-tools')
        ),
        'wegner-help' => sprintf(
            '<a href="%s">%s</a>',
            'mailto:help@von-wegner.de',
            esc_html__('Help', 'wegner-tools')
        ),
        'wegner-github' => sprintf(
            '<a href="%s" target="_blank">%s</a>',
            'https://github.com/Florian-Wegner/wegner-tools',
            esc_html__('GitHub', 'wegner-tools')
        ),
    );
    return array_merge($new, $links);
}
