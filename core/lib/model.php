<?php
namespace core\lib;
use core\lib\conf;

class model extends \medoo{
	public function __construct(){
		$option = conf::all('db');
		parent::__construct($option);
		
	}
}