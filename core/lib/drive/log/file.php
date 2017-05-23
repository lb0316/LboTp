<?php
namespace core\lib\drive\log;
use core\lib\conf;

//文件系统
class file{
	public $path;//日志存储位置
	public function __construct(){
		$confOp = conf::get('OPTION','log');
		$this->path = $confOp['PATH'].date('YmdH');
	}

	public function wLog($message = '',$fileName = 'log'){
		/**
		 * 1.确定文件存储位置是否存在
		 *   新建目录
		 * 2.写入日志
		 *
		 */
		if (!is_dir($this->path)) {
			mkdir($this->path,'0777',true);
		}
		$message = date('Y-m-d H:i:s').' '.json_encode($message).PHP_EOL;
		return file_put_contents($this->path.'\\'.$fileName.'.php', $message,FILE_APPEND);
	}
}
