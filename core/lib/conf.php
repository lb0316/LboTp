<?php
namespace core\lib;

class conf{
	public static $conf = array();
	static public function get($name,$file){
		/**
		 * 1.判断配置文件是否存在
		 * 2.判断配置是否存在
		 * 3.缓存配置
		 */
		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{
			$fileName = LBOTP.'\core\config\\'.$file.'.php';
			if (is_file($fileName)) {
				$conf = include $fileName;
				if (isset($conf[$name])) {

					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					throw new \Exception("没有这个配置项".$name);
					
				}
			}else{
				throw new \Exception("找不到配置文件".$file);
				
			}
		}
		
	}

	static public function all($file){
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$fileName = LBOTP.'\core\config\\'.$file.'.php';
			if (is_file($fileName)) {
				$conf = include $fileName;
				self::$conf[$file] = $conf;
				return $conf;
				
			}else{
				throw new \Exception("找不到配置文件".$file);
				
			}
		}
	}
}