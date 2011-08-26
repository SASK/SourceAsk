<?php
require_once 'common_model.php';
class tag_model extends Common_model{

    public function __construct(){
        parent::__construct();
    }

	public function getData($limit = 15){
		$query = $this->db->get('cb_tag', $limit);
        return $query->result_array();
	}

    public function insertData(){
		$tag = new Tag();
		$tag->setId($this->input->post('id'));
		$tag->setName($this->input->post('name'));
		$tag->setLogo($this->input->post('logo'));
		$tag->setQ_total($this->input->post('q_total'));
		$this->db->insert('cb_tag',$tag);
    }
	
	public function deleteById($where){
		$this->db->where($where);
		$this->db->delete('cb_tag');
	}

	public function update($where){
		$tag = new Tag();
		$tag->setId($this->input->post('id'));
		$tag->setName($this->input->post('name'));
		$tag->setLogo($this->input->post('logo'));
		$tag->setQ_total($this->input->post('q_total'));
		$this->db->update('cb_tag',$tag,$where);
	}	
}

?>