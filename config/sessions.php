<?php defined('SYSPATH') or die('No direct script access.');

return array(
    /**
     * The following options must be set:
     *
     * string   type        session driver type (cookie|database)
     * boolean  encrypted   whether to encrypt session data
     * integer  lifetime    session lifetime in seconds
     * string   path        cookie path
     */
    'session' => array(
        'type'      => 'cookie',
        'encrypted' => FALSE,
        'lifetime'  => 43200,
        'path'      => '',
    ),
    'session_db' => array(
        'type'      => 'database',
        'encrypted' => TRUE,
        'lifetime'  => 43200,
        'path'      => '',
        /**
         * DB Specific configuration.
         */
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
