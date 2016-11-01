<div style = 'z-index:30;position:relative; height:7vw;left:0px;top:0px;' class = 'full-width'>
	<div style = 'position:absolute; height:100%;left:0px;top:0px;background-color:#7e5785;opacity:0.9' class = 'full-width' id = 'title_login'>
	</div>
<div  style = 'display:inline;  padding-left:50%;margin-left:-5.8vw;z-index:999'>
		<a class = 'playbutton' style = 'opacity:1' href="<?php echo base_url() ?>">
			<img src = "<?php echo base_url(WEB_IMAGES.'Ginko-Logo.png');?>" style = 'height:5vw;top:1vw;position:absolute;'>
		</a>
		
    </div>            
</div>

<div class="chat_description_content aboutus_content">
	<h3>About Us</h3>
	<p>With over two decades of collaboration, Ginko is re-inventing how people connect.  Ginko has cracked the code of sharing contact information with an effortless touch of a button.  Ginko believes in high impact presentations and first impressions, which is why Ginko provides you with a rich multi-media contact profile giving your friends, family or professional colleagues  the best experience while viewing your profile.  Ginko also believes in personal privacy, which is why you have the option to share only what information you want with whom you want.   Never lose touch again with Ginko.</p>
	<h3>OUR MISSION</h3>
	<p>To provide an effortless contact exchange service to keep contact information continuously up-to-date.</p>
	<p class="contact_address"><span>Contact Us :</span> <a href="mailto: inquiries@ginko.mobi">inquiries@ginko.mobi</a></p>
</div>

<div class="aboutus_bg">
	<img src="<?php echo base_url(WEB_IMAGES.'aboutus.png');?>"/>
</div>

<div style = 'background-color:#89cb60; height:10vw; bottom:18vw; margin-top: -4px;' class = 'full-width' align = 'center'>
  <table style="width:100%;text-align: center;font-size: 2vw;color:white;padding-bottom:3%;padding-top:2.2%;font-family:HelveticaLight">
    <tbody>
      <tr>
        <td style = 'width: 25%;cursor:pointer;'><a href="<?php echo base_url(); ?>officialrules" style="color: white; text-decoration: none;">Official Rules</a></td>
        <td style = 'width: 25%;border-right:1px solid white;border-left:1px solid white;cursor:pointer;'><a href="<?php echo base_url(); ?>terms" style="color: white; text-decoration: none;">Terms of Use</a></td>
        <td style = 'width: 25%;border-right:1px solid white;cursor:pointer;'><a href="<?php echo base_url(); ?>privacypolicy" style="color: white; text-decoration: none;">Privacy Policy</a></td>
        <td style = 'width: 25%;cursor:pointer;'><a href="<?php echo base_url(); ?>aboutus" style="color: white; text-decoration: none;">About Us</a></td>
      </tr>
    </tbody>
  </table>
</div>
<div style = 'background-color:white; height:18vw; bottom:0px; ' class = 'full-width' align = 'center'>

	<table style="width:80%;text-align: center;font-size: 2vw;color:white;padding-top:0px; padding-bottom:0px">
    <tbody>
      <tr>
        <td style = 'text-align:right'><a href = 'https://itunes.apple.com/us/app/ginko/id1029413955?ls=1&mt=8'><img src = "<?php echo base_url(WEB_IMAGES.'footer 1.png');?>" style = 'width:50%'></a></td>
        <td style = 'text-align:left'><a href = 'https://play.google.com/store/apps/details?id=com.ginko.ginko'><img src = "<?php echo base_url(WEB_IMAGES.'footer 2.png');?>" style = 'width:50%'></a></td>
      </tr>
      <tr>
      	<td colspan = 2 align = 'center'>
        	
            <div class = 'cell_content' style = 'font-size:2vw; color:black;display:block'>
            	Ginko LLC © 2014
            </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>	

<script>
	$(function(){
		$(".chat_login_btn").popupWindow({
			centerScreen: 1,
			windowURL: '<?php echo base_url(); ?>chat/user/login', 
			windowName: 'Ginko Chat',
			width: 380,
			height: 615,
			scrollbars: 1
		});
	});
</script>