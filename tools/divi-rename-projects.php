<?php

function wegnerRenameDiviProjets()
{
    $new_plural_name = wegnerGetValidOption("rename_divi_projects_plural_name_4", "Projects");
    $new_singular_name = wegnerGetValidOption("rename_divi_projects_singular_name_5", "Project");
    $new_slug = wegnerGetValidOption("rename_divi_projects_slug_6", "projects");
    $new_category_name = wegnerGetValidOption("divi_rename_projects_category_name_7", "Project Category");
    $new_category_slug = wegnerGetValidOption("rename_divi_projects_category_slug_8", "project-category");
    $new_tag_name = wegnerGetValidOption("rename_divi_projects_tag_name_9", "Project Tag");
    $new_tag_slug = wegnerGetValidOption("rename_divi_projects_tag_slug_10", "project-tag");
    $new_menu_icon = wegnerGetValidOption("rename_divi_projects_menu_icon_11", "dashicons-marker");

    register_post_type('project',
        array(
            'labels' => array(
                'name' => __($new_plural_name, 'divi'),
                'singular_name' => __($new_singular_name, 'divi'),
            ),
            'has_archive' => true,
            'hierarchical' => true,
            'public' => true,
            'rewrite' => array(
                'slug' => wegnerSlugify($new_slug, "projects"),
                'with_front' => false,
            ),
            'supports' => array(),
            'menu_icon' => $new_menu_icon,
        ));

    register_taxonomy('project_category', array('project'),
        array(
            'labels' => array(
                'name' => _x($new_category_name, $new_category_name, 'Divi'),
            ),
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => wegnerSlugify($new_category_slug, "project-category"),
                'with_front' => true,
            ),
        ));

    register_taxonomy('project_tag', array('project'),
        array(
            'labels' => array(
                'name' => _x($new_tag_name, $new_tag_name, 'Divi'),
            ),
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => wegnerSlugify($new_tag_slug, "project-tag"),
                'with_front' => true,
            ),
        ));

    flush_rewrite_rules();
}

add_action('init', 'wegnerRenameDiviProjets');
