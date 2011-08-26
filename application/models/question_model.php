<?php
require_once 'common_model.php';
class question_model extends Common_model{
    
    public function __construct(){
        parent::__construct();
    }

	public function getData($limit = 15){
		$query = $this->db->get('cb_question', $limit);
        return $query->result_array();
	}

	public function getLatest($limit = 15){
		$this->db->order_by('id desc');
		$query = $this->db->get('cb_question', $limit);
        return $query->result_array();
	}

    public function insertData(){
		$question = new Question();
		$tag->setId($this->input->post('id'));
		$tag->setName($this->input->post('name'));
		$tag->setLogo($this->input->post('logo'));
		$tag->setQ_total($this->input->post('q_total'));
		$this->db->insert('cb_question',$question);
    }
	
	public function deleteById($where){
		$this->db->where($where);
		$this->db->delete('cb_question');
	}

	public function update($where){
		$question = new Question();
		$tag->setId($this->input->post('id'));
		$tag->setName($this->input->post('name'));
		$tag->setLogo($this->input->post('logo'));
		$tag->setQ_total($this->input->post('q_total'));
		$this->db->update('cb_question',$question,$where);
	}

}

?>