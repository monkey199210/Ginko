<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
        $data['main_content'] = 'web/home/index';
        $this->load->view('web/template', $data);
	}

	public function officialrules()
	{
        $data['main_content'] = 'web/home/officialrules';
        $this->load->view('web/template', $data);
	}

	public function terms()
	{
        $data['main_content'] = 'web/home/terms';
        $this->load->view('web/template', $data);
	}

	public function privacypolicy()
	{
        $data['main_content'] = 'web/home/privacypolicy';
        $this->load->view('web/template', $data);
	}

	public function aboutus()
	{
        $data['main_content'] = 'web/home/aboutus';
        $this->load->view('web/template', $data);
	}

	public function contest()
	{
        $data['main_content'] = 'web/home/contest';
        $this->load->view('web/template', $data);
	}

	public function app()
	{
        $data['main_content'] = 'web/home/app';
        $this->load->view('web/template', $data);
	}

	public function instantcash()
	{
        $data['main_content'] = 'web/home/instantcash';
        $this->load->view('web/template', $data);
	}
	
	public function instantcash_login()
	{
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        
        $result = $this->chatapi->redeem_check($user_name, $password);
	    
	    print_r(json_encode($result));
	}
	
	public function instantcash_paypal()
	{
        $paypal_email = $this->input->post('paypal_email');
        $session_id = $this->input->post('session_id');
        
        $result = $this->chatapi->redeem_paypal($session_id, $paypal_email);
	    
	    print_r(json_encode($result));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */