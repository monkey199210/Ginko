<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
        if($this->input->post('act') == 'login'){
	        $email = $this->input->post('email');
	        $password = $this->input->post('password');
	        $local_timezone = $this->input->post('local_timezone');
	        $remember_check = $this->input->post('remember_check');

			$date_time = new DateTime();

			//$timestamp = $local_timezone * 3600 - $date_time->format('Z');
			$timestamp = $local_timezone * 3600;

			$state = $this->chatapi->login($email, $password);

			if($state->success == '1'){
				$this->session->set_userdata('sessionId', $state->data->sessionId);
				$this->session->set_userdata('user_id', $state->data->user_id);
				$this->session->set_userdata('user_name', $state->data->first_name." ".$state->data->middle_name." ".$state->data->last_name);
				$this->session->set_userdata('photo_url', $state->data->photo_url);
				$this->session->set_userdata('time_stamp', $timestamp);
				
				if($remember_check != ""){
					$this->session->set_userdata('user_email', $email);
				}
				
				redirect('chat/history');
			}
		}
		
        $data['user_login'] = $this->session->userdata('user_email');

        $data['main_content'] = 'chat/user/login';
        $this->load->view('chat/template', $data);
	}

	public function forgot_password()
	{
        if($this->input->post('act') == 'send'){
	        $email = $this->input->post('email');
	        
			$state = $this->chatapi->forgot_password($email);
			
			if($state->success == '1'){
				$this->session->set_userdata('sessionId', $state->data->sessionId);

				redirect('chat/user/login');
			}

			redirect('chat/user/login');
		}
        
        $data['main_content'] = 'chat/user/forgot_password';
        $this->load->view('chat/template', $data);
	}

	public function log_out()
	{
        $sessionId = $this->session->userdata('sessionId');
	        
		$state = $this->chatapi->logout($sessionId);

		$this->session->unset_userdata('sessionId');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('photo_url');

		redirect('chat/user/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */