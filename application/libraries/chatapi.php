<?php

class ChatApi{
	var $chat_api_url = "http://api.ginko.mobi/v3/";
	
	function login($email, $password){
		$url = "User/login";
		$fields = array(
			'email' => urlencode($email),
			'password' => urlencode($password),
			'client_type' => '1'
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}
	
	function forgot_password($email){
		$url = "User/sendpassword";
		$fields = array(
			'email' => urlencode($email)
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function logout($sessionId){
		$url = "User/logout";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function create_new_chat_board($sessionId, $user_ids){
		$url = "im/board/create";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'user_ids' => urlencode($user_ids)
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function send_message($sessionId, $board_id, $content){
		$url = "im/send/message";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$content_data = json_encode(array('content' => $content));  
		$result = $this->_send_by_post_fileds($url, $fields, $board_id, $content_data);
		
		return $result;
	}

	function delete_message($sessionId, $board_id, $msg_id){
		$url = "im/delete/message";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'board_id' => urlencode($board_id)
		);
		$result = $this->_send_by_post($url, $fields, $msg_id);
		
		return $result;
	}

	function delete_messages($sessionId, $board_id, $msg_ids){
		$url = "im/delete/messages";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'msg_ids' => urlencode($msg_ids)
		);
		$result = $this->_send_by_post($url, $fields, $board_id);
		
		return $result;
	}

	function check_new_message($sessionId){
		$url = "im/checkNew";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_get($url, $fields);
		
		return $result;
	}

	function set_writting_status($sessionId, $board_id, $iswriting){
		$url = "im/setwriting";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'iswriting' => urlencode($iswriting)
		);
		$result = $this->_send_by_post($url, $fields, $board_id);
		
		return $result;
	}

	function add_new_member($sessionId, $board_id, $user_ids){
		$url = "im/board/addmember";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'user_ids' => urlencode($user_ids)
		);
		$result = $this->_send_by_post($url, $fields, $board_id);
		
		return $result;
	}

	function leave_board($sessionId, $board_id){
		$url = "im/board/leave";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_post($url, $fields, $board_id);
		
		return $result;
	}

	function leave_boards($sessionId, $board_ids){
		$url = "im/boards/leave";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'board_ids' => urlencode($board_ids)
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function list_emoticons($sessionId){
		$url = "im/emoticon/list";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_get($url, $fields);
		
		return $result;
	}

	function send_file($sessionId, $file_type, $file, $thumbnail){
		$url = "im/file/send";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'file_type' => urlencode($file_type)
		);
		$form_fields = array(
			'file' => urlencode($file),
			'thumbnail' => urlencode($thumbnail)
		);
		$result = $this->_send_by_post($url, $fields, "", $form_fields);
		
		return $result;
	}

	function get_chat_boards($sessionId){
		$url = "im/board/list";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_get($url, $fields);
		
		return $result;
	}

	function get_message_history($sessionId, $board_id, $number, $lastDays, $date = ""){
		$url = "im/message/history";
		$fields = array();
		if($date == ""){
			$fields = array(
				'sessionId' => urlencode($sessionId),
				'number' => urlencode($number),
				'lastDays' => urlencode($lastDays)
			);
		}else{
			$fields = array(
				'sessionId' => urlencode($sessionId),
				'number' => urlencode($number),
				'lastDays' => urlencode($lastDays),
				'date' => urlencode($date)
			);
		}
		$result = $this->_send_by_get($url, $fields, $board_id);
		
		return $result;
	}

	function clear_message($sessionId, $board_id, $number){
		$url = "im/message/clear";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'number' => urlencode($number)
		);
		$result = $this->_send_by_post($url, $fields, $board_id);
		
		return $result;
	}

	function read_message($sessionId, $board_id, $msg_ids){
		$url = "im/read/messages";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'msg_ids' => urlencode($msg_ids)
		);
		$result = $this->_send_by_post($url, $fields, $board_id);
		
		return $result;
	}

	function get_friends($sessionId){
		$url = "User/getfriends";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_get($url, $fields);
		
		return $result;
	}

	function list_message_wall($sessionId){
		$url = "entity/follower/messagewall";
		$fields = array(
			'sessionId' => urlencode($sessionId)
		);
		$result = $this->_send_by_get($url, $fields);
		
		return $result;
	}

	function list_message_wall_delete($sessionId, $msg_ids){
		$url = "entity/follower/message/delete";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'msg_ids' => urlencode($msg_ids)
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function get_contact_detail($sessionId, $contact_id){
		$url = "User/getContactDetail";
		$fields = array(
			'sessionId' => urlencode($sessionId),
			'contact_id' => urlencode($contact_id),
			'contact_type' => 1,
			'client_app' => 'IM'
		);
		$result = $this->_send_by_get($url, $fields);
		
		return $result;
	}

	function redeem_check($user_name, $password){
		$url = "redeem/qualify/check";
		$fields = array(
			'email' => urlencode($user_name),
			'password' => urlencode($password)
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function redeem_paypal($session_id, $account){
		$url = "redeem/paypal/account/submit";
		$fields = array(
			'sessionId' => urlencode($session_id),
			'account' => urlencode($account),
		);
		$result = $this->_send_by_post($url, $fields);
		
		return $result;
	}

	function _send_by_post($url, $fields, $path_param = "", $form_post = ""){
		$fields_string = "";
		foreach($fields as $key=>$value) { 
			$fields_string .= $key.'='.$value.'&'; 
		}
		$fields_string = substr($fields_string, 0, -1);
		
		if($path_param != ""){
			$url = $this->chat_api_url.$url."/".$path_param."?".$fields_string;
		}else{
			$url = $this->chat_api_url.$url."?".$fields_string;
		}
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			'Transfer-Encoding: chunked',
			'Accept: application/json',
			'Content-type: application/json',
			'Expect:  '
		) );
		
		if($form_post != ""){
			$form_post_string = "";
			foreach($form_post as $key=>$value) { 
				$form_post_string .= $key.'='.$value.'&'; 
			}
			$form_post_string = substr($form_post_string, 0, -1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $form_post_string);
		}

		$result = trim(curl_exec($ch));
		curl_close($ch);
		
		return json_decode($result);
	}

	function _send_by_get($url, $fields, $path_param = ""){
		$fields_string = "";
		foreach($fields as $key=>$value) { 
			$fields_string .= $key.'='.$value.'&'; 
		}
		$fields_string = substr($fields_string, 0, -1);

		if($path_param != ""){
			$url = $this->chat_api_url.$url."/".$path_param."?".$fields_string;
		}else{
			$url = $this->chat_api_url.$url."?".$fields_string;
		}
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');

		$result = trim(curl_exec($ch));
		curl_close($ch);
		
		return json_decode($result);
	}

	function _send_by_post_fileds($url, $fields, $path_param = "", $content = ""){
		$fields_string = "";
		foreach($fields as $key=>$value) { 
			$fields_string .= $key.'='.$value.'&'; 
		}
		$fields_string = substr($fields_string, 0, -1);
		
		if($path_param != ""){
			$url = $this->chat_api_url.$url."/".$path_param."?".$fields_string;
		}else{
			$url = $this->chat_api_url.$url."?".$fields_string;
		}
		
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
            'Content-Type: application/json; charset=utf-8',  
			'Accept: application/json',  
            'Content-Length: ' . strlen($content))  
        );  
        ob_start();  
        curl_exec($ch);  
        $return_content = ob_get_contents();  
        ob_end_clean();  
	
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        return json_decode($return_content);  
	}
}
