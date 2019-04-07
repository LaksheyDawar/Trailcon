<?php

	class Contest_model	extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}

		public function get_entry($id){ //get details from id.
			if($id){
			$query=$this->db->get_where('contests', array('id' => $id));
			return $query->row_array();	
			}
		}

		public function get_all_entries(){ // get all entries
			$query=$this->db->get('contests');
			return $query->result_array();
		}

		public function create_entry(){ // create a new entry
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email')
			);
			$this->db->insert('contests', $data);
		}

		public function update_entry($id){ // update details of an entry
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email')
			);
			$this->db->where('id', $id);
			return $this->db->update('contests', $data);
		}

	}


?>