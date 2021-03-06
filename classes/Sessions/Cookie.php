<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Cookie-based sessions class.
 *
 * @package    Sessions
 * @category   Drivers
 * @author     Kohana Team, Michał Musiał
 * @copyright  Original code (c) 2008-2011 Kohana Team, modifications (c) 2012 Michał Musiał
 * @license    http://kohanaframework.org/license
 */
class Sessions_Cookie extends Sessions
{
    /**
     * @param   string  $id  session id
     * @return  string
     */
    protected function _read($id = NULL)
    {
        $default_path = Cookie::$path;
        Cookie::$path = $this->_path;
        $value = Cookie::get($this->_name, NULL);
        Cookie::$path = $default_path;

        return $value;
    }

    /**
     * @return  null
     */
    protected function _regenerate()
    {
        // Cookie sessions have no id
        return NULL;
    }

    /**
     * @return  bool
     */
    protected function _write()
    {
        $default_path = Cookie::$path;
        Cookie::$path = $this->_path;
        $set = Cookie::set($this->_name, $this->__toString(), $this->_lifetime);
        Cookie::$path = $default_path;

        return $set;
    }

    /**
     * @return  bool
     */
    protected function _restart()
    {
        return TRUE;
    }

    /**
     * @return  bool
     */
    protected function _destroy()
    {
        return Sessions::destroy_cookie($this->_name);
    }
}
