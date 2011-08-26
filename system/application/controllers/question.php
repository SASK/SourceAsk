<?php
class Question extends CI_Controller {
	private $questionList;
	private $tagList;
	function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
		$this->load->model('tag_model');
		$this->load->library('template');
		$this->questionList = new question_model();
		$this->tagList = new tag_model();
		$this->template->assign('title', '问源网');
		$this->template->assign('host', $this->config->item('host'));
	}

	public function index()
	{
		$this->load->helper('form_helper');
		$data = array(
		              'name'        => 'textareaName2',
		              'id'          => 'textareaName2',
		             // 'toolbarset'  => 'Advanced',
		              'basepath'    => '/fckeditor/',
		              'width'       => '100%',
		              'height'      => '200'
		    );
		$questions = $this->questionList->getData(15);
		$this->template->assign('questions',$questions);
		$tags = $this->tagList->getData(15);
		$this->template->assign('tags',$tags);
		$this->template->assign('tag', 'hot');	
		$this->template->view('question');
		
	}

	public function latest()
	{
		$questions = $this->questionList->getLatest(15);
		$this->template->assign('questions',$questions);
		$tags = $this->tagList->getData(15);
		$this->template->assign('tags',$tags);
		$this->template->assign('tag', 'latest');
		$this->template->view('question');
	}
	public function weekrank()
	{		
		$questions = $this->questionList->getLatest(15);
		$this->template->assign('questions',$questions);		
		$tags = $this->tagList->getData(15);
		$this->template->assign('tags',$tags);
		$this->template->assign('tag', 'week');
		$this->template->view('question');
	}
	public function monthrank()
	{
		$questions = $this->questionList->getLatest(15);
		$this->template->assign('questions',$questions);
		$tags = $this->tagList->getData(15);
		$this->template->assign('tags',$tags);
		$this->template->assign('tag', 'month');
		$this->template->view('question');
	}
}
?>