<?php
class data_model extends CI_Model{
	function getAll(){
		$q=$this->db->query("select * from test");
		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data['rows']=$row;
			}
			return $data;
		}
	}
}
?>