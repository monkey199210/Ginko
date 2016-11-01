<?php
date_default_timezone_set('America/Los_Angeles');
?>

<div class="header_container history_header">
	<a href="<?php echo base_url(); ?>chat/user/log_out" class="logout">Logout</a>
	<a href="javascript: void(0);" class="logo_img"><img src="<?php echo base_url(CHAT_IMAGES.'ginko_logo_blue.png'); ?>" alt="Logo Image"/></a>
	<a href="<?php echo base_url(); ?>chat/contact" class="history_img"><img src="<?php echo base_url(CHAT_IMAGES.'history.png'); ?>" alt="History Image"/></a>
	<div class="chatting_select" id="chatting_select1">
		<div class="search_checkbox">
			<input type="checkbox" id="chatting_check1" class="chatting_select_check"/>
			<label for="chatting_check1"></label>
		</div>
		<p>Select all</p>
	</div>
	<a href="javascript:void(0);" class="chatting_edit_close"><i class="fa fa-times"></i></a>
	<div class="chatting_select" id="chatting_select2">
		<div class="search_checkbox">
			<input type="checkbox" id="chatting_check2" class="chatting_select_check"/>
			<label for="chatting_check2"></label>
		</div>
		<p>Select all</p>
	</div>
	<a href="javascript:void(0);" class="chatting_edit_close1"><i class="fa fa-times"></i></a>
</div>

<ul class="chat_tabs">
	<li class="active"><a href="#chat_history" class="chat_history"><i></i><span>Chat History</span></a></li>
	<li><a href="#ginko_posts" class="ginko_posts"><i></i><span>Ginko Posts</span></a></li>
</ul>

