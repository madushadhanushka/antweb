<?php
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$this->load->model ( 'slogin' );
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
	}
	public function index($data = '') {
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'home' );
		$this->load->view ('templates/footer');
	}
	public function login_function() {
		$this->form_validation->set_rules ( 'user_name', 'User name', 'required' );
		$this->form_validation->set_rules ( 'pass_word', 'Pass word', 'required' );
		
		if ($this->form_validation->run () === FALSE) {
			$data ['msg'] = '<font color=red>Username and/or password are required.</font><br />';
			$this->index ( $data );
                       
		} else {
			$loginData ['user_name'] = $this->input->post ( 'user_name' );
			$loginData ['pass_word'] = $this->input->post ( 'pass_word' );
			$data ['out'] = $this->slogin->login ( $loginData );
			if ($data ['out'] ['login'] == '1') {
							$this->session->set_userdata ( $data ['out'] );
				$data ['user_name'] = $this->session->userdata ( 'user_name' ); // *********************
				$this->load->view ( 'templates/header', $data );
				if ($data ['out'] ['user_type'] == "1") { // ADMIN
					$this->load->view ( 'admin/adminHome' ); // TODO
                                        
                                }else if ($data ['out'] ['user_type'] == "2") { // Reception
					$this->load->view ( 'reception/receptionHome' ); // TODO
                                        
                                }else if ($data ['out'] ['user_type'] == "3") { // Employee
					$this->load->view ( 'employee/employeeHome' ); // TODO
                                        
                                }
                                $this->load->view ( 'templates/footer', $data );
			}
                       
		}
	}
}
?>