<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content = "user-scalable=no"/>
		<title>Zarabirsha</title>
		<!-- <link  rel="stylesheet" type="text/css"  href="theme.css"/> -->
		<style media="screen">
			@font-face{font-family:milanobold;src:url("fonts/MTTMilanoBold.otf")}@font-face{font-family:milano;src:url("fonts/MTTMilano.otf")}a{text-decoration:none;color:#333}a:hover{color:#666}.top{font-family:milanobold;font-size:18vmin;text-align:center;margin:0;color:#222;padding-top:9vmin;padding-bottom:0vmin;margin:0}@media screen and (min-device-width: 768px){.top{font-size:12vmin}}.nav{width:83vmin;margin:auto;text-align:center;font-family:milanobold;font-size:5vmin}@media screen and (min-device-width:768px){.nav{width:56vmin;font-size:3vmin}}img{max-width:96vmin}.card{width:96vmin;margin:auto;padding:12vmin 0}@media screen and (min-device-width:768px){.card{padding:10vmin 0}}.description{font-family:milano;font-size:4vmin;width:100%;padding-top:1vmin;padding-bottom:0.5vmin;border-bottom:1.5px solid #ccc;color:#444;text-align:right}@media screen and (min-device-width:768px){.description{font-size:2.5vmin}}.footer{font-family:milano;font-size:2.5vmin;text-align:center;color:#666 padding-top:2vmin}@media screen and (min-device-width:768px){.footer{font-size:1.6vmin}}.para{font-family:milano;font-size:4vmin;text-align:justify;width:83vmin;margin:-3vmin auto auto;padding-top:0vmin;padding-bottom:8vmin;color:#444}@media screen and (min-device-width:768px){.para{width:56vmin;font-size:2vmin;margin-top:-2vmin}}
		</style>
	</head>

	<body>
		<div class="top">Zarabirsha</div>
		<!-- DEBUG
		<h3 id = "lastone"></h3> -->

		<div class="para">
			My name is Giuseppe Bertolini and I'm a streetphotographer. Sort of.
			Class 1996, based in Milan, I'm studying Computer Science at PoliMi
			and this, photography, is my passion.
			I shoot both film and digital, cameras and phone.
			I try to portray what strikes my mind.
			Eyes are just tools, just like cameras and lenses.</div>
		<div class="nav"><a href="mailto:zarabirsha@gmail.com">mail </a>-<a href="https://www.instagram.com/zarabirsha" > instagram</a></div>

		<?php

        $servername = "localhost";
        $username = "readonly";
        $dbname = "zbshaphoto";

        // Create connection
        $conn = new mysqli($servername, $username, '', $dbname);

        $sql = "SELECT *  FROM photos";
        $result = $conn->query($sql);

        $images = array();
        $descriptions = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "<div class='card'><img src='". $row["pathtofile"] . "'>";
                // echo "<div class='description'>". $row["description"]. "</div></div>";

                array_push($images, $row["pathtofile"]);
                array_push($descriptions, $row["description"]);
            }
        } else {
            // ERROR
            echo "0 results";
        }

        $conn->close();

        $arrlength = count($images);

        for ($x = 0; $x < $arrlength; $x++) {
			// load only the first two images (min($x,1)) as some screen ratio already display the second image as well
            echo "<div class='card'><img id='". $x ."' src='". $images[min($x, 1)] ."'data='". $images[$x] ."'>";
            echo "<div class='description'>". $descriptions[$x]. "</div></div>";
        }
        ?>

	<div class="footer">&copy 2018 Zarabirsha </div>

		<!-- <script type="text/javascript" src="mini-lazyload.js"></script> -->
		<script type="text/javascript">
			var lastone=0;var render=function(lastone){var last;for(i=lastone;i<8;i+=1){if(isInViewport(document.getElementById(i))){document.getElementById(Math.min(i+1,8)).src=document.getElementById(Math.min(i+1,8)).getAttribute("data");last=i}}return last};window.addEventListener('scroll',function(){lastone=render(lastone);});var isInViewport=function(el){const rect=el.getBoundingClientRect();const windowHeight=(window.innerHeight||document.documentElement.clientHeight);return(rect.top<=windowHeight)&&((rect.top+rect.height)>=0)};
		</script>
	</body>
</html>
