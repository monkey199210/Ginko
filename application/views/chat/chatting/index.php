
<div class="header_container">
	<a href="javascript:void(0);" class="chatting_edit">edit</a>
	<a href="<?php echo base_url(); ?>chat/history" class="home_img"><img src="<?php echo base_url(CHAT_IMAGES.'home_icon.png'); ?>" alt="Home Icon Image"/></a>
	<div class="chatting_select">
		<div class="search_checkbox">
			<input type="checkbox" id="check1" class="chatting_select_check"/>
			<label for="check1"></label>
		</div>
		<p>Select all</p>
	</div>
	<a href="javascript:void(0);" class="chatting_edit_close"><i class="fa fa-times"></i></a>
	<h3 class="header_name">
		<?php 
			if(sizeof($contact_data) == 1){
				echo $contact_data[0]['first_name']." ".$contact_data[0]['middle_name']." ".$contact_data[0]['last_name'];
			}else if(sizeof($contact_data) > 1){
				echo $contact_data[0]['first_name']." ".$contact_data[0]['middle_name']." ".$contact_data[0]['last_name']." + ".(sizeof($contact_data) - 1);
			}
		?>
	</h3>
	<span class="chatting_new_message_mark"></span>
</div>

<div class="main_container chatting_container" id="chatting_container">
	<?php
		if(sizeof($message_history) > 0){
			for($i = 0; $i < sizeof($message_history); $i++){
				if($message_history[$i]->send_from != $user_id){
	?>
					<div class="chatting_content" msg_id="<?php echo $message_history[$i]->msg_id; ?>">
						<div class="chatting_check">
							<div class="search_checkbox">
								<input type="checkbox" id="check_<?php echo $message_history[$i]->msg_id; ?>" value="<?php echo $message_history[$i]->msg_id; ?>" class="msg_check"/>
								<label for="check_<?php echo $message_history[$i]->msg_id; ?>"></label>
							</div>
						</div>
						<div class="chatting_img">
							<?php
								foreach($contact_data as $key => $contact){
									if($contact['user_id'] == $message_history[$i]->send_from){
							?>
										<img src="<?php echo $contact['photo']; ?>"/>
										<p><?php echo substr($contact['first_name'], 0, 1)." ".substr($contact['last_name'], 0, 1); ?></p>
							<?php			
									}
								}
							?>
						</div>
						<div class="chatting_wrapper">
							<div class="chatting_sub_1">
								<p><?php echo convert_date_string('M d, Y h:i A', $message_history[$i]->send_time, $time_stamp); ?></p>
								<div class="clearfix"></div>
								<div class="chatting_txt">
									<?php echo chat_content_show($message_history[$i]->content); ?>
								</div>
							</div>
						</div>
					</div>
	<?php				
				}else{
	?>
					<div class="chatting_content" msg_id="<?php echo $message_history[$i]->msg_id; ?>">
						<div class="chatting_check">
							<div class="search_checkbox">
								<input type="checkbox" id="check_<?php echo $message_history[$i]->msg_id; ?>" value="<?php echo $message_history[$i]->msg_id; ?>" class="msg_check"/>
								<label for="check_<?php echo $message_history[$i]->msg_id; ?>"></label>
							</div>
						</div>
						<div class="chatting_wrapper">
							<div class="chatting_sub_2">
								<p><?php echo convert_date_string('M d, Y h:i A', $message_history[$i]->send_time, $time_stamp); ?></p>
								<div class="clearfix"></div>
								<div class="chatting_txt">
									<?php echo chat_content_show($message_history[$i]->content); ?>
								</div>
							</div>
						</div>
					</div>
	<?php				
				}
			}
		}
	?>
</div>