<div class="chat_tabs_content active" id="chat_history">
	<div class="main_container">
		<div class="search_content">
			<a href="javascript: void(0);" class="chat_edit"><img src="<?php echo base_url(CHAT_IMAGES.'edit.png'); ?>" alt=""/></a>
			<div class="search_input">
				<input type="text" class="history_search"/>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<?php
			$chat_history_name = array();
			$i = 0;
			if(!empty($chat_history)){
		?>
				<ul class="chat_history_list history_list_message">
		<?php
					foreach($chat_history as $key => $chat_history_content){
						$board_id = $chat_history_content->board_id;
						foreach($chat_history_content->recent_messages as $key1 => $chat_history_recent){
							$user_ids = "";
							foreach($chat_history_content->members as $key1 => $value){
								$user_ids .= $value->memberinfo->user_id.urlencode(",");
							}
							if($user_ids != ""){
								$user_ids = substr($user_ids, 0, -3);
							}
		?>
							<li id="<?php echo $i + 1; ?>" class="<?php echo $chat_history_recent->is_read == 'true' ? '' : 'unread'; ?>" board_id="<?php echo $board_id; ?>">
								<div class="chatting_check">
									<div class="search_checkbox">
										<input type="checkbox" id="check_<?php echo $board_id; ?>" value="<?php echo $board_id; ?>" class="msg_check"/>
										<label for="check_<?php echo $board_id; ?>"></label>
									</div>
								</div>
								<a href="<?php echo base_url(); ?>chat/chatting/index/<?php echo $user_ids; ?>/<?php echo $board_id; ?>">
									<div class="contact_img">
										<?php 
											foreach($chat_history_content->members as $key1 => $value){
												if($chat_history_recent->send_from == $value->memberinfo->user_id){
										?>
													<img src="<?php echo $value->memberinfo->photo_url == '' ? base_url(CHAT_FACE_IMAGES) : $value->memberinfo->photo_url; ?>" alt=""/>
										<?php
												}
											}
										?>
									</div>
									<div class="chat_txt">
										<h4>
											<?php 
												$name_tmp = array();
												$j = 0;
												foreach($chat_history_content->members as $key1 => $value){
													if($user_id != $value->memberinfo->user_id){
														$name_tmp[$j] = $value->memberinfo->fname." ".$value->memberinfo->mname." ".$value->memberinfo->lname;
														$j++;
													}
												}
												if(sizeof($name_tmp) == 1){
													echo $name_tmp[0];
													$chat_history_name[$i] = $name_tmp[0];
													$i++;
												}else if(sizeof($name_tmp) > 1){
													$name_real = $name_tmp[0]."<i> + ".(sizeof($name_tmp) - 1)."</i>";
													echo $name_real;
													$chat_history_name[$i] = $name_real;
													$i++;
												}
											?>
										</h4>
										<p><?php echo chat_history_content_show($chat_history_recent->content); ?></p>
									</div>
									<div class="chat_date">
										<?php
											if($chat_history_recent->send_from == $user_id){
										?>
												<i class="fa fa-arrow-right"></i>
										<?php
											}else{
										?>
												<i class="fa fa-arrow-left"></i>
										<?php		
											}
										?>
										<div class="clearfix"></div>
										<p><?php echo convert_date_string('M d, Y', $chat_history_recent->send_time, $time_stamp); ?></p>
									</div>
								</a>
								<div class="contact_list_container">
									<div class="contact_list_top">
										<a href="javascript: void(0);" class="contact_list_back"><i class="fa fa-arrow-left"></i></a>
										<h3 class="contact_list_name">Selected Contact(s)</h3>
									</div>
									<?php
										if(!empty($chat_history_content->members)){
									?>
											<ul class="contact_list">
									<?php
												foreach($chat_history_content->members as $key1 => $value){
													if($user_id != $value->memberinfo->user_id){
									?>
														<li>
															<div class="contact_img">
																<img src="<?php echo $value->memberinfo->photo_url == '' ? base_url(CHAT_FACE_IMAGES) : $value->memberinfo->photo_url; ?>" alt=""/>
															</div>
															<h4><?php echo $value->memberinfo->fname." ".$value->memberinfo->mname." ".$value->memberinfo->lname; ?></h4>
														</li>
									<?php
													}
												}
									?>
											</ul>
									<?php
										}
									?>
								</div>
							</li>
		<?php
						}
					}
		?>
				</ul>
				<h3 class="empty_content history_empty" style="display: none;">Select the chat icon to message a contact</h3>
		<?php
			}else{
		?>
				<h3 class="empty_content">Select the chat icon to message a contact</h3>
		<?php		
			}
		?>
	</div>
</div>

<div class="chat_tabs_content" id="ginko_posts">
	<div class="main_container">
		<div class="search_content">
			<a href="javascript:void(0);" class="message_chat_edit"><img src="<?php echo base_url(CHAT_IMAGES.'edit.png'); ?>" alt=""/></a>
			<div class="search_input">
				<input type="text" class="posts_search"/>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<?php
			$post_list = array();
			if(!empty($message['data'])){
		?>
				<ul class="chat_history_list ginko_posts_list">
		<?php
					for($i = 0; $i < sizeof($message['data']); $i++){
						$post_list[$i] = $message['data'][$i]['entity_name'];
		?>
						<li id="post_<?php echo $i + 1; ?>" msg_id = "<?php echo $message['data'][$i]['msg_id']; ?>">
							<div class="chatting_check">
								<div class="search_checkbox">
									<input type="checkbox" id="check_<?php echo $message['data'][$i]['msg_id']; ?>" value="<?php echo $message['data'][$i]['msg_id']; ?>" class="msg_check"/>
									<label for="check_<?php echo $message['data'][$i]['msg_id']; ?>"></label>
								</div>
							</div>
							<div class="contact_img">
								<img src="<?php echo $message['data'][$i]['profile_image'] == "" ? base_url(CHAT_IMAGES.'ginko.png') : $message['data'][$i]['profile_image']; ?>" alt=""/>
							</div>
							<div class="chat_txt">
								<h4 class="msg_name"><?php echo $message['data'][$i]['entity_name']; ?></h4>
								<p><?php echo message_chat_content_show($message['data'][$i]['content']); ?></p>
							</div>
							<div class="chat_date">
								<p><?php echo convert_date_string('M d, Y', $message['data'][$i]['sent_time'], $time_stamp); ?></p>
							</div>
						</li>
		<?php
					}
		?>
				</ul>
				<h3 class="empty_content message_empty" style="display: none;">Sorry, no posts to view. Check back later</h3>
		<?php
			}else{
		?>
				<h3 class="empty_content">Sorry, no posts to view. Check back later</h3>
		<?php		
			}
		?>
	</div>
