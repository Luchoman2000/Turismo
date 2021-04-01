<?php include '../../core/configGeneral.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- iframe de pano2VR -->
    <iframe id="myframe" src="<?php echo SERVERURL ?>panoramas/test/index.html" name="panorama" width="1080" height="640" scrolling="no" marginheight="0" marginwidth="0"frameborder="0" style="float:left; margin-left:0px" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen=“true”> </iframe> -->
    <script type="text/javascript" src="<?php echo SERVERURL ?>panoramas/test/pano2vr_player.js">
    </script>
    <script type="text/javascript" src="<?php echo SERVERURL ?>panoramas/test/skin.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="<?php echo SERVERURL ?>panoramas/test/webxr/three.min.js"></script>
    <script src="<?php echo SERVERURL ?>panoramas/test/webxr/webxr-polyfill.min.js"></script>
    <div id="container" style="width:600px;height:600px;overflow:hidden;">
        <br>Loading...<br><br>
    </div>
    <script type="text/javascript">
        // create the panorama player with the container
        pano = new pano2vrPlayer("container");
        // add the skin object
        skin = new pano2vrSkin(pano);
        // load the configuration
        console.log(pano);
        pano.setLockedMouse(true);
       
        window.addEventListener("load", function() {
            pano.readConfigUrlAsync("<?php echo SERVERURL ?>panoramas/test/pano.xml");
        });
    </script>


</body>
<script>
    var pano2vr = document.getElementById('myframe').children[0];
    $(document).ready( function(){
        pano2vr.contentWindow.pano.setLocked(true);
        
    });
</script>

</html>