<div class="footer_container">
	<div class="footer_content">
		<div class="footer_input_wrapper">
			<div class="chatting_send_input" contenteditable="true"></div>
		</div>
		<div class="footer_right_wrapper">
			<div class="chatting_key_check_content">
				<div class="search_checkbox">
					<input type="checkbox" id="check_key_chatting" class="chatting_key_check"/>
					<label for="check_key_chatting"></label>
				</div>
				<img src="<?php echo base_url(CHAT_IMAGES.'return.png'); ?>" alt=""/>
			</div>
			<a href="javascript:void(0);" class="chatting_emoticon">emoticon</a>
			<div class="clearfix"></div>
			<a href="javascript:void(0);" class="chatting_send_btn">Send</a>
		</div>
	</div>
	<div class="footer_edit_content">
		<a href="javascript:void(0);" class="chatting_del_btn"><i class="fa fa-trash"></i></a>
	</div>
</div>

<div class="emoticon_popup" id="chatting_emoticon_content">
	<a href="javascript:void(0);" class="emoticon_popup_close" id="chatting_emoticon_content_close">Close</a>
	<ul class="emoticon_popup_top">
		<li>
			<a href="#emoticon_1">emoticon1</a>
		</li>
		<li>
			<a href="#emoticon_2">emoticon2</a>
		</li>
		<li>
			<a href="#emoticon_3">emoticon3</a>
		</li>
		<li class="active">
			<a href="#emoticon_4">emoticon4</a>
		</li>
	</ul>
	
	<div class="emoticon_popup_content" id="emoticon_1">
		<div class="flexslider emoticon_icon_slider">
  			<ul class="slides">
				<?php
					if(!empty($emoticon_list) && !empty($emoticon_list['dict'][0]['array'][1]['string'])){
						for($i = 0; $i < sizeof($emoticon_list['dict'][0]['array'][1]['string']); $i++){
							if($i % 21 == 0){
								echo "<li>";
								echo "<div class='emoticon_icon_imgs'>";
							}
							echo "<span><i>".$emoticon_list['dict'][0]['array'][1]['string'][$i]."</i></span>";
							if($i % 21 == 20){
								echo "</div>";
								echo "</li>";
							}
						}
					}
				?>
			</ul>
		</div>
	</div>
	<div class="emoticon_popup_content" id="emoticon_2">
		<div class="flexslider emoticon_icon_slider">
  			<ul class="slides">
				<?php
					if(!empty($emoticon_list) && !empty($emoticon_list['dict'][0]['array'][3]['string'])){
						for($i = 0; $i < sizeof($emoticon_list['dict'][0]['array'][3]['string']); $i++){
							if($i % 21 == 0){
								echo "<li>";
								echo "<div class='emoticon_icon_imgs'>";
							}
							echo "<span><i>".$emoticon_list['dict'][0]['array'][3]['string'][$i]."</i></span>";
							if($i % 21 == 20){
								echo "</div>";
								echo "</li>";
							}
						}
					}
				?>
			</ul>
		</div>
	</div>
	<div class="emoticon_popup_content" id="emoticon_3">
		<div class="flexslider emoticon_icon_slider">
  			<ul class="slides">
				<?php
					if(!empty($emoticon_list) && !empty($emoticon_list['dict'][0]['array'][2]['string'])){
						for($i = 0; $i < sizeof($emoticon_list['dict'][0]['array'][2]['string']); $i++){
							if($i % 21 == 0){
								echo "<li>";
								echo "<div class='emoticon_icon_imgs'>";
							}
							echo "<span><i>".$emoticon_list['dict'][0]['array'][2]['string'][$i]."</i></span>";
							if($i % 21 == 20){
								echo "</div>";
								echo "</li>";
							}
						}
					}
				?>
			</ul>
		</div>
	</div>
	<div class="emoticon_popup_content active" id="emoticon_4">
		<div class="flexslider emoticon_icon_slider">
  			<ul class="slides">
				<?php
					if(!empty($emoticon_list) && !empty($emoticon_list['dict'][0]['array'][0]['string'])){
						for($i = 0; $i < sizeof($emoticon_list['dict'][0]['array'][0]['string']); $i++){
							if($i % 21 == 0){
								echo "<li>";
								echo "<div class='emoticon_icon_imgs'>";
							}
							echo "<span><i>".$emoticon_list['dict'][0]['array'][0]['string'][$i]."</i></span>";
							if($i % 21 == 20){
								echo "</div>";
								echo "</li>";
							}
						}
					}
				?>
			</ul>
		</div>
	</div>
