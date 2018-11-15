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
			a : <input id = "a" type = "number" name = "a">
			b : <input id = "b" type = "number" name = "b">
			<a href = "javascript: add()">addup</>
		</form>	
		<script>
			function add(){
				var a = document.getElementById("a").value;
				var b = document.getElementById("b").value;
				var c = a + b	;
				document.getElementById("b").value = c;
			}
		</script>
	</body>