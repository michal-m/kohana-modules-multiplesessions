Kohana Multiple Sessions Module
===============================

Multiple Sessions module for Kohana PHP Framework

## Features

- Support for multiple sessions within an application
- Cookie and Database session drivers
- Possibility to delete corrupted sessions (addresses [Kohana's issue #4669](http://dev.kohanaframework.org/issues/4669]))

## Installation

1. Copy and paste files and folders to `MODPATH/multiple-sessions`.
2. Copy `MODPATH/multiple-sessions/config/sessions.php` to your `APPPATH/config` folder.
3. Add this entry under `Kohana::modules` array in `APPPATH/bootstrap.php`:

```php
'multiple-sessions' => MODPATH.'multiple-sessions', // Multiple Sessions Support
```

## Configuration

You can configure your sessions and their cookies in your `APPPATH/config/sessions.php`
file. This module provides support for 2 types of session drivers - cookie and
database. Both has some basic configuration:

```php
return array(
    /**
     * The following options must be set:
     *
     * string   type        session driver type (cookie|database)
     * boolean  encrypted   whether to encrypt session data
     * integer  lifetime    session lifetime in seconds
     * string   path        cookie path
     */
    'session_cookie_name' => array(
        'type'      => 'cookie',
        'encrypted' => FALSE,
        'lifetime'  => 43200,
        'path'      => '',
    ),
);
```

Additionally, database type, has DB specific configuration, based on Kohana's
own:

```php
return array(
    'db_session_cookie_name' => array(
        /**
         * Basic config
         */
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
```

## Usage

This modules mimics the usage of Kohana's native Session helper. The only
difference is that you retrieve an instance of the session by using `name`
parameter instead of `type`. E.g.:

```php
$session = Sessions::instance('my_cookie_name');
```

### Destroying session cookies with corrupted data.

If you want to cover the situation where visitors session cookie data is
corrupted and you want to aviod showing an error you're now able to destroy the
cookie. E.g.:

```php
// Inside your controller
try
{
    Sessions::instance('my_cookie_name');
}
catch (Exception $e)
{
    Sessions::destroy_cookie('my_cookie_name');
    // You may want to redirect now to a login screen.
    $this->redirect('login');
}
```

## Q&A

### Why would I need support for multiple sessions?

If your application consists of multiple sub-applications you may want to keep
the sessions separate, e.g. at different paths. This might be a very rare
situation, but it happened to me, may as well happen to you. This module gives
you the ability to have as many sessions as you wish.