</div>

<div class="contact_list_container">
	<div class="contact_list_top">
		<a href="javascript: void(0);" class="contact_list_back"><i class="fa fa-arrow-left"></i></a>
		<h3 class="contact_list_name">Selected Contact(s)</h3>
	</div>
	<?php
		if(!empty($contact_data) && sizeof($contact_data) > 0){
	?>
			<ul class="contact_list">
	<?php
				for($i = 0; $i < sizeof($contact_data); $i++){
	?>
					<li>
						<div class="contact_img">
							<img src="<?php echo $contact_data[$i]['photo']; ?>" alt=""/>
						</div>
						<h4><?php echo $contact_data[$i]['first_name']." ".$contact_data[$i]['last_name']; ?></h4>
					</li>
	<?php
				}
	?>
			</ul>
	<?php
		}
	?>
</div>

<div class="chatting_video_content">
	
</div>



<input type="hidden" id="site_url" value="<?php echo site_url(); ?>"/>
<input type="hidden" id="board_id" value="<?php echo $board_id; ?>"/>
<input type="hidden" id="user_ids" value="<?php echo $user_ids; ?>"/>

<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'jquery.flexslider.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'mediaelement-and-player.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'jquery.fancybox.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'jquery.fancybox-media.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'twemoji.min.js'); ?>"></script>

