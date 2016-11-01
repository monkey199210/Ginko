<div class="login_container">
	<a href="#" class="logo_img">
		<img src="<?php echo base_url(CHAT_IMAGES.'ginko_logo.png');?>" alt="Logo Image"/>
	</a>
	<p class="login_icon">
		<img src="<?php echo base_url(CHAT_IMAGES.'login_icon.png');?>" alt=""/>
	</p>
	<?php echo form_open('', 'class="login_form"'); ?>
		<input type="email" placeholder="Email" value="<?php echo $user_login; ?>" name="email"/>
		<input type="password" placeholder="Password" value="" name="password"/>
		<div class="form_checkbox">
			<input type="checkbox" id="remember_check" name="remember_check"/>
			<label for="remember_check">Remember Me</label>
		</div>
		<input type="submit" value="Sign In" class="form_btn"/>
		<a href="forgot_password">Forgot Password?</a>
		<input type="hidden" name="act" value="login"/>
		<input type="hidden" id="local_timezone" name="local_timezone" value=""/>
	<?php echo form_close(); ?>
</div>

<script>
	$(document).ready(function(){
		$('.login_container').height($(window).height());
		
		var d = new Date();
		var offset = -1*d.getTimezoneOffset()/60;
		
        $('#local_timezone').val(offset);
	});

	$(window).resize(function(){
		$('.login_container').height($(window).height());
	});
</script>