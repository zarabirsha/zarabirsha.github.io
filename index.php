<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content = "user-scalable=no"/>
		<title>Zarabirsha</title>
		<link  rel="stylesheet" type="text/css"  href="theme.css"/>

	</head>
	<body>
		<form>
			a : <input id = "a" type = "text" name = "a">
			b : <input id = "b" type = "text" name = "b">
			<a href = "javascript: add()">addup</>
		</form>	
		<script>
			function add(){
				var a = document.getElementById("a");
				var b = document.getElementById("b");
				var c = a + b;
				return c
			}
		</script>
	</body>