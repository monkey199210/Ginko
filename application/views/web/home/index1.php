<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(CHAT_CSS.'mediaelementplayer.css'); ?>" />


	<div style = 'height:100%;position:absolute;left:0px;top:0px;' id = 'mainarea'  class = 'full-width'>
		<div style = 'position:absolute;overflow:hidden;z-index:15;left:0px;width:100%;opacity:0' id = 'imgslide_area'>
			<img src = "<?php echo base_url(WEB_IMAGES.'Photo_1.jpg');?>" style = 'width:100%;z-index:5;top:0px' id = 'image_slide1'>
			<img src = "<?php echo base_url(WEB_IMAGES.'Photo_2.jpg');?>" style = 'width:100%;position:absolute;z-index:4;top:0px;left:100%' id = 'image_slide2'>
			<img src = "<?php echo base_url(WEB_IMAGES.'Photo_3.jpg');?>" style = 'width:100%;position:absolute;z-index:3;top:0px;left:100%' id = 'image_slide3'>
			<img src = "<?php echo base_url(WEB_IMAGES.'Photo_4.jpg');?>" style = 'width:100%;position:absolute;z-index:2;top:0px;left:100%' id = 'image_slide4'>
			<img src = "<?php echo base_url(WEB_IMAGES.'Photo_5.jpg');?>" style = 'width:100%;position:absolute;z-index:1;top:0px;left:100%' id = 'image_slide5'>
            <img src = "<?php echo base_url(WEB_IMAGES.'Arrow 1.png');?>" class = 'arrow' style = 'z-index:10; left:5%; width:2vw; position:absolute;cursor:pointer; margin-top: 25vw;' onclick = 'moveToNextSlide(-1)'>
            <img src = "<?php echo base_url(WEB_IMAGES.'Arrow 2.png');?>" class = 'arrow' style = 'z-index:10; left:95%; margin-left:-2vw;width:2vw; position:absolute;cursor:pointer; margin-top: 25vw;' onclick = 'moveToNextSlide(1)'>            
            <img src = "<?php echo base_url(WEB_IMAGES.'Video-play-button.png');?>" style = 'width:8vw; height:8vw;left:50%; margin-left:-4vw; margin-top: 22vw;z-index:11;position:absolute' class = 'playbutton'>
			<div align = 'center'  id = 'label1' style = 'font-size:3.5vw;color:white;font-family:helveticalight;width:60vw; height:10vw;left:50%; margin-left:-30vw; margin-top:35vw;z-index:11;position:absolute;opacity:1'>Share with friends & family</div>
			<div align = 'center'  id = 'label2' style = 'font-size:3.5vw;color:white;font-family:helveticalight;width:60vw; height:10vw;left:50%; margin-left:-30vw; margin-top:35vw;z-index:11;position:absolute;opacity:0'></div>
            <div align = 'center'  style = 'width:60vw; height:10vw;left:50%; margin-left:-30vw; 	margin-top:45vw;z-index:11;position:absolute;opacity:1'>
            
            	<img src = "<?php echo base_url(WEB_IMAGES.'Slide-Green.png');?>" class = 'pageslidedot' style = 'left:40%;' id = 'page1'>
            	<img src = "<?php echo base_url(WEB_IMAGES.'Slide-White.png');?>" class = 'pageslidedot' style = 'left:45%;' id = 'page2'>
            	<img src = "<?php echo base_url(WEB_IMAGES.'Slide-White.png');?>" class = 'pageslidedot' style = 'left:50%;' id = 'page3'>
                <img src = "<?php echo base_url(WEB_IMAGES.'Slide-White.png');?>" class = 'pageslidedot' style = 'left:55%;' id = 'page4'>
                <img src = "<?php echo base_url(WEB_IMAGES.'Slide-White.png');?>" class = 'pageslidedot' style = 'left:60%;' id = 'page5'>                                               
            </div>
		</div>
		<div class="video_area">
			<video id="bg_video" src="<?php echo base_url(WEB_VIDEO.'Ginko_Purple.mp4');?>" style="width:100%;height:100%;" width="100%" height="100%" controls="controls"></video>
		</div>
		<div style = 'position:relative;background-color:#89cb60;min-height:5vw;width:100%' class = 'loadingpage'></div>
        <div style = 'position:relative;background-color:#89cb60;padding-top:0vw;padding-bottom:0vw;' class = 'loadingpage'>
			<img src =  "<?php echo base_url(WEB_IMAGES.'leaf-background.jpg');?>" style='margin:0px 0px 0 0' id = 'leaf_bkg' class = 'full-width'>
            <div class="water" style="display: none;left:50%;width:50%;height:15%;top:40%;margin-left:-25%;position:absolute">
                <div style="-webkit-animation: waterAni 5s 0s infinite;-moz-animation: waterAni 5s 0s infinite;-o-animation: waterAni 5s 0s infinite;animation: waterAni 5s 0s infinite;opacity:0"></div>
                <div style="-webkit-animation: waterAni 5s 1s infinite;-moz-animation: waterAni 5s 1s infinite;-o-animation: waterAni 5s 1s infinite;animation: waterAni 5s 1s infinite;;opacity:0"></div>
                <div style="-webkit-animation: waterAni 5s 2s infinite;-moz-animation: waterAni 5s 2s infinite;-o-animation: waterAni 5s 2s infinite;animation: waterAni 5s 2s infinite;;opacity:0"></div>
                <div style="-webkit-animation: waterAni 5s 3s infinite;-moz-animation: waterAni 5s 3s infinite;-o-animation: waterAni 5s 3s infinite;animation: waterAni 5s 3s infinite;;opacity:0"></div>
                <div style="-webkit-animation: waterAni 5s 4s infinite;-moz-animation: waterAni 5s 4s infinite;-o-animation: waterAni 5s 4s infinite;animation: waterAni 5s 4s infinite;;opacity:0"></div>
            </div>

			<div align = 'center' style = 'font-family:helveticalight;position:absolute;color:white;font-size:3vw;left:50%;margin-left:-30vw;width:60%;top:70%;opacity:0' id = 'loadingtext'>REINVENTING CONTACT SHARING</div>
            <img id = 'feather' class="feather" src = "<?php echo base_url(WEB_IMAGES.'leaf 02.png');?>" style="display: block;position:absolute;top:0%;opacity:0.0;transform: rotate(-150deg);">
            <img id = 'feather1' class="feather" src = "<?php echo base_url(WEB_IMAGES.'leaf 01.png');?>" style="display: block;position:absolute;top:0%;opacity:0.0;transform: rotate(-150deg);">
		</div>

		<div style = 'position:relative; background-color:white;min-height:80vw; z-index: 20' id = 'menu_section'>
			<div style = '' id = 'clickImage' >
			<div id = 'dark_background' style = 'background-color:black;opacity:0.0;display:none;z-index:99;position:fixed;width:100%;height:100%;left:0px;top:0px;'>			
			</div>
			<div  style = 'display:none;z-index:100;position:fixed;width:100%;height:100%;left:0px;top:0vw;' id = 'image_area'>
			<table style = 'z-index:01;position:relative'><tr><td class = 'full_width' align = 'center' style = 'position:relative;vertical-align:top'>
			<img id = "clickImage_img" src = '' style = 'width:100%;'>
			<img src = "<?php echo base_url(WEB_IMAGES.'Arrow 1.png');?>" class = 'arrow' style = 'z-index:10;margin-top:-3vw;top:50%; left:5%; width:1vw; position:absolute;cursor:pointer' onclick = 'moveToNextImage(-1)'>
			<img src = "<?php echo base_url(WEB_IMAGES.'closebutton.png');?>" class = 'arrow' style = 'z-index:10;margin-top:-3vw;top:20%; left:95%; width:2vw; margin-left:-2vw;position:absolute;cursor:pointer' onclick = 'closeClickImage(0)'>
            <img src = "<?php echo base_url(WEB_IMAGES.'Arrow 2.png');?>" class = 'arrow' style = 'z-index:10;margin-top:-3vw;top:50%; left:95%; margin-left:-1vw;width:1vw; position:absolute;cursor:pointer' onclick = 'moveToNextImage(1)'>            

			</td></tr></table>
			</div>
		</div>
			
           	<table class='full-width' cols = "*,*,*" style = 'width:100%'>
			<tr style = 'height:2vw;'></tr>
        		<tr><td colspan = '3' align = 'center' style = 'font-size:4vw;width:100%' class = 'cell_title'>Cool Features</td></tr>
                <tr id = 'contentrow1'>
                	<td>
                    	<div class = 'icon_title'>
                            <div id="f1_container" onclick = "showScreen(1);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-1-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-1-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>
                       	<div class = 'cell_title'>
                    		Rich Multimedia Profile
                        </div>
						<div class = 'cell_content'>
							Rich Video, Audio and Images to enhance your contacts' experiences of you
                        </div>
                    </td>
					<td>
                    	<div>
                            <div id="f1_container"  onclick = "showScreen(2);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-2-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-2-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>                       	<div class = 'cell_title'>
                    		Using Sprout
                        </div>
						<div class = 'cell_content'>
							Activate the Sprout locate and exchange mechanism by touch and then share your contact info.
                        </div>
                    </td>
					<td>
	                   	<div>
                            <div id="f1_container" onclick = "showScreen(3);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-3-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-3-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>
                       	<div class = 'cell_title'>
                    		Selecting Permissions
                        </div>
						<div class = 'cell_content'>
							Share only what you want with whom you want.
                        </div>
                    </td>
                </tr> 
                <tr  id = 'contentrow2' >
                	<td>
                    	<div>
                            <div id="f1_container" onclick = "showScreen(4);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-4-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-4-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>                       	<div class = 'cell_title'>
                    		Cool Chat
                        </div>
						<div class = 'cell_content'>
							Instant message with your friends, family and colleagues real-time using easy-to-use cool chat features.
                        </div>
                    </td>
					<td>
                    	<div>
                            <div id="f1_container" onclick = "showScreen(5);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-5-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-5-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>                       	<div class = 'cell_title'>
                    		Contact Builder
                        </div>
						<div class = 'cell_content'>
							Build your contacts without any effort on your part.
                        </div>
                    </td>
					<td>
                    	<div>
                            <div id="f1_container" onclick = "showScreen(6);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-6-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-6-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>                       	<div class = 'cell_title'>
                    		Import Contacts
                        </div>
						<div class = 'cell_content'>
							Sync all of your address books into Ginko.
                        </div>
                    </td>
                </tr>
                 <tr id = 'contentrow3'><td/>
                	<td align = 'center'>
                    	<div>
                            <div id="f1_container" onclick = "showScreen(7);">
                                <div id="f1_card" class="shadow">
                                  <div class="front face">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-7-1.png');?>" class = 'cell_icon'>
                                  </div>
                                  <div class="back face center">
                                    <img src = "<?php echo base_url(WEB_IMAGES.'Icon-7-2.png');?>" class = 'cell_icon'>                        	  
                                  </div>
                                </div>
                            </div>                    	
                        </div>                       	<div class = 'cell_title'>
                    		Create an Entity
                        </div>
						<div class = 'cell_content'>
							Create a profile for your business, organization or whatever you fancy and start engaging your audience.
                        </div>
                    </td>
					<td/>
                </tr>

        		                     
            </table>
            
        </div>
        <div style = 'height:28vw;position:absolute;' class = 'full-width' />
        <div style = 'background-color:#89cb60; height:10vw; bottom:18vw; position:absolute;' class = 'full-width' align = 'center'>
          <table style="width:70%;text-align: center;font-size: 2vw;color:white;padding-bottom:3%;padding-top:3%;font-family:HelveticaLight">
            <tbody>
              <tr>
                <td style = 'cursor:pointer;' onclick = 'alert("Careers");'>Careers</td>
                <td style = 'border-right:1px solid white;border-left:1px solid white;cursor:pointer;' onclick = 'alert("Tutorials");'>Tutorials</td>
                <td style = 'cursor:pointer;' onclick = 'alert("About Us");'>About Us</td>
              </tr>
            </tbody>
          </table>
	</div>
        <div style = 'background-color:white; height:18vw; bottom:0px; position:absolute;' class = 'full-width' align = 'center'>

			<table style="width:80%;text-align: center;font-size: 2vw;color:white;padding-top:0px; padding-bottom:0px">
            <tbody>
              <tr>
                <td style = 'text-align:right'><a href = 'http://en.wikipedia.org/wiki/apple'><img src = "<?php echo base_url(WEB_IMAGES.'footer 1.png');?>" style = 'width:50%'></a></td>
                <td style = 'text-align:left'><a href = 'http://en.wikipedia.org/wiki/android'><img src = "<?php echo base_url(WEB_IMAGES.'footer 2.png');?>" style = 'width:50%'></a></td>
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
		<div style = 'z-index:200;position:fixed; height:7vw;left:0px;top:0px;' class = 'full-width'>
			<div style = 'position:absolute; height:100%;left:0px;top:0px;background-color:#7e5785;opacity:0.9' class = 'full-width' id = 'title_login'>
			</div>
        	<div  style = 'display:inline;  padding-left:50%;margin-left:-5.8vw;z-index:999'>
				<span class = 'playbutton' style = 'opacity:1' onclick = 'window.location.href = "";'>
					<img src = "<?php echo base_url(WEB_IMAGES.'Ginko-Logo.png');?>" style = 'height:5vw;top:1vw;position:absolute;'>
				</span>
				
            </div>            
            <div style = 'display:inline;left:90%;margin-left:-2vw;font-size:2.2vw;top:3vw;position:absolute;z-index:999;font-family:HelveticaLight;color:white'>
				<div class = 'playbutton chat_login_btn' style = 'opacity:1;vertical-align:middle'>
            		<img src = "<?php echo base_url(WEB_IMAGES.'Login icon.png');?>" style = 'height:2.2vw;'> <div style = 'display:inline-block'>Login</div>
				</div>
            </div>            
        </div>
	</div>