<script>
    var month = new Array(11);
    month[0] = "Jan";
    month[1] = "Feb";
    month[2] = "Mar";
    month[3] = "Apr";
    month[4] = "May";
    month[5] = "Jun";
    month[6] = "Jul";
    month[7] = "Aug";
    month[8] = "Sep";
    month[9] = "Oct";
    month[10] = "Nov";
    month[11] = "Dec";
    
    var new_message = 0;
    var history_state = 0;
    var check_state = 0;
    
 	$(document).ready(function(){
		$('.chatting_emoticon').click(function(){
			$('#chatting_emoticon_content').show();
			$(window).trigger('resize');
		});

		$('#chatting_emoticon_content_close').click(function(){
			$('#chatting_emoticon_content').hide();
		});

		$('.emoticon_popup_top li a').click(function(event){
			$('.emoticon_popup_top li').removeClass('active');
			$(this).parent().addClass('active');
			
			href_str = $(this).attr('href');
			
			$('.emoticon_popup_content').removeClass('active');
			$(href_str).addClass('active');
			
			$(window).trigger('resize');
			
			event.preventDefault();
		});
		
		$('.emoticon_icon_imgs span i').click(function(){
			emoticon_icon = $(this).html();
			chatting_send_input = $('.chatting_send_input').html();
			$('.chatting_send_input').html(chatting_send_input + emoticon_icon);
		});

		$('.flexslider').flexslider({
			animation: "slide",
			prevText: "",          
    		nextText: "",
    		pauseOnAction: false ,
    		slideshow: false
		});
		
		$('.chatting_send_btn').click(function(){
			chat_send();
		});
		
		$(".chatting_send_input").keypress(function(e){
			if($('.chatting_key_check').is(':checked')){
		        if(e.which==13){
		        	chat_send();
		        }
			}
	    });

		$('.chatting_edit').click(function(){
			$('.chatting_edit').hide();
			$('.home_img').hide();
			$('.chatting_new_message_mark').hide();
			$('.footer_content').hide();
			$('.chatting_select').show();
			$('.chatting_edit_close').show();
			$('.footer_edit_content').show();
			$('.main_container').addClass('chatting_edit_content');
		});

		$('.chatting_edit_close').click(function(){
			$('.chatting_edit').show();
			$('.home_img').show();
			if(new_message > 0){
				$('.chatting_new_message_mark').show();
				$('.chatting_new_message_mark').html(new_message);
			}
			$('.footer_content').show();
			$('.chatting_select').hide();
			$('.chatting_edit_close').hide();
			$('.footer_edit_content').hide();
			$('.main_container').removeClass('chatting_edit_content');
		});

		$('.header_name').click(function(){
			$('.contact_list_container').show();
		});

		$('.contact_list_back').click(function(){
			$('.contact_list_container').hide();
		});

		setTimeout(function() {
			if(check_state == 0){
				check_message();
			}
		}, 1000);

		$('.chatting_select_check').click(function(){
			if($(this).is(':checked')){
				$('.chatting_container').find('.msg_check').each(function(){
					$(this).attr('checked', 'checked');
					$(this).prop('checked', 'checked');
				});
			}else{
				$('.chatting_container').find('.msg_check').each(function(){
					$(this).attr('checked', '');
					$(this).prop('checked', '');
				});
			}	
		});

		$('.chatting_del_btn').click(function(){
			var site_url = $('#site_url').val();
			var board_id = $('#board_id').val();
			var msg_ids = "";
			var msg_id_list = Array();
			
			i = 0;
			$('.main_container').find('.msg_check').each(function(){
				if($(this).is(':checked')){
					msg_ids += $(this).val() + ",";
					msg_id_list[i] = $(this).val();
					i++;
				}
			});
			
			msg_ids = msg_ids.substring(0, msg_ids.length - 1);
			
			if(msg_ids == ""){
				alert("Please select message");
			}else{
				$.post(site_url + 'chat/chatting/delete_message',{
					board_id : board_id,
					msg_ids : msg_ids
				}, function(rs){
					if(rs == '1'){
						for(i = 0; i < msg_id_list.length; i++){
							$('.main_container').find('.chatting_content').each(function(){
								if(msg_id_list[i] == $(this).attr('msg_id')){
									$(this).remove();
								}
							});
						}
					}
				});		
			}
		});

		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
		
		$(window).scroll(function () {
			if($(window).scrollTop() == 0){
				if(history_state == 0){
					get_history_message();
				}
			}
		});
		
		chatting_control_description();
	});
	
	function check_message(){
		var site_url = $('#site_url').val();
		var board_id = $('#board_id').val();
		check_state = 1;

		$.post(site_url + 'chat/chatting/check_new_message',{
			board_id : board_id
		}, function(rs){
			if(rs != ""){
				if(isNaN(rs)){
					chat_html_str = "";
					try{
						result = JSON.parse(rs);
						for(i = 0; i < result.length; i++){
							chat_html = '<div class="chatting_content" msg_id="'+ result[i]['msg_id'] +'" status = "new">';
							chat_html += '<div class="chatting_check">';
							chat_html += '<div class="search_checkbox">';
							chat_html += '<input type="checkbox" id="check_'+ result[i]['msg_id'] +'" value="'+ result[i]['msg_id'] +'" class="msg_check"/>';
							chat_html += '<label for="check_'+ result[i]['msg_id'] +'"></label>';
							chat_html += '</div>';
							chat_html += '</div>';
							chat_html += '<div class="chatting_img">';
							chat_html += '<img src="'+result[i]['photo']+'"/>';
							chat_html += '<p>'+result[i]['name']+'</p>';
							chat_html += '</div>';
							chat_html += '<div class="chatting_wrapper">';
							chat_html += '<div class="chatting_sub_1">';
							chat_html += '<p>'+result[i]['send_time']+'</p>';
							chat_html += '<div class="clearfix"></div>';
							chat_html += '<div class="chatting_txt">';
							chat_html += result[i]['content'];
							chat_html += '</div>';
							chat_html += '</div>';
							chat_html += '</div>';
							chat_html += '</div>';
							chat_html_str += chat_html;
						}
					}catch(e){
						
					}
					if(chat_html_str != ""){
						$('.chatting_container').append(chat_html_str);
						$("html, body").animate({ scrollTop: $(document).height() }, 1000);
						chatting_control_description();
					}
				}else if(!isNaN(rs)){
					new_message++;
					if(new_message > 0){
						$('.chatting_new_message_mark').show();
						$('.chatting_new_message_mark').html(new_message);
					}
				}
			}
			check_state = 0;
			setTimeout(function() {
				if(check_state == 0){
					check_message();
				}
			}, 1000);
		});
	}
	
	function chat_send(){
		var site_url = $('#site_url').val();
		var board_id = $('#board_id').val();
		var content_tmp = $('.chatting_send_input').html();
		
		content_array = content_tmp.split("<br>");
		content = "";
		for(var i = 0; i < content_array.length; i++){
			content_str_tmp = content_array[i].replace(/&nbsp;/g, ' ').replace(/<\/?(div)\b[^<>]*>/g, '').replace(/<\/?(p)\b[^<>]*>/g, '').trim();
			if(content_str_tmp != ''){
				content += content_str_tmp + "<br>";
			}
		}
		
		if(content != ""){
			content = content.substr(0, content.length - 4);
			$.post(site_url + 'chat/chatting/send_message',{
				board_id : board_id,
				content : content
			}, function(rs){
				if(rs != ""){
					try{
						result = JSON.parse(rs);
						chat_html = '<div class="chatting_content" msg_id="'+ result['msg_id'] +'">';
						chat_html += '<div class="chatting_check">';
						chat_html += '<div class="search_checkbox">';
						chat_html += '<input type="checkbox" id="check_'+ result['msg_id'] +'" value="'+ result['msg_id'] +'" class="msg_check"/>';
						chat_html += '<label for="check_'+ result['msg_id'] +'"></label>';
						chat_html += '</div>';
						chat_html += '</div>';
						chat_html += '<div class="chatting_wrapper">';
						chat_html += '<div class="chatting_sub_2">';
						chat_html += '<p>'+result['send_time']+'</p>';
						chat_html += '<div class="clearfix"></div>';
						chat_html += '<div class="chatting_txt">';
						chat_html += result['content'];
						chat_html += '</div>';
						chat_html += '</div>';
						chat_html += '</div>';
						chat_html += '</div>';
						$('.chatting_container').append(chat_html);
						$("html, body").animate({ scrollTop: $(document).height() }, 1000);
						$('.chatting_send_input').html('');
						chatting_control_description();
					}catch(e){
						
					}
				}
			});
		}else{
			$('.chatting_send_input').html('');
			$('.chatting_send_input').focus();
		}
	}
	
	function get_history_message(){
		var site_url = $('#site_url').val();
		var board_id = $('#board_id').val();
		history_state = 1;
		
		last_date = $('.chatting_container .chatting_content:first-child').find('.chatting_wrapper p').html();
		
		$.post(site_url + 'chat/chatting/get_history_message',{
			board_id : board_id,
			last_date : last_date
		}, function(rs){
			if(rs != ""){
				$('.chatting_container .chatting_content:first-child').before(rs);
				chatting_control_description();
			}
			history_state = 0;
		});
	}
	
	function chatting_control_description(){
		$('.chatting_audio_control audio').mediaelementplayer({
			defaultAudioWidth: 200
		});
		
		$(".fancybox_photo")
		    .attr('rel', 'gallery')
		    .fancybox({
		        padding    : 0,
		        margin     : 5,
		        nextEffect : 'fade',
		        prevEffect : 'none',
		        afterLoad  : function () {
		            $.extend(this, {
		                aspectRatio : false,
		                type    : 'html',
		                width   : '100%',
		                height  : '100%',
		                content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
		            });
		        }
		    });
		    
		$('.fancybox_video').click(function(){
			$('.chatting_video_content').html('<video src="'+$(this).attr('url')+'" width="360" height="250"></video>');
			$('.chatting_video_content video').mediaelementplayer({
			    success: function(player, node) {
			        $('.mejs-overlay-button').trigger('click');
			    }
			});
			
			$.fancybox.open({
				href : '.chatting_video_content',
				type : 'inline',
				padding : 0,
				margin  : 5,
				scrolling : 'no'
			});
		});

	    twemoji.parse(document.getElementById('chatting_emoticon_content'), {size: 72});
	    twemoji.parse(document.getElementById('chatting_container'), {size: 72});
	}
	
</script>

