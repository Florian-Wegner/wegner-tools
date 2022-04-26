<?php

/** check option is Valid to string  **/
function wegnerCheckValidOption($optionString, $validString = "")
{
    $wegner_tools_options = get_option('wegner_tools_option_name'); // Array of All Options
    if ($validString == "") {
        $validString = $optionString;
    }
    if (isset($wegner_tools_options[$optionString])) {
        if ($validString == $optionString) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/** get a Valid String or fallback  **/
function wegnerGetValidOption($optionString, $fallback = "")
{
    $wegner_tools_options = get_option('wegner_tools_option_name'); // Array of All Options
    if (isset($wegner_tools_options[$optionString])) {
        if ($wegner_tools_options[$optionString] !== "") {
            return $wegner_tools_options[$optionString];
        } else {
            if ($fallback !== "") {
                return $fallback;
            } else {
                return false;
            }
        }
    } else {
        if ($fallback !== "") {
            return $fallback;
        } else {
            return false;
        }
    }
}

/** IF Text Input unset => setup default Value  **/
function wegnerWriteUnsetOption($optionString, $defaultValueString)
{
    $wegner_tools_options = get_option('wegner_tools_option_name'); // Array of All Options
    if (!isset($wegner_tools_options[$optionString]) || $wegner_tools_options[$optionString] == "") {
        $wegner_tools_options[$optionString] = $defaultValueString;
        update_option('wegner_tools_option_name', $wegner_tools_options);
    }
}

/** Convert String to Slug **/
function wegnerSlugify($slugString, $fallbackString = 'n-a')
{
    $divider = '-';
    $new_slug = $slugString;
    $new_slug = preg_replace('~[^\pL\d]+~u', $divider, $new_slug);
    $new_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $new_slug);
    $new_slug = preg_replace('~[^-\w]+~', '', $new_slug);
    $new_slug = trim($new_slug, $divider);
    $new_slug = preg_replace('~-+~', $divider, $new_slug);
    $new_slug = strtolower($new_slug);

    if (empty($new_slug)) {
        return $fallback;
    }
    return $new_slug;
}
