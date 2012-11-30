<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Base sessions class.
 *
 * @package    Sessions
 * @category   Exceptions
 * @author     Kohana Team, Michał Musiał
 * @copyright  Original code (c) 2008-2011 Kohana Team, modifications (c) 2012 Michał Musiał
 * @license    http://kohanaframework.org/licenselicense
 */
class Sessions_Exception extends Kohana_Exception
{
	const SESSION_CORRUPT = 1;
}
