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
3.
```php
'multiple-sessions' => MODPATH.'multiple-sessions', // Multiple Sessions Support
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
    Sessions_Cookie::destroy_cookie('my_cookie_name');
    // You may want to redirect now to a login screen.
    $this->request->redirect('login');
}
```

## Q&A

### Why would I need support for multiple sessions?

If your application consists of multiple sub-applications you may want to keep
the sessions separate, e.g. at different paths. This might be a very rare
situation, but it happened to me, may as well happen to you. This module gives
you the ability to have as many sessions as you wish.

### Why there's no native driver?

PHP supports only one native session, so this module's not going to change it.
If you want to use native session driver, use Kohana's Session class instead.
