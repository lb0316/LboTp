<?php
namespace app\ctrl;
use app\model\userModel;
class indexCtrl extends \core\lbotp{
	public function index(){
		// p('it is index');
		$model = new userModel();
		$res = $model->getOne(2);
		dump($res);die;
		$data = $model->insert("user",$data);
		dump($data);
		// $sql = "select * from user";
		// $res = $model->query($sql);
		// p($res->fetchAll());
		/*$data = "hello world";
		$title = "视图文件";
		$this->assign('data',$data);
		$this->assign('title',$title);
		$this->display('index.html');*/
		// $temp = \core\lib\conf::get('CTRL','route');
		// var_dump($temp);
		// $temp = \core\lib\conf::get('ACTION','route');
		// var_dump($temp);
	}
	
}