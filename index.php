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
				var a = parseInt(document.getElementById("a").value,10);
				var b = parseInt(document.getElementById("b").value,10);
				var c = a + b	;
				document.getElementById("b").value = c;
			}
		</script>
	</body>