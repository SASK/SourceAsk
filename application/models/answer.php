<?php
require_once 'common_model.php';
class Answer extends Common_model{

    public function __construct(){
        parent::__construct();
		$this->setParam('cb_answer');
    }

}

?>