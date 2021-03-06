<?php

/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */
// change the following paths if necessary
$yii = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'yii' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'yii.php';
$config = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'test.php';

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
    $what = CVarDumper::dump($what, 20, $highlight);

    Yii::log($what, $level, 'application.' . $where, $highlight);
}

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once($yii);
Yii::createWebApplication($config)->run();
