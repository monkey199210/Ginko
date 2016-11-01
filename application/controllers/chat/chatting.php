<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chatting extends CI_Controller {

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

	public function index($user_ids = "", $board_id = 0)
	{
        $xmlfile = site_url()."assets/chat/xml/EmojisList.xml";
        $xmlRaw = file_get_contents($xmlfile);

        $this->load->library('xmlparsing');
        $xmlData = $this->xmlparsing->xml_parse($xmlRaw);

        $data['emoticon_list'] = $xmlData;

		$user_ids = urldecode($user_ids);
        $user_list = explode(',', $user_ids);

        $i = 0;
        $data['contact_data'] = array();
        foreach($user_list as $key => $value){
			if($this->user_id != $value){
				$user_result = $this->chatapi->get_contact_detail($this->sessionId, $value);
				
				if($user_result->success == '1'){
					$data['contact_data'][$i]['user_id'] = $user_result->data->contact_id;
					$data['contact_data'][$i]['first_name'] = $user_result->data->first_name;
					$data['contact_data'][$i]['middle_name'] = $user_result->data->middle_name;
					$data['contact_data'][$i]['last_name'] = $user_result->data->last_name;
					$data['contact_data'][$i]['photo'] = $user_result->data->photo_url == '' ? base_url(CHAT_FACE_IMAGES) : $user_result->data->photo_url;
					$i++;
				}
			}
		}
		
		$data['board_id'] = 0;
		$data['create_time'] = "";
		$data['message_history'] = array();
       
	   if($board_id == 0){
	        $new_chat_result = $this->chatapi->create_new_chat_board($this->sessionId, $user_ids);

	        if($new_chat_result->success == '1'){
				$data['board_id'] = $new_chat_result->data->board_id;
				$data['create_time'] = $new_chat_result->data->create_time;
			}
		}else if($board_id > 0){
			$data['board_id'] = $board_id;
		}

		if($data['board_id'] > 0){
			$message_history_result = $this->chatapi->get_message_history($this->sessionId, $data['board_id'], 10, 1000);
			
			if($message_history_result->success == '1'){
				$data['message_history'] = $message_history_result->data;
				$this->_json_array_sort_by_column($data['message_history'], "msg_id");
				
				if(sizeof($data['message_history']) > 0){
					for($i = 0; $i < sizeof($data['message_history']); $i++){
						if($data['message_history'][$i]->is_read == ''){
							$msg_id = $data['message_history'][$i]->msg_id;

							$result = $this->chatapi->read_message($this->sessionId, $board_id, $msg_id);
						}
					}
				}
			}

			$iswriting = "true";
			$set_writting_result = $this->chatapi->set_writting_status($this->sessionId, $data['board_id'], $iswriting);
		}
		
		$data['user_id'] = $this->user_id;
		$data['user_name'] = $this->session->userdata('user_name');
		$data['time_stamp'] = $this->session->userdata('time_stamp');
		$data['user_ids'] = $user_ids;
		
        $data['main_content'] = 'chat/chatting/index';
        $this->load->view('chat/template', $data);
	}

	public function send_message()
	{
        $board_id = $this->input->post('board_id');
        $content = $this->input->post('content');
        $emoji_str = $this->input->post('emoji_str');
        
        $send_content_tmp = preg_replace('/<img.*?alt="([^"]*)".*?>/i', '$1', $content);
        
        $send_content_tmp = str_replace("<br>", "\n", $send_content_tmp);
        $send_content = str_replace("&nbsp;", " ", $send_content_tmp);
        
        $result = $this->chatapi->send_message($this->sessionId, $board_id, $send_content);
        
		if($result->success == '1'){
			$result->data->send_time = convert_date_string('M d, Y h:i A', $result->data->send_time, $this->time_stamp);
			$result->data->content = chat_content_show($content);
			print_r(json_encode($result->data));
		}
	}

	public function check_new_message()
	{
        $board_id = $this->input->post('board_id');
        $result = $this->chatapi->check_new_message($this->sessionId);
        
		$message_list = array();
		$message_cnt = 0;
		
		if($result->success == '1'){
			$i = 0;
			foreach($result->data as $key => $messages){
				if($board_id == $messages->board_id){
					foreach($messages->messages as $key => $message){
						if($this->user_id != $message->send_from){
							$message_list[$i]['msg_id'] = $message->msg_id;
							$message_list[$i]['content'] = chat_content_show($message->content);
							$message_list[$i]['send_from'] = $message->send_from;
							$message_list[$i]['send_time'] = convert_date_string('M d, Y h:i A', $message->send_time, $this->time_stamp);

							$user_result = $this->chatapi->get_contact_detail($this->sessionId, $message_list[$i]['send_from']);
							
							if($user_result->success == '1'){
								$message_list[$i]['photo'] = $user_result->data->photo_url == '' ? base_url(CHAT_FACE_IMAGES) : $user_result->data->photo_url;
								$message_list[$i]['name'] = substr($user_result->data->first_name, 0, 1)." ".substr($user_result->data->last_name, 0, 1);
							}
							
							$read_result = $this->chatapi->read_message($this->sessionId, $board_id, $message->msg_id);
							
							$i++;
						}
					}
				}else{
					if(sizeof($messages->messages) > 0){
						$message_cnt += sizeof($messages->messages);
					}
				}
			}
		}

		if($message_cnt > 0){
			print_r(json_encode($message_cnt));
		}else if(sizeof($message_list) > 0){
			print_r(json_encode($message_list));
		}else{
			print_r(json_encode(''));
		}
	}
	
	function _json_array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
	    $sort_col = array();
	    foreach ($arr as $key=> $row) {
	        $sort_col[$key] = $row->$col;
	    }

	    array_multisort($sort_col, $dir, $arr);
	}	

	public function delete_message()
	{
        $board_id = $this->input->post('board_id');
        $msg_ids = $this->input->post('msg_ids');
        
        $msg_id_list = explode(",", $msg_ids);
        
        if(sizeof($msg_id_list) > 1){
	        $result = $this->chatapi->delete_messages($this->sessionId, $board_id, $msg_ids);
	        
	        if($result->success == '1'){
				print_r('1');
			}
		}else{
	        $result = $this->chatapi->delete_message($this->sessionId, $board_id, $msg_ids);
	        
	        if($result->success == '1'){
				print_r('1');
			}
		}
	}

	public function leave_board()
	{
        $board_id = $this->input->post('board_id');

        $result = $this->chatapi->leave_board($this->sessionId, $board_id);
        
        if($result->success == '1'){
			print_r('1');
		}
	}

	public function get_history_message()
	{
        $board_id = $this->input->post('board_id');
        $last_date = reconvert_date_string('Y-m-d H:i:s', $this->input->post('last_date'), $this->time_stamp);

		$message_history_result = $this->chatapi->get_message_history($this->sessionId, $board_id, 10, 1000, $last_date);
		
		if($message_history_result->success == '1'){
			$message_history = $message_history_result->data;
			$this->_json_array_sort_by_column($message_history, "msg_id");
		}
		
		$message_html = "";

		if(sizeof($message_history) > 0){
			for($i = 0; $i < sizeof($message_history); $i++){
				if($message_history[$i]->send_from != $this->user_id){
					$user_result = $this->chatapi->get_contact_detail($this->sessionId, $message_history[$i]->send_from);
					$photo = "";
					$name = "";
					
					if($user_result->success == '1'){
						$photo = $user_result->data->photo_url == '' ? base_url(CHAT_FACE_IMAGES) : $user_result->data->photo_url;
						$name = substr($user_result->data->first_name, 0, 1)." ".substr($user_result->data->last_name, 0, 1);
					}

					$message_html .= '<div class="chatting_content" msg_id="'.$message_history[$i]->msg_id.'">';
					$message_html .= '<div class="chatting_check">';
					$message_html .= '<div class="search_checkbox">';
					$message_html .= '<input type="checkbox" id="check_'.$message_history[$i]->msg_id.'"" value="'.$message_history[$i]->msg_id.'"" class="msg_check"/>';
					$message_html .= '<label for="check_'.$message_history[$i]->msg_id.'""></label>';
					$message_html .= '</div>';
					$message_html .= '</div>';
					$message_html .= '<div class="chatting_img">';
					$message_html .= '<img src="'.$photo.'""/>';
					$message_html .= '<p>'.$name.'</p>';
					$message_html .= '</div>';
					$message_html .= '<div class="chatting_wrapper">';
					$message_html .= '<div class="chatting_sub_1">';
					$message_html .= '<p>'.convert_date_string('M d, Y h:i A', $message_history[$i]->send_time, $this->time_stamp).'</p>';
					$message_html .= '<div class="clearfix"></div>';
					$message_html .= '<div class="chatting_txt">';
					$message_html .= chat_content_show($message_history[$i]->content);
					$message_html .= '</div>';
					$message_html .= '</div>';
					$message_html .= '</div>';
					$message_html .= '</div>';
				}else{
					$message_html .= '<div class="chatting_content" msg_id="'.$message_history[$i]->msg_id.'">';
					$message_html .= '<div class="chatting_check">';
					$message_html .= '<div class="search_checkbox">';
					$message_html .= '<input type="checkbox" id="check_'.$message_history[$i]->msg_id.'" value="'.$message_history[$i]->msg_id.'" class="msg_check"/>';
					$message_html .= '<label for="check_'.$message_history[$i]->msg_id.'"></label>';
					$message_html .= '</div>';
					$message_html .= '</div>';
					$message_html .= '<div class="chatting_wrapper">';
					$message_html .= '<div class="chatting_sub_2">';
					$message_html .= '<p>'.convert_date_string('M d, Y h:i A', $message_history[$i]->send_time, $this->time_stamp).'</p>';
					$message_html .= '<div class="clearfix"></div>';
					$message_html .= '<div class="chatting_txt">';
					$message_html .= chat_content_show($message_history[$i]->content);
					$message_html .= '</div>';
					$message_html .= '</div>';
					$message_html .= '</div>';
					$message_html .= '</div>';
				}
			}
		}

		print_r($message_html);
	}

	public function read_new_message()
	{
        $board_id = $this->input->post('board_id');
        $msg_id = $this->input->post('msg_id');

        $result = $this->chatapi->read_message($this->sessionId, $board_id, $msg_id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */