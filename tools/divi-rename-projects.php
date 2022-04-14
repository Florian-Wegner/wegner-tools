<?php
function dcRenommerProjetsDivi()
{
    // get Options
    $wegner_tools_options = get_option('wegner_tools_option_name'); // Array of All Options
    $rename_divi_projects_plural_name_4 = $wegner_tools_options['rename_divi_projects_plural_name_4']; // Divi Rename Projects - Plural Name
    $rename_divi_projects_singular_name_5 = $wegner_tools_options['rename_divi_projects_singular_name_5']; // Divi Rename Projects - Singular Name
    $rename_divi_projects_slug_6 = $wegner_tools_options['rename_divi_projects_slug_6']; // Divi Rename Projects - Slug
    $divi_rename_projects_category_name_7 = $wegner_tools_options['divi_rename_projects_category_name_7']; // Divi Rename Projects - Category Name
    $rename_divi_projects_category_slug_8 = $wegner_tools_options['rename_divi_projects_category_slug_8']; // Divi Rename Projects - Category Slug
    $rename_divi_projects_tag_name_9 = $wegner_tools_options['rename_divi_projects_tag_name_9']; // Divi Rename Projects - Tag Name
    $rename_divi_projects_tag_slug_10 = $wegner_tools_options['rename_divi_projects_tag_slug_10']; // Divi Rename Projects - Tag Slug

    // plural name
    if ($rename_divi_projects_plural_name_4 && $rename_divi_projects_plural_name_4 !== "") {
        $new_plural_name = $rename_divi_projects_plural_name_4;
    } else {
        $new_plural_name = 'Projects';
    }

    // singular name
    if ($rename_divi_projects_singular_name_5 && $rename_divi_projects_singular_name_5 !== "") {
        $new_plural_name = $rename_divi_projects_singular_name_5;
    } else {
        $new_singular_name = 'Project';
    }

    // slug
    if ($rename_divi_projects_slug_6 && $rename_divi_projects_slug_6 !== "") {
        $new_slug = $rename_divi_projects_slug_6;
    } else {
        $new_slug = 'projects';
    }

    // category name
    if ($divi_rename_projects_category_name_7 && $divi_rename_projects_category_name_7 !== "") {
        $new_category_name = $divi_rename_projects_category_name_7;
    } else {
        $new_category_name = 'Project Category';
    }

    // category slug
    if ($rename_divi_projects_category_slug_8 && $rename_divi_projects_category_slug_8 !== "") {
        $new_category_slug = $rename_divi_projects_category_slug_8;
    } else {
        $new_category_slug = 'project-category';
    }

    // category name
    if ($rename_divi_projects_tag_name_9 && $rename_divi_projects_tag_name_9 !== "") {
        $new_tag_name = $rename_divi_projects_tag_name_9;
    } else {
        $new_tag_name = 'Project Tag';
    }

    // category slug
    if ($rename_divi_projects_tag_slug_10 && $rename_divi_projects_tag_slug_10 !== "") {
        $new_tag_slug = $rename_divi_projects_tag_slug_10;
    } else {
        $new_tag_slug = 'project-tag';
    }

    // register
    register_post_type('project',
        array(
            'labels' => array(
                'name' => __($new_plural_name, 'divi'),
                'singular_name' => __($new_plural_name, 'divi'),

            ),
            'has_archive' => true,
            'hierarchical' => true,
            'public' => true,
            'rewrite' => array('slug' => $new_slug, 'with_front' => false),
            'supports' => array(),
            'menu_icon' => 'dashicons-marker',
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
            'rewrite' => array('slug' => $new_category_slug, 'with_front' => true),
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
            'rewrite' => array('slug' => $new_tag_slug, 'with_front' => true),
        ));
}

add_action('init', 'dcRenommerProjetsDivi');

// Order
/**
add_action( 'parse_query', function( $vars ) {
if ( 'project' == $vars->query['post_type'] ||  $new_plural_name == $vars->query['post_type'])
{
$vars->set( 'orderby', 'title' );
$vars->set( 'order', 'ASC' );
}
});
 **/
