<?php
namespace app\model;
use core\lib\model;

class userModel extends model{
	public $table = "user";

	public function getAll(){
		return $this->select($this->table,"*");
	}

	public function getOne($id){
		return $this->get($this->table,"*",array("id"=>$id));
	}
}
