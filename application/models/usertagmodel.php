<?php
require_once 'common_model.php';
class UserTagModel extends Common_model{

    public function __construct(){
        parent::__construct();
		$this->setParam('cb_usertag');
    }

}

?>