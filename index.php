<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content = "user-scalable=no"/>
		<title>Zarabirsha</title>
		<link  rel="stylesheet" type="text/css"  href="theme.css"/>

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

		<script type="text/javascript" src="mini-lazyload.js"></script>
	</body>
</html>
