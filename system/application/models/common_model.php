<?php
/**
 * 通用Model
 *
 * @author yuhang
 */
class Common_model extends CI_Model {
    protected $table_name;			// 造作的表名
    protected $id;					// 主键ID

	function setParam($table_name, $id = NULL) {
		$this->table_name = $table_name;
		$this->id = $id;
	}


	/**
     * 获得列表信息
     */
	public function getList($where_arr = array(), $like_arr = array(), $order_arr = array(), $limit = 0, $page = 0) {
	    // 处理like
	    if (is_array($like_arr)) {
			foreach ($like_arr as $key => $value) {
				$this->db->like($key, trim($value), 'both');
			}
	    }

	    // 特殊处理

	    // 排序
	    if (!is_array($order_arr)) {
		    $this->db->order_by($this->id, 'DESC');
	    } else {
		    foreach ($order_arr as $key => $value) {
			    $this->db->order_by($key, $value);
		    }
	    }

	    // 查询
	    $offset = $limit * ( $page - 1 );
	    if ($limit > 0) {
		    $query = $this->db->get_where($this->table_name, $where_arr, $limit, $offset);
	    } else {
		    $query = $this->db->get_where($this->table_name, $where_arr);
	    }

	    // 获取记录总数
	    if ($limit > 0 && $page >= 0) {
			$this->rows_count = $query->num_rows();
	    }
	    return $query->result_array();
    }

	/**
	 * 根据id获得信息
	 * @param <type> $id
	 * @return <type>
	 */
    public function getInfo($id) {
		$this->db->where($this->id, $id)->limit(1);
		$query = $this->db->get($this->table_name);
		return $query->row_array();
	}

	/**
	 * 查询信息
	 * @param <type> $where_arr
	 * @return <type>
	 */
	public function getInfoByField($where_arr) {
		$query  = $this->db->get_where($this->table_name, $where_arr);
		return $query->row_array();
	}

	/**
	 * 保存信息
	 * @param <type> $data_arr
	 * @param <type> $id
	 * @return <type>
	 */
	public function saveInfo($data_arr, $id = 0) {
		if ($id == 0) {
			$this->db->insert($this->table_name, $data_arr);
			if ($this->db->affected_rows() == 0) {
				return false;
			}
			return $this->db->insert_id();
		} else {
			$this->db->where($this->id, $id);
			$this->db->update($this->table_name, $data_arr);
			if ($this->db->affected_rows() == 0) {
				return false;
			}
			return $id;
		}
	}

	/**
	 * 删除信息
	 * @param <type> $id
	 */
	public function deleteInfo($id) {
		if (is_array($id)) {
			$this->db->where_in($this->id, $id);
		} else {
			$this->db->where($this->id, $id);
		}
		return $this->db->delete($this->table_name);
	}

	/**
	 * 记录是否存在
	 * @param <type> $data_arr
	 * @param <type> $id
	 * @return <type>
	 */
	public function isExists($data_arr, $id = 0) {
		if ($id > 0) {
			$this->where($this->id."!=".$id);
		}
		foreach ($data_arr as $field => $value) {
			$this->db->where($field, $value);
		}
		$result = $this->db->get($this->table_name);
		if ($result->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 保存操作日志
	 * @param <type> $operate
	 * @param <type> $operateDesc
	 */
	public function log($operate, $operateDesc = '') {
		
	}

	

}
?>
