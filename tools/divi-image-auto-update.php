<?php
// ALT-Tags aus der Mediathek auslesen
// ========================================================================== //
function getImageMeta($image, $type = 'alt')
{
    if (!$image) {
        return '';
    }

    $output = '';

    if ('/' === $image[0]) {
        $post_id = attachment_url_to_postid(home_url() . $image);
    } else {
        $post_id = attachment_url_to_postid($image);
    }

    if ($post_id && 'title' === $type) {
        $output = get_post($post_id)->post_title;
    }

    if ($post_id && 'alt' === $type) {
        $output = get_post_meta($post_id, '_wp_attachment_image_alt', true);
    }

    return $output;
}
/* Aktualisiert image alt text in Modulen */
function updateModuleAltText($attrs, $unprocessed_attrs, $slug)
{
    if (($slug === 'et_pb_image' || $slug === 'et_pb_fullwidth_image') && '' === $attrs['alt']) {
        $attrs['alt'] = getImageMeta($attrs['src']);
        $attrs['title_text'] = getImageMeta($attrs['src'], 'title');
    } elseif ($slug === 'et_pb_blurb' && 'off' === $attrs['use_icon'] && '' === $attrs['alt']) {
        $attrs['alt'] = getImageMeta($attrs['image']);
    } elseif ($slug === 'et_pb_slide' && '' !== $attrs['image'] && '' === $attrs['image_alt']) {
        $attrs['image_alt'] = getImageMeta($attrs['image']);
    } elseif ($slug === 'et_pb_fullwidth_header') {
        if ('' !== $attrs['logo_image_url'] && '' === $attrs['logo_alt_text']) {
            $attrs['logo_alt_text'] = getImageMeta($attrs['logo_image_url']);
        }

        if ('' !== $attrs['header_image_url'] && '' === $attrs['image_alt_text']) {
            $attrs['image_alt_text'] = getImageMeta($attrs['header_image_url']);
        }
    }

    return $attrs;
}
/* Filter injection */
add_filter('et_pb_module_shortcode_attributes', 'updateModuleAltText', 20, 3);
