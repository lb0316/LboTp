<?php
namespace core\lib;
use core\lib\conf;

class log{
	static public $class;
	/**
	 * 1.确定日志存储方式
	 *
	 *2. 写日志
	 *
	 */

	static public function init(){
		//确定存储方式
		$drive = conf::get('DRIVE','log');
		$classObj = '\core\lib\drive\log\\'.$drive;
		self::$class = new $classObj;
	}

	static public function writeLog($msg,$fileName = 'log'){
		self::$class->wLog($msg,$fileName);
	}
}