<script type="text/javascript" src="<?php echo base_url(CHAT_JS.'mediaelement-and-player.js'); ?>"></script>

<script>

var flag = 0, opacity = 0, opacity1 = 0, currentIndex = 1;
var loadMainPage = function()
{
	$(".loadingpage").animate({opacity:0}, 5000, function() {});
	$("#imgslide_area").animate({opacity:1}, 5000, function() {
		setInterval(function() {moveToNextSlide(1);}, 4000);
		$(".pageslidedot").click(function(){

			moveToNextSlide(Number(this.id.substr(4)) - currentIndex);
		});
		$("#loadingpage").css('opacity', 0);
		$('#imgslide_area').height(screen.availHeight);
		$('.video_area').height(screen.availHeight);
	});
};
var fOtherLeaf = function func1()
{
	document.getElementById('feather1').style.cssText = 'display:inline-block; transform: rotate(0deg) translate(-100%, 120%); -webkit-transform: rotate(0deg) translate(-100%, 120%); transition: -webkit-transform 0.9s cubic-bezier(0.1, 1, 0.2, 0.91) ; -webkit-transition: -webkit-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91);-moz-transition: -moz-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91);-o-transition: -o-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91); display: block;opacity:0;top:-30%';
	$("#feather1").animate({opacity:1}, 700, function (){
		$("#loadingtext").animate({opacity:1}, 500, function() {});
		setTimeout(loadMainPage, 2000);
	});
}

