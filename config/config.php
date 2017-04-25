<?php

define('CONFIG_LOADED',true);
define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/../');
define('CONFIG_DIR',$_SERVER['DOCUMENT_ROOT'].'/../config/');
define('MODEL_DIR',$_SERVER['DOCUMENT_ROOT'].'/../model/');
define('AUTOLOADER_PATH', __DIR__.'/../util/Autoloader.php');
include_once AUTOLOADER_PATH;


