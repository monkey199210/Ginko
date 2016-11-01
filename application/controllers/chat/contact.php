<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

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

    function __construct()
    {
        parent::__construct();

        $this->sessionId = $this->session->userdata('sessionId');
        if($this->sessionId == ''){
			redirect('chat/user/login');
		}
    }

	public function index()
	{
        $data['groups'] = array();
        $data['contact'] = array();

        $result = $this->chatapi->get_friends($this->sessionId);
		if($result->success == '1'){
			if(!empty($result->data->groups)){
				foreach($result->data->groups as $key => $value){
					foreach($value as $key1 => $value1){
						$data['groups'][$key][$key1] = $value1;
					}
				}
			}

			if(!empty($result->data->contact)){
				foreach($result->data->contact as $key => $value){
					foreach($value as $key1 => $value1){
						$data['contact'][$key][$key1] = $value1;
					}
				}
			}
		}
		
		$data['user_id'] = $this->session->userdata('user_id');
		
        $data['main_content'] = 'chat/contact/index';
        $this->load->view('chat/template', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */