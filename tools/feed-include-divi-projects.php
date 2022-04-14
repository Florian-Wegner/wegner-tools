<?php
function myfeedRequest($qv)
{
    if (isset($qv['feed']) && !isset($qv['post_type'])) {
        $qv['post_type'] = array('post', 'project');
    }

    return $qv;
}
add_filter('request', 'myfeedRequest');
