<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contest extends CI_Controller {
public function index(){

		$data['posts'] = $this->Contest_model->get_all_entries();
		$this->load->view('contest/contest', $data);

}
public function details($id = NULL) {
	$data = array(); //array passed to the view
	if($id){  
		$details = $this->Contest_model->get_entry($id);
		if ($details) {
			$data['post']=$details;
		}
		else{
			show_404(); //entry not found with this id.
		}
	}
	else{ // if no id is passed
		if($_POST) { 
			if($_POST['id']){ //update existing id
				$details = $this->Contest_model->get_entry($_POST['id']);
				if($_POST['email'] == $details['email']){			//if there's only a name update 
					$this->form_validation->set_rules('name', 'Name', 'required');
				}
				else{
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[contests.email]');
				}
				if($this->form_validation->run() === FALSE){

				}
				else{
					$this->Contest_model->update_entry($_POST['id']);
					redirect('/contest');
				}
			}
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[contests.email]');

			if($this->form_validation->run() === FALSE){

			}
			else{
				$this->Contest_model->create_entry();
				redirect('/contest');
			}
		}
	}
	$this->load->view('contest/details', $data);		
	}
}
?>