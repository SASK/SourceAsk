<?php
class Question_detail extends CI_Controller {
	private $question;
	private $answer;
	private $qid;
	function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
		$this->load->model('answer');
		$this->load->library('template');
		$this->question = new question_model();
		$this->answer = new tag_model();
		$this->qid = $this->input->get('qid');
		$this->template->assign('title', '问源网');
		$this->template->assign('host', $this->config->item('host'));
	}

	public function show()
	{
		$where = array('qid'=>$this->qid);
		$quetion = $this->question->getInfoByField($where);
		$answers = $this->answer->getInfoByField($where);
		this->template-assign('question',$question);

		$this->template->view('question_detail');
		
	}
}
?>