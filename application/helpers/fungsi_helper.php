<?php

function json($data = null)
{
    $ci = &get_instance();

    return $ci->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
}
