<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$arr = array();
		
		for ( $i=1; $i<=100; $i++){	
		
			if( $i%3 == 0  && $i%5 == 0){
				$arr[$i] = "TrailconLeasing";
			}
			elseif($i%3 == 0){
				$arr[$i] ="Trailcon";
			}
			elseif($i%5 == 0){
				$arr[$i]= "Leasing";
			}
			else{
				$arr[$i]= $i; 
			}
	}
	$data['arr']=$arr;

	$this->load->view('index', $data);
	}
}
