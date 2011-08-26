<?php

class Question{
    private $id;
    private $uid;
    private $tag;
    private $votes;
    private $answer;
    private $view;
    private $content;
    private $status;
    private $ip;
    private $createtime;
    private $modifytime;

    public function __construct($data){
		if(empty($data)){
			return;
		}
		list($this->id,$this->uid,$this->tag,$this->votes,$this->answer,$this->view,$this->content,$this->status,$this->ip,$this->createtime,$this->modifytime) = $data;
    }

    public function setVotes($votes){
		$this->votes = $votes;
    }
	public function getVotes(){
		return $this->votes;
    }
	public function setAnswer($answer){
		$this->votes = $answer;
    }
	public function getAnswer(){
		$this->votes = $answer;
    }

    public function setView($view){
		$this->view = $view;
    }
	public function getView(){
		return $this->view;
    }
    public function setContent($content){
		$this->content = $content;
    }
	public function getContent(){
		return $this->content;
    }
    public function setStatus($status){
		$this->status = $status;
    }
	public function getStatus(){
		return $this->status;
    }
    public function setIp($ip){
		$this->ip = $ip;
    }
	public function getIp(){
		return $this->ip;
    }
    public function setCreatetime($createtime){
		$this->createtime = $createtime;
    }
	public function getCreatetime(){
		return $this->createtime;
    }
    public function setModifytime($modifytime){
		$this->modifytime = $modifytime;
    }
	public function getModifytime(){
		return $this->modifytime;
    }
}

?>