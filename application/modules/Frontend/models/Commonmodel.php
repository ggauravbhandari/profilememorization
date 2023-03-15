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


    public function deleteData($table, $row_name, $row_id){
		$this->db->where($row_name, $row_id);
		$this->db->delete($table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
    }


    public function getprofilename($table, $id, $data,$profile_id=''){
		$this->db->like($id,$data,'none');
		if($profile_id!='' && $profile_id>0){
		$this->db->where('id !=',$profile_id);
		}
		$data_resp = $this->db->get($table);
		// echo $this->db->last_query();exit();
		return ($data_resp->num_rows()>0) ? $data_resp->num_rows() : 0;
		
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

    public function getsingleData_whereIn($table, $where=array(),$select='*', $orderBy=array(),$whereIn=array()){
		
		$this->db->select($select);
		if(!empty($where)){
			$this->db->where($where);
		}
		if(!empty($whereIn)){
			$this->db->where_in($whereIn[0],$whereIn[1]);
		}
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		// return $this->db->last_query();
		if($data->num_rows()>0) {
			return $data->row_array();
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

	public function getsingleDataobject($table, $where=array(),$select='*', $orderBy=array()){
		$this->db->select($select);
		if(!empty($where)){
			$this->db->where($where);
		}
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->row();
		} else {
			return array();
		}
    }
    
    public function updateAllData($table, $where=array(), $data=array()){
		$this->db->where($where);
		$resp = $this->db->update($table,$data);
		if($resp) {
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

	public function getAllDataArray($table,$data, $orderBy="", $format = "ASC",$select='*'){
		$this->db->select($select);
		$this->db->where($data);
		$this->db->order_by($orderBy, "$format");
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->result();
		} else {
			return array();
		}
    }

	function user_byemaillogin($login_id){
		$where = array(
			'email' => trim($login_id),
			
			'user_role'=>2
			);
		$check_user = $this->getAllDataArray('users',$where);
		if (count($check_user)) {
			$user_info  = array(
				'user_name' => $check_user[0]->firstname.' '.$check_user[0]->lastname,
				'user_email' => $check_user[0]->email,
				'user_role' => $check_user[0]->user_role,
				'user_id' => $check_user[0]->id
				);
			$session_array = array();
			$session_array['frontuserdetail'] = $user_info;
			$this->session->set_userdata($session_array);
			return array('status'=>true);
		}else{
			return array('status'=>false,'msg'=>lang('emailnotmatch'));
			die;
		}
	}
	public function user_login($login_id, $password,$tablename='users'){

		$where = array(
			'email' => trim($login_id),
			
			'user_role'=>2
			);
		$check_user = $this->getAllDataArray($tablename,$where);
		// echo $this->db->last_query(); exit();
		if (count($check_user)) {
			$hash = $check_user[0]->password;
			$result = password_verify($password, $hash);
			if ($result) {
				if($check_user[0]->user_status==1){

					$login_user_id = ($check_user[0]->warden_user && $check_user[0]->warden_user==1) ? $check_user[0]->admin_user_id : $check_user[0]->id;	
					$warden_user_id = ($check_user[0]->warden_user && $check_user[0]->warden_user==1) ? $check_user[0]->id : 0;	
					// print_r(familygroupname_byuserid($login_user_id)['group_id']); exit();
					$user_info  = array(
						'user_name' => $check_user[0]->firstname.' '.$check_user[0]->lastname,
						'user_email' => $check_user[0]->email,
						'user_role' => $check_user[0]->user_role,
						'user_id' => $login_user_id,
						'user_planid' => $check_user[0]->userplan_type,
						'warden_user_id'=>$warden_user_id,
						'warden_group_id'=>(familygroupname_byuserid($login_user_id)) ? familygroupname_byuserid($login_user_id)['group_id'] : '',//$check_user[0]->warden_group_id
					);
					if($check_user[0]->warden_user && $check_user[0]->warden_user==1 && $check_user[0]->warden_group_id>0){
						$user_info['warden_group_id'] = $check_user[0]->warden_group_id;
					}
					// print_r($user_info);exit();
					$session_array = array();
					$session_array['frontuserdetail'] = $user_info;
					$this->session->set_userdata($session_array);
					return array('status'=>true);
					die;
				}else{
					return array('status'=>false,'msg'=>lang('userdeactivate'));
					die;
				}
	        }else{
	        	return array('status'=>false,'msg'=>lang('emailpassword_not_match'));
	        	die;
	        }
			
			die;
		}else{
			
			return array('status'=>false,'msg'=>lang('emailnotmatch'));
			die;
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

	// common function for get data by join table with condition
	function getjointbData($tb,$where,$result='result',$select='*',$join=null,$orderby=null,$groupby=null,$limit=null){
		$this->db->select($select);
		if(is_array($where)){
			$this->db->where($where);
		}
		if($join!=null && $join!='' && is_array($join)){
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

	// join table with where in condition
	function getjointbData_whereIn($tb,$where,$whereIn=array(),$result='result',$select='*',$join=null,$orderby=null,$groupby=null,$limit=null){
		$this->db->select($select);
		if(is_array($where)){
			$this->db->where($where);
		}
		if(is_array($whereIn) && !empty($whereIn)){
			$this->db->where_in($whereIn[0],$whereIn[1]);
		}
		if($join!=null && $join!='' && is_array($join)){
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

	function getcustomdatawherelike($table,$where_col,$wherelike=array(),$where=array(),$order=array()){
		if(!empty($where_col) && is_array($wherelike) && !empty($wherelike)){
			$this->db->where_in($where_col,$wherelike);
		}
		if(!empty($where) && is_array($where)){
			$this->db->where($where);
		}
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->result_array();
		} else {
			return array();
		}
	}

	function getsinglecustomdatawherelike($table,$where_col,$wherelike=array(),$where=array(),$order=array(),$select='*'){
		$this->db->select($select);
		if(!empty($where_col) && is_array($wherelike) && !empty($wherelike)){
			$this->db->where_in($where_col,$wherelike);
		}
		if(!empty($where) && is_array($where)){
			$this->db->where($where);
		}
		if(!empty($orderBy)){
			$this->db->order_by($orderBy[0],$orderBy[1]);
		}
		$data = $this->db->get($table);
		if($data->num_rows()>0) {
			return $data->row();
		} else {
			return array();
		}
	}
}
?>