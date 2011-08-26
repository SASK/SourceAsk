<?php
class Tag extends CI_Controller {
	private $tagList;
	function __construct()
	{
		parent::__construct();
		$this->load->model('tag_model');
		$this->load->library('template');
		$this->tagList = new tag_model();
		$this->template->assign('title', '问源网');
		$this->template->assign('host', $this->config->item('host'));
	}

	public function index()
	{
		$tags = $this->tagList->getData(15);
		$this->template->assign('tags',$tags);
		$this->template->assign('tag', 'hot');
		$this->template->view('tag');
	}
}
?>