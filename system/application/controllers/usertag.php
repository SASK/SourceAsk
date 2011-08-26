<?php
class UserTag extends CI_Controller {
	private $usertag;
	private $json;
	function __construct()
	{
		parent::__construct();
		$this->load->library('Zend/Zend_json');
		$this->load->model('usertagmodel');
		$this->json = new Zend_json();
		$this->usertag = new usertag();
		$this->template->assign('title', '问源网');
		$this->template->assign('host', $this->config->item('host'));
	}
/**
@param 
@desc 添加感兴趣的标签
*/
	public function addFavTag()
	{
		$userid = $this->input->get('userid');
		$tagid = $this->input->get('tagid');
		$ip = $this->input->get('ip');
		$item = array('id'=>'','uid'=>$userid,'tid'=>$tagid,'v_tatol'=>'','a_tatol'=>'','type'=>'','status'=>'','ip'=>$ip,'createtime'=>'');
		$this->usertag->saveInfo($item);
		$this->output->set_output($tagid.'sdfdsfsdfdf');
	}
/**
@param 
@desc 显示用户感兴趣的标签
*/
	public function showFavTag($uid){
		$where = array('uid'=>$uid);
		$data = $this->json->encode($this->usertag->getInfoByField($where));
		echo $data;
	}
/**
@param
@desc 删除感兴趣的标签
*/
	public function delFavTag($id,$uid){
		$where = array('id'=>$id,'uid'=>$uid);
		$status = $this->usertag->deleteInfo($where);
		if($status){
			echo true;
		}else{
			echo false;
		}
	}
}
?>
