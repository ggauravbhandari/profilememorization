<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commonmodel extends CI_Model{ 	
	


    public function insertData($table,$data){
	 	$insert=$this->db->insert($table,$data);
     	if ($insert) {
			return $this->db->insert_id();
     	}else{
     		return false;
     	}
    }

	public function getAllDataArray($table,$data, $orderBy="", $format = "ASC"){
		$this->db->where($data);
		$this->db->order_by($orderBy, "$format");
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->result();
		} else {
			return array();
		}
    }
	
    public function deleteData($table, $row_name, $row_id){
		$this->db->where($row_name, $row_id);
		$this->db->delete($table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
    }

    public function getAllData($table, $id, $data, $orderBy=array()){
		$this->db->where($id, $data);
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->result();
		} else {
			return array();
		}
    }

	function getcustomdata($table,$where=array(),$order=array()){
		if(!empty($where) && is_array($where)){
		$this->db->where($where);
		}
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->result();
		} else {
			return array();
		}
	}

	public function getsingleData($table, $where=array(),$select='*', $orderBy=array()){
		$this->db->select($select);
		if(!empty($where)){
			$this->db->where($where);
		}
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->row_array();
		} else {
			return array();
		}
    }
    
    public function updateAllData($table, $where=array(), $data=array()){
		$this->db->where($where);
		$this->db->update($table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
    public function updateSingleData($table, $where=array(), $data="", $value=""){
		$this->db->where($where);
		$this->db->set($data,$value,FALSE);
		$this->db->update($table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}

	public function user_login($login_id, $password){

		$where = array(
			'email' => trim($login_id),
			'user_status'=>1,
			'user_role'=>1
			);
		$check_user = $this->getAllDataArray('users',$where);
		// echo $this->db->last_query(); exit();
		if (count($check_user)>0) {
			// print_r($check_user);exit();
			$hash = $check_user[0]->password;
			$result = password_verify($password, $hash);
			if ($result) {	            
				$user_info  = array(
								'user_name' => $check_user[0]->firstname,
								'user_email' => $check_user[0]->email,
								'user_role' => $check_user[0]->user_role,
								'user_id' => $check_user[0]->id
								 );
				$session_array = array();
				$session_array['user_details'] = $user_info;
				$this->session->set_userdata($session_array);
				return true;
	        	die;
	        }else{
	        	return false;
	        	die;
	        }
			
			die;
		}else{
			
			return false;
		}
	}

	

	// common function for get data by join table with condition
	function getjointbData($tb,$where,$result='result',$select='*',$join=null,$orderby=null,$groupby=null,$limit=null){
		$this->db->select($select);
		if(is_array($where)){
			$this->db->where($where);
		}
		if($join!=null && is_array($join)){
			$this->db->join($join[0],$join[1]);
		}
		if($orderby!=null && is_array($orderby)){
			$this->db->order_by($orderby[0],$orderby[1]);
		}
		if($groupby!=null){
			$this->db->group_by($groupby);
		}
		if($limit!=null){
			$this->db->limit($limit);
		}
		return $this->db->get($tb)->$result();
	}
}
?>