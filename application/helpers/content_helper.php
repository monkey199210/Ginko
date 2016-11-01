<?php
	function chat_content_show($content){
		$content_str = "";
		
		$json_content = json_decode($content);
		
		if(!empty($json_content->file_type)){
			if($json_content->file_type == "photo"){
				$content_str = '<a href="'.$json_content->url.'" class="fancybox_photo" data-fancybox-group="gallery"><img src="'.$json_content->url.'" class="message_img"/></a>';
			}else if($json_content->file_type == "voice"){
				$content_str = '<div class="chatting_audio_control"><audio controls="controls" class="message_audio">';
				$content_str .= '	<source src="'.$json_content->url.'" type="audio/mp4" />';
				$content_str .= '</audio></div>';									
			}else if($json_content->file_type == "video"){
				$content_str = capture_image($json_content->url);
			}
		}else if(strpos($content, '!@!#xyz!@#!')!== false){
			$lan = substr($content, 11, strlen($content));
			$content_str = '<a href="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q='.urlencode(getaddress($lan)).'&aq=&ie=UTF8" target="_blank"><img src="https://maps.googleapis.com/maps/api/staticmap?center='.$lan.'&zoom=11&size=140x140&markers=color:red|color:red|'.$lan.'"></a>';
		}else{
			$content_str = str_replace("\n", "<br/>", linkify($content));
		}

		return $content_str;
	}

	function message_chat_content_show($content){
		$content_str = "";
		
		$json_content = json_decode($content);
		
		if(!empty($json_content->file_type)){
			if($json_content->file_type == "photo"){
				$content_str = '<a href="'.$json_content->url.'" class="fancybox_photo" data-fancybox-group="gallery"><img src="'.$json_content->url.'" class="message_img"/></a>';
			}else if($json_content->file_type == "voice"){
				$content_str = '<div class="chatting_audio_control"><audio controls="controls" class="message_audio">';
				$content_str .= '	<source src="'.$json_content->url.'" type="audio/mp4" />';
				$content_str .= '</audio></div>';									
			}else if($json_content->file_type == "video"){
				$content_str = message_capture_image($json_content->url);
			}
		}else if(strpos($content, '!@!#xyz!@#!')!== false){
			$lan = substr($content, 11, strlen($content));
			$content_str = '<a href="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q='.urlencode(getaddress($lan)).'&aq=&ie=UTF8" target="_blank"><img src="https://maps.googleapis.com/maps/api/staticmap?center='.$lan.'&zoom=11&size=140x140&markers=color:red|color:red|'.$lan.'"></a>';
		}else{
			$content_str = string_truncate($content, 70);
			$content_str = str_replace("\n", "<br/>", linkify($content_str));
		}

		return $content_str;
	}

	function chat_history_content_show($content){
		$content_str = "";
		
		$json_content = json_decode($content);
		
		if(!empty($json_content->file_type)){
			if($json_content->file_type == "photo"){
				$content_str = '#photo';
			}else if($json_content->file_type == "voice"){
				$content_str = '#voice';
			}else if($json_content->file_type == "video"){
				$content_str = '#video';
			}
		}else if(strpos($content, '!@!#xyz!@#!')!== false){
			$content_str = '#location';
		}else{
			$content_str = str_replace("\n", "<br/>",$content);
		}

		return $content_str;
	}

	function chat_json_content_show($content){
		$content_str = "";
		
		$json_content = $content;
		
		if(!empty($json_content->file_type)){
			if($json_content->file_type == "photo"){
				$content_str = '<a href="'.$json_content->url.'" target="_blank"><img src="'.$json_content->url.'" class="message_img"/></a>';
			}else if($json_content->file_type == "voice"){
				$content_str = '<audio controls="controls" class="message_audio">';
				$content_str .= '	<source src="'.$json_content->url.'" type="audio/mp4" />';
				$content_str .= '</audio>';									
			}else if($json_content->file_type == "video"){
				$content_str = '<a href="'.$json_content->url.'" target="_blank"><video controls="controls" width="250" height="150" name="Video Name" src="'.$json_content->url.'"></video></a>';
			}
		}else if(strpos($content, '!@!#xyz!@#!')!== false){
			$lan = substr($content, 11, strlen($content));
			$content_str = '<a href="http://maps.google.com/?q='.$lan.'" target="_blank"><img src="https://maps.googleapis.com/maps/api/staticmap?center='.$lan.'&zoom=11&size=200x200&markers=color:red|color:red|'.$lan.'"></a>';
		}else{
			$content_str = str_replace("\n", "<br/>",$content);
		}

		return $content_str;
	}
	
	function convert_date_string($format, $string, $time_stamp = 0){
		return date($format, strtotime($string) + $time_stamp);
	}
	
	function reconvert_date_string($format, $string, $time_stamp = 0){
		return date($format, strtotime($string) - $time_stamp);
	}
	
	function compare_user_list($str1, $str2){
		$arr1 = explode(",", $str1);
		$arr2 = explode(",", $str2);
		$tmp1 = sizeof($arr1) > sizeof($arr2) ? sizeof($arr1) : sizeof($arr2);
		$tmp = 0;
		
		foreach($arr1 as $key => $value1){
			foreach($arr2 as $key => $value2){
				if($value1 == $value2){
					$tmp++;
				}
			}
		}
		
		if($tmp == sizeof($tmp1)){
			return "1";
		}
		return "0";
	}
	
	function convert_unicode_utf($str){
		$replaced = preg_replace("/\\\\u([0-9A-F]{1,4})/i", "&#x$1;", $str);
		$result = mb_convert_encoding($replaced, "UTF-16", "HTML-ENTITIES");
		$result = mb_convert_encoding($result, 'utf-8', 'utf-16');

		return $result;
	}

	function getaddress($str){
		$tmp = explode(",", $str);
		$lat = $tmp[0];
		$lng = $tmp[1];
		
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
		$json = @file_get_contents($url);
		$data=json_decode($json);
		$status = $data->status;
		if($status=="OK")
			return $data->results[0]->formatted_address;
		else
			return false;
	}
	
	function linkify($value, $protocols = array('http', 'mail'), array $attributes = array()){
		// Link attributes
		$attr = '';
		foreach ($attributes as $key => $val) {
			$attr = ' ' . $key . '="' . htmlentities($val) . '"';
		}
		$links = array();
		// Extract existing links and tags
		$value = preg_replace_callback('~(<a .*?>.*?</a>|<.*?>)~i', function ($match) use (&$links) { return '<' . array_push($links, $match[1]) . '>'; }, $value);
		// Extract text links for each protocol
		foreach ((array)$protocols as $protocol) {
			switch ($protocol) {
				case 'http':
				case 'https': $value = preg_replace_callback('~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) { if ($match[1]) $protocol = $match[1]; $link = $match[2] ?: $match[3]; return '<' . array_push($links, "<a $attr href=\"$protocol://$link\" target=\"_blank\">$link</a>") . '>'; }, $value); break;
				case 'mail': $value = preg_replace_callback('~([^\s<]+?@[^\s<]+?\.[^\s<]+)(?<![\.,:])~', function ($match) use (&$links, $attr) { return '<' . array_push($links, "<a $attr href=\"mailto:{$match[1]}\" target=\"_blank\">{$match[1]}</a>") . '>'; }, $value); break;
				case 'twitter': $value = preg_replace_callback('~(?<!\w)[@#](\w++)~', function ($match) use (&$links, $attr) { return '<' . array_push($links, "<a $attr href=\"https://twitter.com/" . ($match[0][0] == '@' ? '' : 'search/%23') . $match[1] . "\"  target=\"_blank\">{$match[0]}</a>") . '>'; }, $value); break;
				default: $value = preg_replace_callback('~' . preg_quote($protocol, '~') . '://([^\s<]+?)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) { return '<' . array_push($links, "<a $attr href=\"$protocol://{$match[1]}\"  target=\"_blank\">{$match[1]}</a>") . '>'; }, $value); break;
			}
		}
		// Insert all link
		return preg_replace_callback('/<(\d+)>/', function ($match) use (&$links) { return $links[$match[1] - 1]; }, $value);
	} 

	function capture_image($url){
		$paths = parse_url($url);
		$str = explode('/', $paths['path']);
		$file_path = 'assets/chat/tmp/';
		$str1 = explode('.', $str[sizeof($str) - 1]);
		$thumbnail = $str1[0].'.png';

		shell_exec('ffmpeg -i '.$url.' -an -f image2 '.$file_path.$thumbnail);
		return '<a href="javascript:void(0);" class="fancybox_video" url="'.$url.'" style="background: url('.base_url().$file_path.$thumbnail.') no-repeat scroll center center rgba(0, 0, 0, 0);"></a>';
	}

	function message_capture_image($url){
		$paths = parse_url($url);
		$str = explode('/', $paths['path']);
		$file_path = 'assets/chat/tmp/';
		$str1 = explode('.', $str[sizeof($str) - 1]);
		$thumbnail = $str1[0].'.png';

		shell_exec('ffmpeg -i '.$url.' -an -f image2 '.$file_path.$thumbnail);
   		return '<a href="javascript:void(0);" class="fancybox_video message_fancybox_video" url="'.$url.'" style="width: 140px !important; height: 100px; background: url('.base_url().$file_path.$thumbnail.') no-repeat scroll center center rgba(0, 0, 0, 0);"></a>';
	}

	function string_truncate($text, $chars = 25) {
		$tmp = $text;
		if(strlen($text) > $chars){
		    $text = $text." ";
		    $text = substr($text, 0, $chars);
		    $text = substr($text, 0, strrpos($text, ' '));
		    $text = $text."...";
		    return "<span class='truncate_string'>".$text."</span><span class='truncate_string_hidden'>".$tmp."</span>";
		}else{
			return $text;
		}
	}	

?>