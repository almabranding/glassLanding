

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Glass 120 Ocean Drive – Miami Beach</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bigvideo.css"/>
<link rel="stylesheet" href="css/styleVideo.css"/>
    <!-- BigVideo Dependencies -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
    <script src="js/jquery-ui-1.8.22.custom.min.js"></script>
    <script src="js/jquery.imagesloaded.min.js"></script>
    <script src="http://vjs.zencdn.net/c/video.js"></script>

    <!-- BigVideo -->
    <script src="js/bigvideo.js"></script>

    <!-- Demo -->
    <style>
        #big-video-control-container,#big-video-wrap{
            position: absolute;
             z-index:2;
        }
    </style>
</head>

<body>
 
    
    <div id="overview" onclick="location.href='form.php'" class="box" style="z-index:50;position:relative;text-align: right;">
        <img id="skip" src="images/skip_video.gif"/>
     </div>    

 <video controls  style="cursor:pointer; z-index:1; height:100%;width:100%;position:relative;">
	<source src="vids/glass.webm" type='video/webm; codecs="vp8.0, vorbis"'/>
        <source src='vids/glass.ogv' type='video/ogg; codecs="theora, vorbis"'/>
	<source src="vids/glass.mp4" type="video/mp4"/>    
</video>
    <script>
        if (screen.width > 899) {
	    $(function() {
            var BV = new $.BigVideo();
            var vids = [
                'vids/glass.mp4'
            ];
            
            vids.sort(function() { return 0.5 - Math.random() }); // random order on load
			BV.init();
			BV.show(vids,{ambient:false});
	    });
        }else{
            $('video').css('position:relative');
        }
    </script>



</body>
</html>