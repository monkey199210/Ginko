<div class="login_container forgot_pass_container">
	<a href="#" class="logo_img"><img src="<?php echo base_url(CHAT_IMAGES.'ginko_logo.png'); ?>" alt="Logo Image"/></a>
	<p class="login_icon"><img src="<?php echo base_url(CHAT_IMAGES.'login_icon.png'); ?>" alt=""/></p>
	<h4>Forgot Password</h4>
	<?php echo form_open('', 'class="login_form"'); ?>
		<input type="email" placeholder="Email" value="" required name="email" id="email"/>
		<a href="login" class="form_btn pull-left">Cancel</a>
		<input type="button" value="Send" class="form_btn pull-right" id="submit_btn"/>
		<input type="hidden" name="act" value="send"/>
	<?php echo form_close(); ?>
</div>

<div class="forgot_password_fancy_content">
	<h3>Forgot Password</h3>
	<p>If <span></span> is in our login records, the system will send your password to this email.  If you are having problems receiving your password, please contact Customer Service.</p>
	<a href="javascript: void(0);" class="fancy_submit_btn">OK</a>
</div>

<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'jquery.fancybox.js'); ?>"></script>

<script>
	$(document).ready(function(){
		$('.login_container').height($(window).height());
		
		$('#submit_btn').click(function(){
			var email = $('#email').val();
			if(ValidateEmail(email)){
				$('.forgot_password_fancy_content span').html(email);
				
				$.fancybox.open({
					href : '.forgot_password_fancy_content',
					type : 'inline',
					padding : 0,
					margin  : 5,
					scrolling : 'no'
				});
			}
		});
		
		$('#email').keydown(function (event) {
		    var keypressed = event.keyCode || event.which;
		    if (keypressed == 13) {
		        $('#submit_btn').trigger('click');
		    }
		});
		
		$('.fancy_submit_btn').click(function(){
			$('.login_form').submit();
		});
	});

	$(window).resize(function(){
		$('.login_container').height($(window).height());
	});


	function ValidateEmail(inputText){  
		var mailformat = /\S+@\S+\.\S+/;  
		if(inputText != ""){
			if(inputText.match(mailformat)){  
				return true;  
			}else{  
				alert("You have entered an invalid email address!");  
				$('#email').focus();  
				return false;  
			}  
		}else{
			alert("You have to enter an email address!");  
			$('#email').focus();  
			return false;  
		}
	}  
</script>