var flag = 0, slideFlag = 0;
var labelArr = ['a','Share with friends & family','Share with colleagues','Share with someone you just met','Share with classmates','Link to a store, business or organization'];

function  moveToNextSlide(step)
{
	if (slideFlag == 0);
	else return;
	
	slideFlag = 1;
    var currentObj = document.getElementById("image_slide" + currentIndex);
	currentIndex =  ((currentIndex + step + 4) % 5 + 1);
	if (step > 0) step = 1;
	else step = -1;
	
	var nextObj = document.getElementById("image_slide" + currentIndex);
/*
	nextObj.style.left = (window.innerWidth * step) + "px";
	nextObj.style.top = "0px";
	currentObj.style.left = 0;
	$(nextObj).animate({left: 0}, 1000, function (){slideFlag = 0;});

	$(currentObj).animate({"left": (-step * window.innerWidth) + "px"}, 1000, function (){slideFlag = 0;});
*/
	nextObj.style.opacity = 0;
	nextObj.style.left = 0;
	nextObj.style.top = 0;
	$(nextObj).animate({opacity:1}, 1000, function (){slideFlag = 0;});

	$(currentObj).animate({opacity:0}, 1000, function (){slideFlag = 0;});

	
	var label1 = document.getElementById('label1');
	var label2 = document.getElementById('label2');
	if (label1.style.opacity <= 0.1)
	{
		label1.innerHTML = labelArr[currentIndex];
		$(label1).animate({opacity: 1}, 1000, function (){});
		$(label2).animate({opacity: 0}, 1000, function (){});
	}
	else
	{
		label2.innerHTML = labelArr[currentIndex];
		$(label1).animate({opacity: 0}, 1000, function (){});
		$(label2).animate({opacity: 1}, 1000, function (){});
	}
	for (i = 1; i <= 5; i++)
		document.getElementById('page' + i).src = (i == currentIndex ? 'assets/web/images/Slide-Green.png' : 'assets/web/images/Slide-White.png');
}
var currentClickedImage = 1;
function moveToNextImage(step)
{
	currentClickedImage = currentClickedImage + step;
	if (currentClickedImage <= 0) currentClickedImage = 7;
	if (currentClickedImage > 7) currentClickedImage = 1;
	document.getElementById("clickImage_img").src = 'assets/web/images/ClickImage_' + currentClickedImage + '.png';
}
function closeClickImage()
{
	document.getElementById("contentrow1").style.display = "";	
	document.getElementById("contentrow2").style.display = "";	
	document.getElementById("contentrow3").style.display = "";	
	document.getElementById("image_area").style.display = "none";	
	document.getElementById("dark_background").style.opacity = 0;
	document.getElementById("dark_background").style.display = 'none';
	document.body.style.overflow = 'auto';
}
function showScreen(index)
{
	currentClickedImage = index;
	document.getElementById("dark_background").style.opacity = 0.7;
	document.getElementById("dark_background").style.display = '';
	document.getElementById("clickImage_img").src = 'assets/web/images/ClickImage_' + index + '.png';
	document.getElementById("image_area").style.display = "block";	
	document.body.style.overflow = 'hidden';
///	document.getElementById("contentrow1").style.display = "none";	
//	document.getElementById("contentrow2").style.display = "none";	
//	document.getElementById("contentrow3").style.display = "none";	
}
$(document).ready(function() 
{

var flag = 0;
	$(window).scroll(scfunc = function () {

		if (!flag && window.pageYOffset >= 0)
		{
			flag = 1;
			
			document.getElementById('feather').style.cssText = 'display:inline-block; transform: rotate(0deg) translate(-100%, 200%); -webkit-transform: rotate(0deg) translate(-100%, 200%);      transition: -webkit-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91); -webkit-transition: -webkit-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91);-moz-transition: -moz-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91);-o-transition: -o-transform 0.9s cubic-bezier(0.1, 0.27, 0.2, 0.91); display: block;opacity:0;top:0%';
		
			$( "#feather" ).animate({
					opacity: 1
			  }, 700, function() {
				// Animation complete.
			  });
			$(".water").css('display', 'block');
			setTimeout(fOtherLeaf,500);
		}
	});

	$(window).resize(sfunc = function(){
		document.getElementById('mainarea').style.height = $('#back').height();
		
		document.getElementById('imgslide_area').style.height = $("#image_slide1").height();
		$("#image_slide1").css('position', 'absolute');
	});
	scfunc();
	sfunc();

	$('#bg_video').mediaelementplayer();

});

$('#bg_video').click(function(){
	$('.video_area').hide();
	$(".mejs-pause").trigger('click');
});

$('.playbutton').click(function(){
	$('.video_area').show();
	$('.mejs-overlay-button').trigger('click');
});

   	$(function()
	{
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