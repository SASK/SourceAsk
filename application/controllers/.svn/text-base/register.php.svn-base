<?php
class Register extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('question_model');
		$this->load->model('tag_model');
		$this->load->library('template');
		
		$questionList = new question_model();
		$questions = $questionList->getData(15);
		$this->template->assign('questions',$questions);

		$tagList = new tag_model();
		$tags = $tagList->getData(15);
		$this->template->assign('tags',$tags);
		$this->template->assign('tag', 'hot');
		$this->template->assign('title', '问源网');
		$this->template->assign('host', $this->config->item('host'));
		$this->template->view('register');
	}
}
?>
