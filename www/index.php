<?php

// change the following paths if necessary
$yii = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'yii' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'yii.php';
$config = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php';

/**
 * This function simply dumps the $what argument passed in to the Yii logs.
 * Since it uses Yii's CVarDumper, it will dump an object with upto 20
 * nested objects.
 *
 * @param mixed $what The item you would like logged.
 * @param string $level The Yii logging level.
 * @param string $where The location where this is called from (ie: controllers.site).
 * @param boolean $highlight If the log output should be systax highlighted.
 * @return void
 */
function d2l($what, $level = CLogger::LEVEL_INFO, $where = 'fb.somewhere', $highlight = false)
{
    if(is_array($what) || is_object($what)) {
        $what = CVarDumper::dump($what, 10, $highlight);
    }

    Yii::log($what, $level, 'application.' . $where, $highlight);
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
Yii::createWebApplication($config)->run();