</div>

<div class="footer_history_content" id="footer_history_content1">
	<a href="javascript:void(0);" class="chatting_del_btn" id="chatting_del_btn1"><i class="fa fa-trash"></i></a>
</div>
<div class="footer_history_content" id="footer_history_content2">
	<a href="javascript:void(0);" class="chatting_del_btn" id="chatting_del_btn2"><i class="fa fa-trash"></i></a>
</div>

<div class="chatting_video_content">
	
</div>

<div class="truncate_container">
	<div class="truncate_content_top">
		<a href="javascript: void(0);" class="truncate_content_back"><i class="fa fa-arrow-left"></i></a>
		<h3 class="truncate_content_name"></h3>
	</div>
	<div class="truncate_content">
		
	</div>
</div>


<input type="hidden" id="site_url" value="<?php echo site_url(); ?>"/>

<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'mediaelement-and-player.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'jquery.fancybox.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'jquery.fancybox-media.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'twemoji.min.js'); ?>"></script>

<script>
	var history_list = [];
	<?php
		for($i = 0; $i < sizeof($chat_history_name); $i++){
	?>
			history_list[<?php echo $i;?>] = "<?php echo $chat_history_name[$i]; ?>";
	<?php
		}
	?>

	var post_list = [];
	<?php
		for($i = 0; $i < sizeof($post_list); $i++){
	?>
			post_list[<?php echo $i;?>] = "<?php echo $post_list[$i]; ?>";
	<?php
		}
	?>

	var post_list_cnt = 0;
	var post_list_cnt_tmp = 0;

	$(document).ready(function(){
		$('.chat_tabs li a').click(function(event){
			$('.chat_tabs li').removeClass('active');
			$(this).parent().addClass('active');
			
			href_str = $(this).attr('href');
			
			$('.chat_tabs_content').removeClass('active');
			$(href_str).addClass('active');
			
			event.preventDefault();

			$('.logout').show();
			$('.history_img').show();
			$('#chatting_select1').hide();
			$('.chatting_edit_close').hide();
			$('#footer_history_content1').hide();
			$('.history_list_message').removeClass('chatting_edit_content');
			$('#chatting_select2').hide();
			$('.chatting_edit_close1').hide();
			$('#footer_history_content2').hide();
			$('.ginko_posts_list').removeClass('chatting_edit_content');
		});

		
		$('.history_search').keyup(function(){
			var str = $(this).val().trim();

			if(str != ""){
				$('.chat_history_list').find('li').each(function(){
					$(this).hide();
				});console.log(history);
				history_list.forEach(function(d, i){
					d1 = d.toLowerCase();
					str1 = str.toLowerCase();
					if(d1.search(str1) >= 0){
						$('.chat_history_list').find('li').each(function(){
							if($(this).attr("id") == i+1){
								$(this).show();
							}
						});
					}
				});
			}else{
				$('.chat_history_list').find('li').each(function(){
					$(this).show();
				});
			}
		});
		
		$('.posts_search').keyup(function(){
			var str = $(this).val().trim();

			if(str != ""){
				$('.ginko_posts_list').find('li').each(function(){
					$(this).hide();
				});
				post_list.forEach(function(d, i){
					d1 = d.toLowerCase();
					str1 = str.toLowerCase();
					if(d1.search(str1) >= 0){
						$('.ginko_posts_list').find('li').each(function(){
							if($(this).attr("id") == "post_"+(i+1)){
								$(this).show();
							}
						});
					}
				});
			}else{
				$('.ginko_posts_list').find('li').each(function(){
					$(this).show();
				});
			}
		});
		
		$('.chat_txt h4 i').click(function(event){
			event.preventDefault();
			$(this).parent().parent().parent().parent().find('.contact_list_container').show();
		});
		
		$('.contact_list_back').click(function(){
			$(this).parent().parent().hide();
		});

		setTimeout(function() {
			check_message();
		}, 1000);
		
		$('.chat_edit').click(function(){
			if($('.history_list_message').hasClass('chatting_edit_content')){
				$('.logout').show();
				$('.history_img').show();
				$('#chatting_select1').hide();
				$('.chatting_edit_close').hide();
				$('#footer_history_content1').hide();
				$('.history_list_message').removeClass('chatting_edit_content');
			}else{
				$('.logout').hide();
				$('.history_img').hide();
				$('#chatting_select1').show();
				$('.chatting_edit_close').show();
				$('#footer_history_content1').show();
				$('.history_list_message').addClass('chatting_edit_content');
			}
		});

		$('.chatting_edit_close').click(function(){
			$('.logout').show();
			$('.history_img').show();
			$('#chatting_select1').hide();
			$('.chatting_edit_close').hide();
			$('#footer_history_content1').hide();
			$('.history_list_message').removeClass('chatting_edit_content');
		});
		
		$('#chatting_check1').click(function(){
			if($(this).is(':checked')){
				$('.history_list_message').find('.msg_check').each(function(){
					$(this).attr('checked', 'checked');
					$(this).prop('checked', 'checked');
				});
			}else{
				$('.history_list_message').find('.msg_check').each(function(){
					$(this).attr('checked', '');
					$(this).prop('checked', '');
				});
			}	
		});

		$('#chatting_del_btn1').click(function(){
			var site_url = $('#site_url').val();
			var board_ids = "";
			var board_id_list = Array();
			
			i = 0;
			$('.history_list_message').find('.msg_check').each(function(){
				if($(this).is(':checked')){
					board_ids += $(this).val() + ",";
					board_id_list[i] = $(this).val();
					i++;
				}
			});
			
			board_ids = board_ids.substring(0, board_ids.length - 1);
			
			if(board_ids == ""){
				alert("Please select chat board");
			}else{
				$.post(site_url + 'chat/history/delete_chat_board',{
					board_ids : board_ids
				}, function(rs){
					if(rs == '1'){
						for(i = 0; i < board_id_list.length; i++){
							$('.history_list_message').find('li').each(function(){
								if(board_id_list[i] == $(this).attr('board_id')){
									$(this).remove();
								}
							});
						}
						
						k = 0;
						$('.history_list_message').find('li').each(function(){
							k++;
						});
						if(k == 0){
							$('.history_empty').show();
						}
					}
				});		
			}
		});
		
		$('.message_chat_edit').click(function(){
			if($('.ginko_posts_list').hasClass('chatting_edit_content')){
				$('.logout').show();
				$('.history_img').show();
				$('#chatting_select2').hide();
				$('.chatting_edit_close1').hide();
				$('#footer_history_content2').hide();
				$('.ginko_posts_list').removeClass('chatting_edit_content');
			}else{
				$('.logout').hide();
				$('.history_img').hide();
				$('#chatting_select2').show();
				$('.chatting_edit_close1').show();
				$('#footer_history_content2').show();
				$('.ginko_posts_list').addClass('chatting_edit_content');
			}
		});

		$('.chatting_edit_close1').click(function(){
			$('.logout').show();
			$('.history_img').show();
			$('#chatting_select2').hide();
			$('.chatting_edit_close1').hide();
			$('#footer_history_content2').hide();
			$('.ginko_posts_list').removeClass('chatting_edit_content');
		});
		
		$('#chatting_check2').click(function(){
			if($(this).is(':checked')){
				$('.ginko_posts_list').find('.msg_check').each(function(){
					$(this).attr('checked', 'checked');
					$(this).prop('checked', 'checked');
				});
			}else{
				$('.ginko_posts_list').find('.msg_check').each(function(){
					$(this).attr('checked', '');
					$(this).prop('checked', '');
				});
			}	
		});

		$('#chatting_del_btn2').click(function(){
			var site_url = $('#site_url').val();
			var msg_ids = "";
			var msg_id_list = Array();
			
			i = 0;
			$('.ginko_posts_list').find('.msg_check').each(function(){
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
				$.post(site_url + 'chat/history/delete_message',{
					msg_ids : msg_ids
				}, function(rs){
					if(rs == '1'){
						for(i = 0; i < msg_id_list.length; i++){
							$('.ginko_posts_list').find('li').each(function(){
								if(msg_id_list[i] == $(this).attr('msg_id')){
									$(this).remove();
								}
							});
						}
						
						k = 0;
						$('.ginko_posts_list').find('li').each(function(){
							k++;
						});
						if(k == 0){
							$('.message_empty').show();
						}
					}
				});		
			}
		});
		
		$('.truncate_string').click(function(){
			text = $(this).parent().find('.truncate_string_hidden').html();
			name = $(this).parent().parent().find('.msg_name').html();
			
			$('.truncate_container').show();
			$('.truncate_content_name').html(name);
			$('.truncate_content').html(text);
		});
		
		$('.truncate_content_back').click(function(){
			$('.truncate_container').hide();
		});
		
		$('.ginko_posts_list').find('li').each(function(){
			post_list_cnt++;
			$(this).removeClass('hide');
			$(this).addClass('show');
			if(post_list_cnt > 10){
				$(this).removeClass('show');
				$(this).addClass('hide');
			}
			post_list_cnt_tmp = 1;
		});
		
		$(window).scroll(function () {
			if($(window).scrollTop() + $(window).height() == $(document).height()){
				if($('#ginko_posts').hasClass('active')){
					tmp = 0;
					$('.ginko_posts_list').find('li').each(function(){
						tmp++;
						if(tmp >= post_list_cnt_tmp * 10 && tmp <= (post_list_cnt_tmp + 1) * 10){
							$(this).removeClass('hide');
							$(this).addClass('show');
						}
					});
					if(tmp == post_list_cnt){
						post_list_cnt_tmp = 2;
					}
				}
			}
		});
		
		chatting_control_description();
		
	});

	function check_message(){
		var site_url = $('#site_url').val();

		$.post(site_url + 'chat/history/history_new_message'
		, function(rs){
			if(rs != ""){
				try{
					result = JSON.parse(rs);
					for(i = 0; i < result.length; i++){
						html_str = "";
						$('.history_list_message').find('li').each(function(){
							if($(this).attr('board_id') == result[i]['board_id']){
								$(this).find('.chat_txt p').html(result[i]['content']);
								$(this).find('.chat_date p').html(result[i]['send_time']);
								$(this).find('.chat_date i').removeClass('fa-arrow-left');
								$(this).find('.chat_date i').removeClass('fa-arrow-right');
								$(this).find('.chat_date i').addClass('fa-arrow-left');
								html_str = "<li id='"+$(this).attr("id")+"' class='unread' board_id='"+$(this).attr('board_id')+"'>"+$(this).html()+"</li>";
								$(this).remove();
							}
						});
						
						k = 0;
						$('.history_list_message').find('li').each(function(){
							k++;
						});
						
						if(html_str != ""){
							if(k > 0){
								$('.history_list_message li:first-child').before(html_str);
							}else{
								$('.history_list_message').append(html_str);
							}
						}
					}
				}catch(e){
					
				}
			}
			setTimeout(function() {
				check_message();
			}, 1000);
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

	    twemoji.parse(document.getElementById('chat_history'), {size: 72});
	    twemoji.parse(document.getElementById('ginko_posts'), {size: 72});
	}
</script>