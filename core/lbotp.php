<?php
namespace core;

class lbotp{
	public static $classMap = array();
	public $assignData;
	static public function run(){
		\core\lib\log::init();
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		if(is_file($ctrlFile)){
			include $ctrlFile;
			$ctrl = new $ctrlClass();
			$ctrl->$action();
			\core\lib\log::writeLog('ctrl:'.$ctrlClass.'   '.'action:'.$action);

		}else{
			throw new \Exception("找不到控制器".$ctrlClass);
			
		}
	}

	//自动加载类库
	static public function load($class){
		if (isset($classMap[$class])) {
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file = LBOTP.'/'.$class.'.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}

	//模板赋值
	public function assign($name,$value){
		$this->assignData[$name] = $value;

	}

	//模板输出
	public function display($file){
		$file = APP.'/views/'.$file;
		extract($this->assignData);
		if (is_file($file)) {
			include $file;
		}
	}
}