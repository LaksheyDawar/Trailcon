<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contest extends CI_Controller {
public function index(){
		$this->lang->load('translations'); //load language 
		$lang['name'] = $this->lang->line('name');
		$lang['email'] = $this->lang->line('email');
		$data['lang'] = $lang;
		$data['posts'] = $this->Contest_model->get_all_entries();	//get all entries from the model
		$this->load->view('contest/contest', $data,'translations');

}
public function details($id = NULL) {
	$data = array(); //array passed to the view
	$lang=array();
	$this->lang->load('translations');

	$lang['name'] = $this->lang->line('name');
	$lang['email'] = $this->lang->line('email');
	$data['lang'] = $lang;
	if($id){  
		$details = $this->Contest_model->get_entry($id);
		if ($details) {
			$data['post']=$details;
		}
		else{
			show_404(); //entry not found with this id.
		}
	}
	else{ 
		$this->load->model('Contest_model'); // load model
		$rules = $this->Contest_model->rules; // load validation rules from model
		if($_POST) { 
			if($_POST['id']){ //update existing id
				 $this->form_validation->set_rules($rules); 
				if($this->form_validation->run() === FALSE){

				}
				else{
					$this->Contest_model->update_entry($_POST['id']);
					redirect('/contest');
				}
			}
			 $this->form_validation->set_rules($rules);	//set rules 
			if($this->form_validation->run() === FALSE){ 	

			}
			else{
				$this->Contest_model->create_entry(); // create a new entry if valid post
				redirect('/contest');
			}
		}
	}
	$this->load->view('contest/details', $data);		
	}
}
?>