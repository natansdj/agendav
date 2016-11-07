<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_system'] = array(
		'class' => 'Defs',
		'function' => 'definitions',
		'filename' => 'Defs.php',
		'filepath' => 'hooks',
		);

// Avoid problems when date.timezone is not set on php.ini
$hook['pre_controller'] = array(
		'class' => 'Defs',
		'function' => 'default_tz',
		'filename' => 'Defs.php',
		'filepath' => 'hooks',
		);




/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
