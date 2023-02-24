<?php

defined('DS') ?: define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ?: define('SITE_ROOT', dirname(__FILE__, 2));
defined('INC_PATH') ?: define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH') ?: define('CORE_PATH', SITE_ROOT.DS.'core');

require_once(INC_PATH.DS.'config.php');

require_once(CORE_PATH.DS.'Post.php');
require_once(CORE_PATH.DS.'Category.php');
