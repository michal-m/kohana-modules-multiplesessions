<?php defined('SYSPATH') or die('No direct script access.');

return array(
    'session' => array(
        'type'      => 'cookie',
        'encrypted' => FALSE,
        'lifetime'  => 43200,
        'path'      => '',
    ),
    'session_2' => array(
        'type'      => 'database',
        'encrypted' => TRUE,
        'lifetime'  => 43200,
        'path'      => '',
        'group'     => 'default',
        'table'     => 'sessions',
        'columns'   => array(
            'session_id'  => 'id',
            'last_active' => 'last_active',
            'contents'    => 'contents'
        ),
        'gc'        => 500,
    ),
);
