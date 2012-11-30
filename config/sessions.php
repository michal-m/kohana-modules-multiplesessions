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
        'group'     => 'default',
        'table'     => 'table_name',
        'columns'   => array(
            'session_id'  => 'session_id',
            'last_active' => 'last_active',
            'contents'    => 'contents'
        ),
        'gc'        => 500,
    ),
);
