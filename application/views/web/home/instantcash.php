<div style = 'z-index:30;position:relative; height:7vw;left:0px;top:0px;' class = 'full-width'>
	<div style = 'position:absolute; height:100%;left:0px;top:0px;background-color:#7e5785;opacity:0.9' class = 'full-width' id = 'title_login'>
	</div>
<div  style = 'display:inline;  padding-left:50%;margin-left:-5.8vw;z-index:999'>
		<a class = 'playbutton' style = 'opacity:1' href="<?php echo base_url() ?>">
			<img src = "<?php echo base_url(WEB_IMAGES.'Ginko-Logo.png');?>" style = 'height:5vw;top:1vw;position:absolute;'>
		</a>
		
    </div>            
</div>

<div class="instantcash_container">
	<div class="instantcash_state_content">
		<h2>Redeem</h2>
		<h3>Secure Connection</h3>
	</div>
	<div class="instantcash_login_content">
		<img src="<?php echo base_url(WEB_IMAGES.'card.png');?>"/>
		<h2>Please enter your Ginko user name and password to confirm if you meet the minimum requirements.</h2>
		<div class="instantcash_login_form">
			<input type="email" id="user_name" placeholder="Username" value="" class="instantcash_login_text"/>
			<input type="password" id="password" placeholder="Password" value="" class="instantcash_login_text"/>
			<a href="javascript:;" class="instantcash_login_btn">Login</a>
		</div>
	</div>
	<div class="instantcash_invalid_content">
		<h2>Sorry, you did not achieve the minimum Ginko contact exchanges. </h2>
		<h3>You need a minimum 10 Ginko contact exchanges to qualify for the giveaway.</h3>
		<h4>Please watch the video on how to exchange contact info. Thank you.</h4>
		<a><img src="<?php echo base_url(WEB_IMAGES.'play.png');?>"/></a>
	</div>
	<div class="instantcash_exist_content">
		<h2>You already provided your account information for redemption.</h2>
		<h3>If you have not received the transfer, please allow approximately 6 weeks for processing.</h3>
		<h4>Thank you using Ginko and keep on exchanging!<br/>inquiries@ginko.mobi</h4>
		<ul>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'facebook_icon.png');?>" width="35"/></a></li>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'twitter_icon.png');?>" width="35"/></a></li>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'youtube_icon.png');?>" width="35"/></a></li>
		</ul>
	</div>
	<div class="instantcash_contest_content">
		<h2>Sorry, the contest is over.  Stay tuned for future contests.</h2>
		<h4>Thank you for using Ginko and keep on exchanging!</h4>
		<ul>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'facebook_icon.png');?>" width="35"/></a></li>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'twitter_icon.png');?>" width="35"/></a></li>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'youtube_icon.png');?>" width="35"/></a></li>
		</ul>
	</div>
	<div class="instantcash_paypal_content">
		<img src="<?php echo base_url(WEB_IMAGES.'card.png');?>"/>
		<h2>You qualified for the $10 reward.<br/><span>Please provide your PayPal account user name for the transfer of funds into your account.</span></h2>
		<img src="<?php echo base_url(WEB_IMAGES.'paypal.png');?>" style="margin: 0 0 15px 0;"/><br/>
		<div class="instantcash_login_form">
			<input type="email" id="paypal_email" placeholder="Enter PayPal Email" value="" class="instantcash_login_text"/>
			<a href="javascript:;" class="instantcash_paypal_btn">Submit</a>
			<input type="hidden" id="session_id" value=""/>
		</div>
	</div>
	<div class="instantcash_success_content">
		<h2>$10 will be transferred into your PayPal account.</h2>
		<h3>Please allow approximately 6 weeks for processing.</h3>
		<h4>Thank you using Ginko and keep on exchanging!<br/>inquiries@ginko.mobi</h4>
		<ul>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'facebook_icon.png');?>" width="35"/></a></li>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'twitter_icon.png');?>" width="35"/></a></li>
			<li><a><img src="<?php echo base_url(WEB_IMAGES.'youtube_icon.png');?>" width="35"/></a></li>
		</ul>
	</div>
	<div class="instantcash_err_msg"></div>
</div>

<input type="hidden" id="site_url" value="<?php echo site_url(); ?>"/>

<script>
	$(document).ready(function(){
		$('.instantcash_login_btn').click(function(){
			var site_url = $('#site_url').val();
			var user_name = $('#user_name').val();
			var password = $('#password').val();
			
			$.post(site_url + 'web/home/instantcash_login',{
				user_name : user_name,
				password : password
			}, function(rs){
				$('.instantcash_err_msg').hide();
				result = JSON.parse(rs);
				if(result['success'] == false){
					if(result['err']['errCode'] == '1101'){
						$('.instantcash_state_content h2').html('Success!');
						$('.instantcash_login_content').fadeOut();
						$('.instantcash_exist_content').fadeIn();
					}else if(result['err']['errCode'] == '1102'){
						$('.instantcash_state_content h2').html('Invalid');
						$('.instantcash_login_content').fadeOut();
						$('.instantcash_invalid_content').fadeIn();
					}else if(result['err']['errCode'] == '1103'){
						$('.instantcash_state_content h2').html('');
						$('.instantcash_login_content').fadeOut();
						$('.instantcash_contest_content').fadeIn();
					}else{
						$('.instantcash_err_msg').html(result['err']['errMsg']);
						$('.instantcash_err_msg').show(1).delay(3000).hide(1);
					}
				}else if(result['success'] == true){
					$('.instantcash_state_content h2').html('Congratulations!');
					$('.instantcash_login_content').fadeOut();
					$('.instantcash_paypal_content').fadeIn();
					$('#session_id').val(result['data']['sessionId']);
				}
			});	
		});
		
		$('.instantcash_paypal_btn').click(function(){
			var site_url = $('#site_url').val();
			var paypal_email = $('#paypal_email').val();
			var session_id = $('#session_id').val();
			
			$.post(site_url + 'web/home/instantcash_paypal',{
				paypal_email : paypal_email,
				session_id : session_id
			}, function(rs){
				$('.instantcash_err_msg').hide();
				result = JSON.parse(rs);
				if(result['success'] == false){
					if(result['err']['errCode'] == '1101'){
						$('.instantcash_state_content h2').html('Success!');
						$('.instantcash_paypal_content').fadeOut();
						$('.instantcash_exist_content').fadeIn();
					}else if(result['err']['errCode'] == '1102'){
						$('.instantcash_state_content h2').html('Invalid');
						$('.instantcash_paypal_content').fadeOut();
						$('.instantcash_invalid_content').fadeIn();
					}else{
						$('.instantcash_err_msg').html(result['err']['errMsg']);
						$('.instantcash_err_msg').show(1).delay(3000).hide(1);
					}
				}else if(result['success'] == true){
					$('.instantcash_state_content h2').html('Success!');
					$('.instantcash_paypal_content').fadeOut();
					$('.instantcash_success_content').fadeIn();
				}
			});	
		});
	});
</script>
