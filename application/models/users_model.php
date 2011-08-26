<?php
/**
 * Description of user_model
 *
 * @author yuhang
 */
require_once APPPATH.'models/common_model.php';

class Users_model extends Common_model {
	function  __construct() {
		parent::__construct();
		$this->setParam(T_USER, 'id');
	}
}
?>
