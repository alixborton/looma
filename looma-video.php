<!doctype html>
<!--
Name: Skip, Aaron, Connor, Ryan
Email: skip@stritter.com
Owner: VillageTech Solutions (villagetechsolutions.org)
Date: 2016 07
Revision: Looma Video Editor 1.0
File: video.php
Description: Can play an unedited video reroutes the user to looma-edited-video.php if
they want to edit a video
-->
<?php $page_title = 'Looma Video Player';
	  include ('includes/header.php');
      include('includes/looma-utilities.php');
?>

    <link rel="stylesheet" type="text/css" href="css/looma-video.css">
    <link rel="stylesheet" type="text/css" href="css/looma-media-controls.css">

	</head>

	<body>
		<?php
            //Gets the filename, filepath, and the thumbnail location
            $filename = $_REQUEST['fn'];
            $filepath = $_REQUEST['fp'];
            $displayname = $_REQUEST['dn'];
            $thumbFile = $filepath . thumbnail($filename);
	    ?>
			<script>
				//Converts thumbFile to js
                var fileName = "<?php echo $filename ?>";
                var filePath = "<?php echo $filepath ?>";
                var displayName = "<?php echo $displayname ?>"
				var thumbFile = <?php echo json_encode($thumbFile); ?>;
			</script>

			<div id="main-container-horizontal">
				<div id="video-player">
                    <div id="fullscreen">
                        <video id="video">
                            <?php echo 'poster=\"' . $filepath . thumbnail($filename) . '\">';?>
                            <?php echo '<source id="video-source" src="' . $filepath . $filename . '" type="video/mp4">' ?>
                        </video>
                        <div id="fullscreen-buttons">
                            <?php include ('includes/looma-control-buttons.php');?>
                            <button id="fullscreen-playpause" class="looma-control-button"></button>
                        </div>
                    </div>
                </div>

                <div id="title-area" hidden>
                    <h3 id="title"></h3>
                </div>

				<div id="media-controls">

                    <div id="time" class="title"></div>

					<button type="button" class="media play-pause"><?php keyword('Play/Pause');?></button>
					<input type="range" class="video seek-bar" value="0" ><br>
					<button type="button" class="media mute"><?php keyword('Volume') ?></button>
					<input type="range" class="video volume-bar" min="0" max="1" step="0.1" value="0.5" >

				</div>
            </div>

        <!--Adds the toolbar to the video player screen-->
        <?php include ('includes/toolbar.php'); ?>
        <?php include ('includes/js-includes.php'); ?>
        <script src="js/looma-media-controls.js"></script>          <!-- Looma Javascript -->
        <script src="js/looma-video.js"></script>          <!-- Looma Javascript -->


	</body>
