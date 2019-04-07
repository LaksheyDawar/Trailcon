<?php

	class Contest_model	extends CI_Model{
		//load database config
		public function __construct(){
			$this->load->database();
		}
		//get details for this id.
		public function get_entry($id){ //get details from id.
			if($id){
			$query=$this->db->get_where('contests', array('id' => $id));
			return $query->row_array();	
			}
		}
		//get all entries
		public function get_all_entries(){ // get all entries
			$query=$this->db->get('contests');
			return $query->result_array();
		}
		//validation rules
		public $rules = array(
        'name' => array(
            'field' => 'name', 
            'label' => 'Name', 
            'rules' => 'required'
        ),
        'email' => array(
            'field' => 'email', 
            'label' => 'Email', 
            'rules' => 'required|valid_email|is_unique[contests.email]'
        ),
    );
		//create a new entry
		public function create_entry(){ // create a new entry
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email')
			);
			$this->db->insert('contests', $data);
		}
		//update existing entry
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