<div class="header_container">
	<a href="javascript: void(0);" class="logo_img"><img src="<?php echo base_url(CHAT_IMAGES.'ginko_logo_blue.png');?>" alt="Logo Image"/></a>
	<a href="<?php echo base_url(); ?>chat/history" class="home_img"><img src="<?php echo base_url(CHAT_IMAGES.'home_icon.png');?>" alt="Home Icon Image"/></a>
</div>

<div class="search_content contact_search_box">
	<div class="search_checkbox">
		<input type="checkbox" id="check_1" class="contact_check_all"/>
		<label for="check_1"></label>
	</div>
	<div class="search_input">
		<input type="text" class="contact_search"/>
	</div>
</div>

<div class="main_container contact_container">
	<?php
		if(!empty($contact)){
	?>
			<ul class="contact_list">
	<?php
				for($i = 0; $i < sizeof($contact); $i++){
					if($user_id != $contact[$i]['user_id']){
	?>
						<li id="<?php echo $i + 1; ?>">
							<div class="search_checkbox">
								<input type="checkbox" id="check_<?php echo $contact[$i]['user_id']; ?>" value="<?php echo $contact[$i]['user_id']; ?>" class="contact_check"/>
								<label for="check_<?php echo $contact[$i]['user_id']; ?>"></label>
							</div>
							<div class="contact_img">
								<img src="<?php echo $contact[$i]['photo_url'] == '' ? base_url(CHAT_FACE_IMAGES) : $contact[$i]['photo_url']; ?>" alt=""/>
							</div>
							<h4><?php echo $contact[$i]['first_name']." ".$contact[$i]['last_name']; ?></h4>
						</li>
	<?php
					}
				}
	?>
			</ul>

			<div class="contact_bottom">
				<a href="javascript:void(0);" class="contact_btn">Ok</a>
			</div>
	<?php
		}else{
	?>
			<h3 class="empty_content">Sorry, no contact to view. Check back later</h3>
	<?php		
		}
	?>
</div>

<input type="hidden" id="site_url" value="<?php echo site_url(); ?>"/>

<script>
	var contact = [];
	<?php
		for($i = 0; $i < sizeof($contact); $i++){
	?>
			contact[<?php echo $i;?>] = "<?php echo $contact[$i]['first_name'].' '.$contact[$i]['last_name']; ?>";
	<?php
		}
	?>

	$(document).ready(function(){
		$('.contact_btn').click(function(){
			var site_url = $('#site_url').val();
			var user_ids = "";
			
			$('.contact_list').find('.contact_check').each(function(){
				if($(this).is(':checked')){
					user_ids += $(this).val() + encodeURIComponent(",");
				}
			});
			
			user_ids = user_ids.substring(0, user_ids.length - 3);
			
			if(user_ids == ""){
				alert("Please check user contact");
			}else{
				location.href = site_url + 'chat/chatting/index/' + user_ids;
			}
		});
		
		$('.contact_check_all').click(function(){
			if($(this).is(':checked')){
				$('.contact_list').find('.contact_check').each(function(){
					$(this).attr('checked', 'checked');
					$(this).prop('checked', 'checked');
				});
			}else{
				$('.contact_list').find('.contact_check').each(function(){
					$(this).attr('checked', '');
					$(this).prop('checked', '');
				});
			}
		});
		
		$('.contact_list li').click(function(){
			var $contact_check = $(this).find('.contact_check');
			if($contact_check.is(':checked')){
				$contact_check.attr('checked', '');
				$contact_check.prop('checked', '');
			}else{
				$contact_check.attr('checked', 'checked');
				$contact_check.prop('checked', 'checked');
			}
		});
		
		$('.contact_search').keyup(function(){
			var str = $(this).val().trim();

			if(str != ""){
				$('.contact_list').find('li').each(function(){
					$(this).hide();
				});
				contact.forEach(function(d, i){
					d1 = d.toLowerCase();
					str1 = str.toLowerCase();
					if(d1.search(str1) >= 0){
						$('.contact_list').find('li').each(function(){
							if($(this).attr("id") == i+1){
								$(this).show();
							}
						});
					}
				});
			}else{
				$('.contact_list').find('li').each(function(){
					$(this).show();
				});
			}
		});
	});
</script>