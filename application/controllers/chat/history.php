<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {

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
		$this->user_id = $this->session->userdata('user_id');
		$this->time_stamp = $this->session->userdata('time_stamp');
    }

	public function index()
	{
        $data['chat_history'] = array();
        $data['message'] = array();

        $result = $this->chatapi->get_chat_boards($this->sessionId);
        
		if($result->success == '1'){
			if(!empty($result->data)){
				$data['chat_history'] = $result->data;
			}
		}
		
        $message_result = $this->chatapi->list_message_wall($this->sessionId);
        
 		if($message_result->success == '1'){
			if(!empty($message_result->data->data)){
				foreach($message_result->data->data as $key => $value){
					foreach($value as $key1 => $value1){
						$data['message']['data'][$key][$key1] = $value1;
					}
				}
			}

			$data['message']['total'] = $message_result->data->total;
		}
		
        $data['user_id'] = $this->session->userdata('user_id');
        $data['time_stamp'] = $this->session->userdata('time_stamp');

        $data['main_content'] = 'chat/history/index';
        $this->load->view('chat/template', $data);
	}

	public function history_new_message()
	{
        $result = $this->chatapi->check_new_message($this->sessionId);
        
		$message_list = array();
		
		if($result->success == '1'){
			$i = 0;
			foreach($result->data as $key => $messages){
				foreach($messages->messages as $key => $message){
					if($this->user_id != $message->send_from){
						$message_list[$i]['board_id'] = $messages->board_id;
						$message_list[$i]['content'] = chat_history_content_show($message->content);
						$message_list[$i]['send_time'] = convert_date_string('M d, Y', $message->send_time, $this->time_stamp);
						$i++;
					}
				}
			}
		}

		if(sizeof($message_list) > 0){
			print_r(json_encode($message_list));
		}else{
			print_r(json_encode(''));
		}
	}

	public function delete_chat_board()
	{
        $board_ids = $this->input->post('board_ids');
        
        $board_id_list = explode(",", $board_ids);
        
        if(sizeof($board_id_list) > 1){
	        $result = $this->chatapi->leave_boards($this->sessionId, $board_ids);
	        
	        if($result->success == '1'){
				print_r('1');
			}
		}else{
	        $result = $this->chatapi->leave_board($this->sessionId, $board_ids);
	        
	        if($result->success == '1'){
				print_r('1');
			}
		}
	}

	public function delete_message()
	{
        $msg_ids = $this->input->post('msg_ids');
        
        $result = $this->chatapi->list_message_wall_delete($this->sessionId, $msg_ids);
        
        if($result->success == '1'){
			print_r('1');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */