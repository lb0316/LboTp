<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载类库
 * 3.启动框架
 */

// define("LBOTP", realpath('/'));
define("LBOTP", dirname(__FILE__));

// echo LBOTP;die;
define("CORE", LBOTP.'/core');
define("APP", LBOTP.'/app');
define("MODULE",'app');
define("DEBUG", true);

include "vendor/autoload.php";gggg

if(DEBUG){
	$whoops = new \Whoops\Run;
	$errorTitle = '框架出错了';
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}
include CORE.'/common/function.php';//加载函数库
include CORE.'/lbotp.php';//加载核心文件
spl_autoload_register('\core\lbotp::load');
\core\lbotp::run();//启动框架