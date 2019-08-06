<?php

/***
 * Name:       TinyMVC
 * About:      An MVC application framework for PHP
 * Copyright:  (C) 2007, New Digital Group Inc.
 * Author:     Monte Ohrt, monte [at] ohrt [dot] com
 * License:    LGPL, see included license file  
 ***/

/* PHP error reporting level, if different from default */
error_reporting(E_ALL);

/* define to 0 if you want errors/exceptions handled externally */
define('TMVC_ERROR_HANDLING',0);

/* directory separator alias */
if(!defined('DS'))
  define('DS',DIRECTORY_SEPARATOR);

/* set the base directory */
if(!defined('TMVC_BASEDIR'))
  define('TMVC_BASEDIR', __DIR__ . DS . 'tinymvc' . DS);

/* if the /tinymvc/ dir is not up one directory, uncomment and set here */
//define('TMVC_BASEDIR','../tinymvc/');

/* if the /myapp/ dir is not inside the /tinymvc/ dir, uncomment and set here */
//define('TMVC_MYAPPDIR','/path/to/myapp/');

/* include the config */
require(TMVC_BASEDIR . 'myapp' . DS . 'configs' . DS . 'config_global.php');

if(!defined('ASSETS_URL')){
  define('ASSETS_URL', BASE_URL . 'assets');
}

if(!defined('URL')){
  if(REWRITE):
    define('URL', BASE_URL);
  else:
    define('URL', BASE_URL . 'index.php/');
  endif;
}

/* Start the session system */
session_start();

/* include main tmvc class */
require(TMVC_BASEDIR . 'sysfiles' . DS . 'TinyMVC.php');

/* instantiate */
$tmvc = new tmvc();

/* tally-ho! */
$tmvc->main();

?>
